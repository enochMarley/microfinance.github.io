<?php  
	session_start();
	if (!isset($_SESSION['username'])) {
		echo "<script>window.location.href = 'index.php';</script>";
	}

	include "includes/api/functions.php";
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Microfinance</title>
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/jquery-ui-theme.css">
	    <link rel="stylesheet" href="css/styles.css">
		<style>
			body{
				background-color: #f7f7f7;
			}
		</style>
	</head>
	<body>
		 <nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Company</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		        <li>
		        	<a href="#"><span class="glyphicon glyphicon-dashboard"></span> <?php echo $_SESSION['username']; ?></a>
		        </li>
		        <li>
		        	<a href="clients.php"><span class="glyphicon glyphicon-user"></span> Clients</a>
		        </li>
		        <li>
		        	<a href="deposit.php"><span class="glyphicon glyphicon-cloud-upload"></span> Deposit</a>
		        </li>
		        <li class="selected"><a href="withdraw.php"><span class="glyphicon glyphicon-cloud-download"></span>Withdraw</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav><br><br><br><br>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 well">
				<h3 class="text-center">Withdrawal Form</h3>
					<form action="includes/api/withdrawFund.php" method="post" class="deposit-form">
						<div class="row">
							<div class="col-md-6">
								<label>Select Client</label><br>
								<select name="clientName" required>
									<?php getClientNames(); ?>
								</select>
							</div>
							<div class="col-md-6">
								<label>Withdrawal Amount (GH&cent;)</label><br>
								<input type="number" name="amount" step="any" min="1" required>
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Withdraw</button>
								<a href="clients.php">
									<button type="button" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
								</a>
							</div>
						</div>
						
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>

		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
