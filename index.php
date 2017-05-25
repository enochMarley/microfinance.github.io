<?php error_reporting(0); ?>
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

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<br><br><br><br><br><br>
					<div class="card-div">
						<h3 class="text-center">Company Admin Login</h3>
						<p class="text-center resMsg">Enter Admin Username &amp; Password To Login</p><br>
						<form method="post" class="admin-login-form">
							<input type="text" name="username" placeholder="Admin Username" required><br><br>
							<input type="password" name="password" placeholder="Admin Password" required><br><br>
							<button type="submit" class="btn btn-primary btn-lg">Login</button><br><br><br>
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php 

	include "includes/api/dbConfig.php";

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);



	if (isset($username) && isset($password)) {
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$query = "SELECT * FROM admin WHERE adminUsername = '$username' AND adminPassword = '$password'";
			$result = $database->query($query);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				if ($row['adminUsername'] == "$username" && $row['adminPassword'] == "$password") { 
					session_start();
					$_SESSION['username'] = $row['adminUsername'];
					?>
					<script>
						$(".resMsg").html("Login Successful").css("color","green");
						setInterval(function(){
							window.location.href = "clients.php";
						},1000);
					</script>
<?php	
				}
			}else{ ?>
			<script>
				$(".card-div").effect("shake","slow");
				$(".resMsg").html("Wrong Admin Username Or Password.Try Again").css("color","red");
			</script>


<?php
			}
		}
	}
?>