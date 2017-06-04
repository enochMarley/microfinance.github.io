<?php 
	include "dbConfig.php";
	$cFullName = trim($_POST['fullName']);
	$cGender = trim($_POST['gender']);
	$cBirthDay = trim($_POST['dateOfBirth']);
	$cNationality = trim($_POST['nationality']);
	$cEmailAddress = trim($_POST['emailAddress']);
	$cPhoneNumber = trim($_POST['phoneNumber']);
	$cResAddress = trim($_POST['residentialAddress']);
	$guarantor = trim($_POST['guarantor']);
	$amount = trim($_POST['amount']);
	$interest = trim($_POST['interest']);
	$debit = ($amount + ($amount * ($interest/100)));

	if (isset($_FILES["profileImage"]["name"])) {
		$cImage = $_FILES["profileImage"]["name"];
		$uploadDir = "../uploads/";
		$tmpImg = $_FILES["profileImage"]["tmp_name"];
		$targetFile = $uploadDir.$cImage;
	}

	$checkQuery = "SELECT * FROM loans WHERE fullName = '$cFullName' AND birthDate = '$cBirthDay' AND nationality = '$cNationality' AND emailAddress = '$cEmailAddress' AND gender = '$cGender' AND phoneNumber = '$cPhoneNumber' AND resAddress = '$cResAddress' AND guarantor = '$guarantor';";

	$insertQuery = "INSERT INTO loans(fullName,birthDate,nationality,emailAddress,gender,phoneNumber,amount,interest,debit,resAddress,guarantor,profileImg) VALUES ('$cFullName','$cBirthDay','$cNationality','$cEmailAddress','$cGender','$cPhoneNumber',$amount,$interest,$debit,'$cResAddress','$guarantor','$cImage');";

	$checkResult = $database->query($checkQuery);

	if (mysqli_num_rows($checkResult) > 0) {

		echo "<script>alert('Client Already Exists In System Database');
		window.location.href = '../../nLoan.php';</script>";
	}else{
		if (move_uploaded_file($tmpImg,$targetFile)) {
			$insertResult = $database->query($insertQuery);

			if ($insertQuery) {

				echo "<script>alert('Loan Granted Successfully');
				 window.location.href = '../../nLoan.php';</script>";
			}else{
				echo "<script>alert('There Was An Error. Please Try Again');
				window.location.href = '../../nLoan.php';</script>";
			}
		}
		
	}

 ?>