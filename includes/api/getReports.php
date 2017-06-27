<?php  
	include 'dbConfig.php';
	$monthQuery = "SELECT DISTINCT MONTH(transactionDate) AS reportMonth,YEAR(transactionDate) AS reportYear FROM transactions ORDER BY transactionDate DESC;";

	$monthResult = $database->query($monthQuery);
	if (mysqli_num_rows($monthResult) > 0) {
		while ($monthRow = mysqli_fetch_assoc($monthResult)) {
			$month = $monthRow["reportMonth"];
			$year = $monthRow["reportYear"]; ?>

			<div class="alert alert-success">
				<h2 class="text-center">Report For <?php echo date("F",mktime(0,0,0,$month,10))." ". $year; ?></h2>
			</div>
<?php
			$reportQuery = "SELECT DISTINCT DATE(transactionDate) AS reportDate,transaction,clientId FROM transactions WHERE MONTH(transactionDate) = '$month' ORDER BY reportDate;";
			$reportResult = $database->query($reportQuery);
			if (mysqli_num_rows($reportResult) >0) {
				while ($reportRow = mysqli_fetch_assoc($reportResult)) { 
					$repDate = $reportRow["reportDate"];
					$transaction = $reportRow["transaction"];
					$clientId = $reportRow["clientId"];

					$clientQuery = "SELECT accountNumber FROM clients WHERE Id = $clientId;";
					$clientRes = $database->query($clientQuery);
					$cRow = mysqli_fetch_assoc($clientRes);
					$accountNumber = $cRow["accountNumber"];
					?>

				<div class="alert alert-link">
					<p class="text-left"><?php echo $repDate." ---- Client with account Number $accountNumber ".$transaction; ?></p>
				</div>
<?php
					
				}
			}else{
				echo "<div class='jumbotron'><h1 class='text-center'>There Are No Reports For This Month</h1></div>";
			}
		}
	}else{
		echo "<div class='jumbotron'><h1 class='text-center'>There Are No Monthly Reports Yet</h1></div>";
	}

?>