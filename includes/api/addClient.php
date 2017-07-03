<?php 
	include "dbConfig.php";
	$cFullName = trim($_POST['fullName']);
	$cGender = trim($_POST['gender']);
	$cBirthDay = trim($_POST['dateOfBirth']);
	$cNationality = trim($_POST['nationality']);
	$cEmailAddress = trim($_POST['emailAddress']);
	$cPhoneNumber = trim($_POST['phoneNumber']);
	$cResAddress = trim($_POST['residentialAddress']);
	$cNextOfKin = trim($_POST['nextOfKin']);
	$cAccNum = trim($_POST['accountNumber']);

	if (isset($_FILES["profileImage"]["name"])) {
		$cImage = $_FILES["profileImage"]["name"];
		$uploadDir = "../uploads/";
		$tmpImg = $_FILES["profileImage"]["tmp_name"];
		$targetFile = $uploadDir.$cImage;
	}

	$checkQuery = "SELECT * FROM clients WHERE fullName = '$cFullName' AND birthDate = '$cBirthDay' AND nationality = '$cNationality' AND emailAddress = '$cEmailAddress' AND gender = '$cGender' AND phoneNumber = '$cPhoneNumber' AND resAddress = '$cResAddress' AND nextOfKin = '$cNextOfKin';";

	$insertQuery = "INSERT INTO clients(fullName,birthDate,nationality,emailAddress,gender,phoneNumber,resAddress,nextOfKin,accountNumber,profileImg) VALUES ('$cFullName','$cBirthDay','$cNationality','$cEmailAddress','$cGender','$cPhoneNumber','$cResAddress','$cNextOfKin','$cAccNum','$cImage');";

	$checkResult = $database->query($checkQuery);

	if (mysqli_num_rows($checkResult) > 0) {

		echo "<script>alert('Client Already Exists In System Database');
		window.location.href = '../../clients.php';</script>";
	}else{
		if (move_uploaded_file($tmpImg,$targetFile)) {
			$insertResult = $database->query($insertQuery);

			if ($insertQuery) {

				echo "<script>alert('Client Registered Successfully');
				 window.location.href = '../../clients.php';</script>";
			}else{
				echo "<script>alert('There Was An Error. Please Try Again');
				window.location.href = '../../clients.php';</script>";
			}
		}
		
	}

 ?>