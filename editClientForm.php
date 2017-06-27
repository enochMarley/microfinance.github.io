<?php  
	include "includes/api/dbConfig.php";
	$cId = intval($_GET['id']);
	
	$query = "SELECT * FROM clients WHERE Id = $cId;";
	$result = $database->query($query);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$cId = $row['Id'];
		$cFullName = $row['fullName'];
		$cGender = $row['gender'];
		$cBirthDay = $row['birthDate'];
		$cNationality = $row['nationality'];
		$cEmailAddress = $row['emailAddress'];
		$cPhoneNumber = $row['phoneNumber'];
		$cResAddress = $row['resAddress'];
		$cNextOfKin = $row['nextOfKin'];
	}

?>

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
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="clients.php" ><span class="glyphicon glyphicon-arrow-left"></span> Back</a></li>
		      </ul>
		    </div>
		  </div>
		</nav><br><br><br><br>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 well">
					<h3 class="text-center">Edit Client</h3>
					<form method="post" action="includes/api/editClients.php" class="client-form">
						<input type="hidden" name="id" value="<?php echo $cId;?>">
		           		<label>Full Name</label><br>
			            <input type="text" name="fullName" value="<?php echo $cFullName; ?>" required>
			            <br><br>
			            <label>Date Of Birth (dd/mm/yy)</label><br>
			            <input type="date" name="dateOfBirth" value="<?php echo $cBirthDay ?>"  required>
			            <br><br>
			            <label>Nationality</label><br>
			            <input type="text" name="nationality" value="<?php echo $cNationality ?>" required>
			            <br><br>
			            <label>Email Address</label><br>
			            <input type="email"  name="emailAddress" value="<?php echo $cEmailAddress ?>" required>
			            <br><br>
			            <label>Phone Number</label><br>
			            <input type="number" name="phoneNumber" value="<?php echo $cPhoneNumber ?>" required>
			            <br><br>
			            <label>Residential Address</label><br>
			            <input type="text"  name="residentialAddress" value="<?php echo $cResAddress ?>" required>
			            <br><br>
			            <label>Next Of Kin</label><br>
			            <input type="text" name="nextOfKin" value="<?php echo $cNextOfKin ?>" required>
			            <br><br>
			            <button class="btn btn-primary btn-lg">Update</button>
			        </form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

