<?php  
	include "dbConfig.php";

	$cId = intval($_POST['id']);

	$deleteQuery = "DELETE FROM employees WHERE Id = $cId;";
	$result = $database->query($deleteQuery);
	if ($result) {
		echo "<script>alert('Employee Details Deleted Successfully');
		window.location.href = '../../employees.php';</script>";
	}else{
		echo "<script>alert('Employee Details Was Not Deleted');
		window.location.href = '../../employees.php';</script>";
	}

?>