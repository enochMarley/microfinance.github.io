<?php 
	include "dbConfig.php";

	$cId = intval($_POST['id']);
	$cFullName = trim($_POST['fullName']);
	$cBirthDay = trim($_POST['dateOfBirth']);
	$cNationality = trim($_POST['nationality']);
	$cEmailAddress = trim($_POST['emailAddress']);
	$cPhoneNumber = trim($_POST['phoneNumber']);
	$cResAddress = trim($_POST['residentialAddress']);
	$salary = trim($_POST['salary']);

	$editQuery = "UPDATE employees SET fullName = '$cFullName', birthDate = '$cBirthDay', nationality = '$cNationality', emailAddress = '$cEmailAddress', phoneNumber = '$cPhoneNumber', resAddress = '$cResAddress', salary = $salary WHERE Id = $cId;";

	$editResult = $database->query($editQuery);

	if ($editResult) {

		echo "<script>alert('Employee Detials Updated Successfully');
		window.location.href = '../../employees.php';</script>";
	}else{

		echo "<script>alert('Employee Details Could Not Be Updated');
			 window.location.href = '../../employees.php';</script>";
		
	}

 ?>