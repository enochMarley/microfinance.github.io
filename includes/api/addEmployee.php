<?php 
	include "dbConfig.php";
	$cFullName = trim($_POST['fullName']);
	$cGender = trim($_POST['gender']);
	$cBirthDay = trim($_POST['dateOfBirth']);
	$cNationality = trim($_POST['nationality']);
	$cEmailAddress = trim($_POST['emailAddress']);
	$cPhoneNumber = trim($_POST['phoneNumber']);
	$cResAddress = trim($_POST['residentialAddress']);
	$salary = trim($_POST['salary']);

	if (isset($_FILES["profileImage"]["name"])) {
		$cImage = $_FILES["profileImage"]["name"];
		$uploadDir = "../uploads/";
		$tmpImg = $_FILES["profileImage"]["tmp_name"];
		$targetFile = $uploadDir.$cImage;
	}

	$checkQuery = "SELECT * FROM employees WHERE fullName = '$cFullName' AND birthDate = '$cBirthDay' AND nationality = '$cNationality' AND emailAddress = '$cEmailAddress' AND gender = '$cGender' AND phoneNumber = '$cPhoneNumber' AND resAddress = '$cResAddress' AND salary = $salary;";

	$insertQuery = "INSERT INTO employees(fullName,birthDate,nationality,emailAddress,gender,phoneNumber,resAddress,salary,profileImg) VALUES ('$cFullName','$cBirthDay','$cNationality','$cEmailAddress','$cGender','$cPhoneNumber','$cResAddress',$salary,'$cImage');";

	$checkResult = $database->query($checkQuery);

	if (mysqli_num_rows($checkResult) > 0) {

		echo "<script>alert('Employee Already Exists In System Database');
		window.location.href = '../../employees.php';</script>";
	}else{
		if (move_uploaded_file($tmpImg,$targetFile)) {
			$insertResult = $database->query($insertQuery);

			if ($insertQuery) {

				echo "<script>alert('Employee Registered Successfully');
				 window.location.href = '../../employees.php';</script>";
			}else{
				echo "<script>alert('There Was An Error. Please Try Again');
				window.location.href = '../../employees.php';</script>";
			}
		}
		
	}

 ?>