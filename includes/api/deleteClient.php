<?php  
	include "dbConfig.php";

	$cId = intval($_POST['id']);

	$deleteQuery = "DELETE FROM clients WHERE Id = $cId;";
	$result = $database->query($deleteQuery);
	if ($result) {
		echo "<script>alert('Client Details Deleted Successfully');
		window.location.href = '../../clients.php';</script>";
	}else{
		echo "<script>alert('Client Details Was Not Deleted');
		window.location.href = '../../clients.php';</script>";
	}

?>