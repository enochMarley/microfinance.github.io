<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href='index.php'</script>";
	}
	error_reporting(0); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Microfinance</title>
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/styles.css">
		<style>
			body{
				background-color: #f7f7f7;
			}
		</style>
	</head>
	<body>
		<br><br><br>
		<div class="container">
				<h2 class="text-center">Select An Activity</h2>
				<a href="clients.php">
					<div class="col-md-4 opt-div" style="background: red;color:white;">
						<h1 class="text-center" style="line-height: 300px;">Clients</h1>
					</div>
				</a>
				<a href="withdraw.php">
					<div class="col-md-4 opt-div" style="background: green;color:white;">
						<h1 class="text-center" style="line-height: 300px;">Withdrawal</h1>
					</div>
				</a>
				<a href="deposit.php">
					<div class="col-md-4 opt-div" style="background: cyan;color:white;">
						<h1 class="text-center" style="line-height: 300px;">Deposit</h1>
					</div>
				</a>
				<a href="loan.php">
					<div class="col-md-4 opt-div" style="background: pink;color:white;">
						<h1 class="text-center" style="line-height: 300px;">Loans</h1>
					</div>
				</a>
			
				<a href="reports.php">
					<div class="col-md-4 opt-div" style="background: grey;color:white;">
						<h1 class="text-center" style="line-height: 300px;">Reports</h1>
					</div>
				</a>
				<a href="employees_init.php">
					<div class="col-md-4 opt-div" style="background: magenta;color:white;">
						<h1 class="text-center" style="line-height: 300px;">Employees</h1>
					</div>
				</a>
				<!--<a href="">
					<div class="col-md-3">
						<h1 class="text-center">Deposit</h1>
					</div>
				</a>
				<a href="">
					<div class="col-md-3">
						<h1 class="text-center">Loans</h1>
					</div>
				</a>-->
			
		</div>
		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script>
	    	var optDiv = $(".opt-div").width();
	    	$(".opt-div").css({"width":optDiv,"height":optDiv});
	    </script>
	</body>
</html>