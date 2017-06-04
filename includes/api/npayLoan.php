<?php  
	include "dbConfig.php";

	$clientId = intval($_POST['clientName']);
	$amount = floatval($_POST['amount']);

	$getDebitQuery = "SELECT debit FROM loans WHERE Id = $clientId;";


	$getResult = $database->query($getDebitQuery);
	if (mysqli_num_rows($getResult) > 0) {

		$row = mysqli_fetch_assoc($getResult);
		$debit = $row['debit'];

		if ($amount > $debit) {
			echo "<script>alert('Debit Of Client Is GHC$debit. Client Cannot Pay More Than That');
				window.location.href = '../../nploan.php';</script>";
		}else{
			$newDebit = $debit - $amount;
			$updateDebit = "UPDATE loans SET debit = $newDebit WHERE Id = $clientId;";
			$updateResult = $database->query($updateDebit);
			if ($updateResult) {

					echo "<script>alert('Loan Payment Successful');window.location.href = '../../nploan.php';</script>";
			}
		}
	}

?>