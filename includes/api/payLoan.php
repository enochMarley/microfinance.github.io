<?php  
	include "dbConfig.php";

	$clientId = intval($_POST['clientName']);
	$amount = floatval($_POST['amount']);

	$getDebitQuery = "SELECT debit FROM clients WHERE Id = $clientId;";


	$getResult = $database->query($getDebitQuery);
	if (mysqli_num_rows($getResult) > 0) {

		$row = mysqli_fetch_assoc($getResult);
		$debit = $row['debit'];

		if ($amount > $debit) {
			echo "<script>alert('Debit Of Client Is GHC$debit. Client Cannot Pay More Than That');
				window.location.href = '../../ploan.php';</script>";
		}else{
			$newDebit = $debit - $amount;
			$updateDebit = "UPDATE clients SET debit = $newDebit WHERE Id = $clientId;";
			$updateResult = $database->query($updateDebit);
			if ($updateResult) {

				$transaction = "Paid GHC$amount Of Loan Taken";

				$recordQuery = "INSERT INTO transactions(clientId,transaction) VALUES ($clientId,'$transaction');";

				$recordResult = $database->query($recordQuery);

				if ($recordResult) {
					echo "<script>alert('Loan Payment Successful');window.location.href = '../../ploan.php';</script>";
				}
			}
		}
	}

?>