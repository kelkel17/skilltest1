<?php 
	require_once("dbconn.php");
	$schools = viewAllSchools();
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		deleteSchool(array($id));
	}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Manage Schools</h1>
</center>
<br /><br /><br />

<a href = "addschool.php"><button class="myButton">Add School</button></a>
<a href="index.php"><button class="myButton">Go Back Home</button></a>
<br /><br /><br />
<center>
	<table>
		<thead>
			<tr>
				<th>School ID</th>
				<th>School Name</th>
				<th>School Address</th>
				<th>Telephone Number</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($schools) > 0){
					foreach ($schools as $row) {
						$schoolid = $row['school_id'];
						$schoolname = $row['school_name'];
						$address = $row['school_address'];
						$telephone = $row['telephone'];
			?>
				<tr>
					<td><?php echo $schoolid; ?></td>
					<td><?php echo $schoolname; ?></td>
					<td><?php echo $address; ?></td>
					<td><?php echo $telephone; ?></td>
					<td><a href="updateschool.php?id=<?php echo $schoolid; ?>"><button class="button1">Update</button></a>
						<a href="manageschool.php?id=<?php echo $schoolid; ?>"><button class="button3">Delete</button></a>
					</td>
				</tr>
			<?php	
					}
				}

				else{
			?>
				<tr>
					<td>No Entery</td>
					<td>No Entery</td>
					<td>No Entery</td>
					<td>No Entery</td>
					<td>No Entery</td>
				</tr>
			<?php } ?>
			
		</tbody>
	</table>
</center>

</body>
</html>
