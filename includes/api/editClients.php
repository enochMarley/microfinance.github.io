<?php 
	include "dbConfig.php";

	$cId = intval($_POST['id']);
	$cFullName = trim($_POST['fullName']);
	$cBirthDay = trim($_POST['dateOfBirth']);
	$cNationality = trim($_POST['nationality']);
	$cEmailAddress = trim($_POST['emailAddress']);
	$cPhoneNumber = trim($_POST['phoneNumber']);
	$cResAddress = trim($_POST['residentialAddress']);
	$cNextOfKin = trim($_POST['nextOfKin']);

	$editQuery = "UPDATE clients SET fullName = '$cFullName', birthDate = '$cBirthDay', nationality = '$cNationality', emailAddress = '$cEmailAddress', phoneNumber = '$cPhoneNumber', resAddress = '$cResAddress', nextOfKin = '$cNextOfKin' WHERE Id = $cId;";

	$editResult = $database->query($editQuery);

	if ($editResult) {

		echo "<script>alert('client Detials Updated Successfully');
		window.location.href = '../../clients.php';</script>";
	}else{

		echo "<script>alert('Client Details Could Not Be Updated');
			 window.location.href = '../../clients.php';</script>";
		
	}

 ?>