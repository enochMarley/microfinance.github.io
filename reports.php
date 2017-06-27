<?php  
	session_start();
	if (!isset($_SESSION['username'])) {
		echo "<script>window.location.href = 'index.php';</script>";
	}
?>

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
		        	<a href="options.php"><span class="glyphicon glyphicon-dashboard"></span> <?php echo $_SESSION['username']; ?></a>
		        </li>
		        <li>
		        	<a href="clients.php"><span class="glyphicon glyphicon-user"></span> Clients</a>
		        </li>
		        <li><a href="deposit.php"><span class="glyphicon glyphicon-cloud-upload"></span> Deposit</a></li>
		        <li><a href="withdraw.php"><span class="glyphicon glyphicon-cloud-download"></span>Withdraw</a></li>
		        <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-credit-card"></span> Loans
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="loan.php">Grant Loan (Clients)</a></li>
			          <li><a href="pLoan.php">Pay Loan (Clients)</a></li>
			          <li><a href="nLoan.php">Grant Loan (Non-Clients)</a></li>
			          <li><a href="npLoan.php">Pay Loan (Non-Clients)</a></li>
			          <li><a href="loanArrears.php">Arrears (Non-Clients)</a></li>
			        </ul>
			     </li>
			     <li class="selected"><a href="reports.php"><span class="glyphicon glyphicon-file"></span>Reports</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav><br><br><br><br>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 clientsDiv">
					
				</div>
			</div>
		</div>

	

		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script>
	    	function getReports() {
				$.ajax({
					method: 'GET',
					url: "includes/api/getReports.php",
					success: function(data) {
						
						$(".clientsDiv").html(data);
					},
					error: function(error) {
						console.log(error);
					}
				});
			}

			getReports();
	    </script>
	</body>
</html>

