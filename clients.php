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
		        <li class="selected">
		        	<a href="clients.php"><span class="glyphicon glyphicon-user"></span> Clients</a>
		        </li>
		        <li><a href="deposit.php"><span class="glyphicon glyphicon-cloud-upload"></span> Deposit</a></li>
		        <li><a href="withdraw.php"><span class="glyphicon glyphicon-cloud-download"></span>Withdraw</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add Client</a></li>
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

		<div id="myModal" class="modal fade" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button class="close" data-dismiss="modal">&times;</button>
		                <h4 class="modal-title">Please Enter The Details Of Client To Add</h4>
		            </div>
		            <div class="modal-body"> 
		                <form method="post" action="includes/api/addClient.php" class="client-form">
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
			                 <label>Next Of Kin</label><br>
			                 <input type="text" name="nextOfKin" class="client-next-of-kin" required>
			                 <br><br>
		            </div>
		            <div class="modal-footer">
		            	<button type="submit" class="btn btn-primary" id="add">Register Client</button>
		            	<button type="reset" class="btn btn-warning">Clear Form</button>
		                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel Registration</button>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>

		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script>
	    	function getClients() {
				$.ajax({
					method: 'GET',
					url: "includes/api/getClients.php",
					success: function(data) {
						
						$(".clientsDiv").html(data);
					},
					error: function(error) {
						console.log(error);
					}
				});
			}

			getClients();
	    </script>
	</body>
</html>

