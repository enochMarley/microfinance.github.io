<?php 
	include "dbConfig.php";

	$getQuery = "SELECT * FROM clients ORDER BY fullName";
	$result = $database->query($getQuery);

	if (mysqli_num_rows($result) > 0) {
		echo "<table class='table table-hover table-striped'>
			    <thead>
			      <tr>
			      	<th>Image</th>
			        <th>Full Name</th>
			        <th>Account No.</th>
			        <th>Phone Number</th>
			        <th>Email Address</th>
			        <th>Date of Birth</th>
			        <th>Nationality</th>
			        <th>Res. Address</th>
			        <th>Balance GH&cent;</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody>";
		while ($row = mysqli_fetch_assoc($result)) {

			$cId = $row['Id'];
			$cFullName = $row['fullName'];
			$cAccountNum = $row['accountNumber'];
			$cBirthDay = $row['birthDate'];
			$cNationality = $row['nationality'];
			$cEmailAddress = $row['emailAddress'];
			$cPhoneNumber = $row['phoneNumber'];
			$cResAddress = $row['resAddress'];
			$balance = $row['balance'];
			$image = $row['profileImg'];

			echo "<tr>
					<td><img src='includes/uploads/$image' id='profileImg2'/></td>
			        <td>".substr($cFullName,0,15)."</td>
			        <td>".substr($cAccountNum,0,10)."</td>
			        <td>".$cPhoneNumber."</td>
			        <td>".substr($cEmailAddress,0,15)."</td>
			        <td>".substr($cBirthDay,0,15)."</td>
			        <td>".$cNationality."</td>
			        <td>".substr($cResAddress,0,15)."</td>
			        <td>".substr($balance,0,10)."</td>
			        <td>
			        	<a href='transactions.php?id=$cId'><button class='btn btn-info'><span class='glyphicon glyphicon-credit-card'></span> Transactions</button></a>
			        	<a href='editClientForm.php?id=$cId'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> Edit</button></a> 
			        	<a href='deleteClientForm.php?id=$cId&fullName=$cFullName'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</button></a>
			        </td>
			      </tr>";
		}

		echo "</tbody>
  			</table>";
	}else{
		echo "<div class='jumbotron'><h1 class='text-center'>There Are No Clients In Your Database</h1></div>";
	}
 ?>