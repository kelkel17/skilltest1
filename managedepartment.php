<?php 
	require_once("dbconn.php");
	$departments = viewAllDepartments();
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		deleteDepartment(array($id));
	}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Manage Departments</h1>
</center>
<br /><br /><br />

<a href = "adddepartment.php"><button class="myButton">Add Department</button></a>
<a href="index.php"><button class="myButton">Go Back Home</button></a>
<br /><br /><br />	
<center>
	<table>
		<thead>
			<tr>
				<th>Department ID</th>
				<th>Department Name</th>
				<th>Dean</th>
				<th>School</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($departments) > 0){
					foreach ($departments as $row) {
						$id = $row['dept_id'];
						$name = $row['dept_name'];
						$dean = $row['dean'];
						$school = $row['school_name'];
			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $dean; ?></td>
					<td><?php echo $school; ?></td>
					<td><a href="updatedepartment.php?id=<?php echo $id; ?>"><button class="button1">Update</button></a>
						<a href="managedepartment.php?id=<?php echo $id; ?>"><button class="button3">Delete</button></a>
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
