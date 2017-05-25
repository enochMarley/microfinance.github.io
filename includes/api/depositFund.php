<?php 
	include "dbConfig.php";

	$clientId = intval($_POST['clientName']);
	$amount = floatval($_POST['amount']);

	$getBalanceQuery = "SELECT balance FROM clients WHERE Id = $clientId;";


	$getResult = $database->query($getBalanceQuery);

	if (mysqli_num_rows($getResult) > 0) {

		$row = mysqli_fetch_assoc($getResult);
		$oldBalance = $row['balance'];
		$newBalance = $oldBalance + $amount;

		$upDateBalanceQuery = "UPDATE clients SET balance = $newBalance WHERE Id = $clientId;";

		$updateResult = $database->query($upDateBalanceQuery);

		if ($updateResult) {

			$transaction = "Depositted GHC$amount into account";

			$recordQuery = "INSERT INTO transactions(clientId,transaction) VALUES ($clientId,'$transaction');";

			$recordResult = $database->query($recordQuery);

			if ($recordResult) {
				echo "<script>alert('Deposit Successfull. New Balance Is $newBalance');
				window.location.href = '../../deposit.php';</script>";
			}
		}
	}
 ?>