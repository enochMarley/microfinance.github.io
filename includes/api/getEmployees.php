<?php 
	include "dbConfig.php";

	$getQuery = "SELECT * FROM employees ORDER BY fullName";
	$result = $database->query($getQuery);

	if (mysqli_num_rows($result) > 0) {
		echo "<table class='table table-hover table-striped'>
			    <thead>
			      <tr>
			      	<th>Image</th>
			        <th>Full Name</th>
			        <th>Phone Number</th>
			        <th>Gender</th>
			        <th>Email Address</th>
			        <th>Date of Birth</th>
			        <th>Nationality</th>
			        <th>Res. Address</th>
			        <th>Net Salary (GH&cent;)</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody>";
		while ($row = mysqli_fetch_assoc($result)) {

			$cId = $row['Id'];
			$cFullName = $row['fullName'];
			$cGender = $row['gender'];
			$cBirthDay = $row['birthDate'];
			$cNationality = $row['nationality'];
			$cEmailAddress = $row['emailAddress'];
			$cPhoneNumber = $row['phoneNumber'];
			$cResAddress = $row['resAddress'];
			$image = $row['profileImg'];
			$salary = $row['salary'];

			echo "<tr>
					<td><img src='includes/uploads/$image' id='profileImg2'/></td>
			        <td>".substr($cFullName,0,15)."</td>
			        <td>".$cPhoneNumber."</td>
			        <td>".$cGender."</td>
			        <td>".substr($cEmailAddress,0,15)."</td>
			        <td>".substr($cBirthDay,0,15)."</td>
			        <td>".$cNationality."</td>
			        <td>".$cResAddress."</td>
			        <td>".$salary."</td>
			        <td>
			        	<a href='editEmployeeForm.php?id=$cId'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> Edit</button></a> 
			        	<a href='deleteEmployeeForm.php?id=$cId&fullName=$cFullName'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</button></a>
			        </td>
			      </tr>";
		}

		echo "</tbody>
  			</table>";
	}else{
		echo "<div class='jumbotron'><h1 class='text-center'>There Are No Employees In Your Database</h1></div>";
	}
 ?>