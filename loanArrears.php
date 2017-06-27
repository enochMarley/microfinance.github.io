<?php  
	session_start();
	if (!isset($_SESSION['username'])) {
		echo "<script>window.location.href = 'index.php';</script>";
	}

	include "includes/api/dbConfig.php";
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
					<h3 class="text-center">List of People Who Have Been Granted Loan</h3>
					<?php  
	
						$transactionQuery = "SELECT * FROM loans WHERE debit > 0";
						$transactionResult = $database->query($transactionQuery);

						if (mysqli_num_rows($transactionResult) > 0) {
							echo "<table class='table table-hover table-striped'>
								    <thead>
								      <tr>
								        <th>Image</th>
								        <th>Name</th>
								        <th>Debit (GHC)</th>
								      </tr>
								    </thead>
								    <tbody>";
							while ($row = mysqli_fetch_assoc($transactionResult)) {
								$fullName = $row['fullName'];
								$Debit = $row['debit'];
								$image = $row['profileImg'];
								echo "<tr>
									<td><img src='includes/uploads/$image' id='profileImg2' /></td>
							        <td>".$fullName."</td>
							        <td>".$Debit."</td>
							        </tr>";
							};							
						}
						echo "</tbody>
  							</table>";
					?>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

