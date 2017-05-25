<?php 
	include "dbConfig.php";

	$clientId = intval($_POST['clientName']);
	$amount = $_POST['amount'];
	$minimumAmount = 5;

	$getBalanceQuery = "SELECT balance FROM clients WHERE Id = $clientId;";


	$getResult = $database->query($getBalanceQuery);

	if (mysqli_num_rows($getResult) > 0) {

		$row = mysqli_fetch_assoc($getResult);

		$oldBalance = floatval($row['balance']);

		if ($amount > $oldBalance) {

			echo "<script>alert('Cannot Withdraw Amount Greater Than Balance.');window.location.href='../../withdraw.php'</script>";
		}elseif (($oldBalance - $amount) <= $minimumAmount) {
			echo "<script>alert('Cannot Withdraw.There Must Be A Minimum Amount of GHC $minimumAmount');window.location.href='../../withdraw.php'</script>";
		}else{
			$newBalance = $oldBalance - $amount;

			$upDateBalanceQuery = "UPDATE clients SET balance = $newBalance WHERE Id = $clientId;";

			$updateResult = $database->query($upDateBalanceQuery);

			if ($updateResult) {

				$transaction = "Withdrew GHC$amount into account";

				$recordQuery = "INSERT INTO transactions(clientId,transaction) VALUES ($clientId,'$transaction');";

				$recordResult = $database->query($recordQuery);

				if ($recordResult) {
					echo "<script>alert('Withdrawal Successful.New Balance Is $newBalance');window.location.href='../../withdraw.php'</script>";
				}
			}
				
		}
		
	}
 ?>