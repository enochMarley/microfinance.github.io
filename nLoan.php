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
		        <li class="dropdown selected">
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
			     <li><a href="employees_init.php"><span class="glyphicon glyphicon-list"></span> Employees</a></li>
			     <li><a href="reports.php"><span class="glyphicon glyphicon-file"></span> Reports</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="includes/api/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav><br><br><br><br>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 well">
					<h3 class="text-center">Loan Grant Form (Non-Clients)</h3>
					<form method="post" action="includes/api/grantNLoan.php" enctype="multipart/form-data" class="client-form">
		                	<input type="hidden" name="maxsize" value="10000000" /><br><br>
	                        <label>Client's passport size photo (photo format should be .jpg)</label>
	                        <div>
	                            <div><img src="includes/images/profile.jpeg" id="profileImg"></div><br>
	                            <input accept="image/jpeg" type="file"  name="profileImage" required="true" id="uploadFile"><br>
	                        </div>
		                	<label>Full Name</label><br>
			                 <input type="text" name="fullName" class="client-full-name" required>
			                 <br><br>
			                 <label for="">Gender</label><br>
			                 <input type="radio" name="gender" value="male" class="client-gender"> Male
			                 <input type="radio" name="gender" value="female" class="client-gender"> Female <br><br>
			                 <label>Date Of Birth (dd/mm/yy)</label><br>
			                 <input type="date" name="dateOfBirth" class="client-dob" required>
			                 <br><br>
			                 <label>Nationality</label><br>
			                 <input type="text" name="nationality" class="client-nationality" required>
			                 <br><br>
			                 <label>Email Address</label><br>
			                 <input type="email"  name="emailAddress" class="client-email" required>
			                 <br><br>
			                 <label>Phone Number</label><br>
			                 <input type="number" name="phoneNumber" class="client-phone-number" required>
			                 <br><br>
			                 <label>Residential Address</label><br>
			                 <input type="text"  name="residentialAddress" class="client-res-address" required>
			                 <br><br>
			                 <label>Amount</label><br>
			                 <input type="number" name="amount" step="any" required>
			                 <br><br>
			                 <label>Interest</label><br>
			                 <input type="number" name="interest" max="100" min="1" step="any" required>
			                 <br><br>
			                 <label>Guarantor</label><br>
			                 <input type="text" name="guarantor" class="client-next-of-kin" required>
			                 <br><br>
			                 <button type="submit" class="btn btn-primary" id="add">Grant Loan</button>
		            		<button type="reset" class="btn btn-warning">Clear Form</button>
			        </form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script>
	    	function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#profileImg').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#uploadFile").change(function(){
                readURL(this);
            });
	    </script>
	</body>
</html>

