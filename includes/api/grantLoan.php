<?php  
	include "dbConfig.php";

	$clientId = intval($_POST['clientName']);
	$amount = floatval($_POST['amount']);
	$interest = floatval($_POST['interest']);

	$checkQuery = "SELECT debit,balance FROM clients WHERE Id = $clientId;";
	$checkResult = $database->query($checkQuery);
	if (mysqli_num_rows($checkResult) > 0) {
		$row = mysqli_fetch_assoc($checkResult);
		$debit = $row['debit'];
		$balance = $row['balance'];
		if ($debit > 0) {
			echo "<script>alert('Cannot Grant Loan To Client. Client Has Debit In Account');
				window.location.href = '../../loan.php';</script>";
		}elseif($balance >= 100){
			echo "<script>alert('Cannot Grant Loan To Client. Client Has Enough Balance');
				window.location.href = '../../loan.php';</script>";
		}else{
			$grossDebit = (($interest / 100) * $amount) + $amount;
			$updateDebit = "UPDATE clients SET debit = $grossDebit WHERE Id = $clientId;";
			$updateResult = $database->query($updateDebit);
			if ($updateResult) {

				$transaction = "Took A Loan Of GHC$amount";

				$recordQuery = "INSERT INTO transactions(clientId,transaction) VALUES ($clientId,'$transaction');";

				$recordResult = $database->query($recordQuery);

				if ($recordResult) {
					echo "<script>alert('Loan Granted Successfully.Client Was Granted GHC $amount At An Interest Of $interest%');window.location.href = '../../loan.php';</script>";
				}
			}
			
		}
	}

?>