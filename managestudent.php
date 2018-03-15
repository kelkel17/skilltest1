<?php 
	require_once("dbconn.php");
	$students = viewAllStudents();
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		deleteStudent(array($id));
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Manage Students</h1>
</center>
<br /><br /><br />

<a href = "addstudent.php"><button class="myButton">Add Student</button></a>
<a href="index.php"><button class="myButton">Go Back Home</button></a>
<br /><br /><br />
<center>
	<table>
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>Student Age</th>
				<th>Student Gender</th>
				<th>Student Year</th>
				<th>Department</th>
				<th>School</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($students) > 0){
					foreach ($students as $row) {
						$id = $row['student_id'];
						$fname = $row['student_fname'];
						$lname = $row['student_lname'];
						$age = $row['student_age'];
						$gender = $row['student_gender'];
						$year = $row['student_year'];
						$dept = $row['dept_name'];
						$school = $row['school_name'];
			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $fname; ?> <?php echo $lname; ?></td>
					<td><?php echo $age; ?></td>
					<td><?php echo $gender; ?></td>
					<td><?php echo $year; ?></td>
					<td><?php echo $dept;?></td>
					<td><?php echo $school;?></td>
					<td><a href="updatestudent.php?id=<?php echo $id; ?>"><button class="button1">Update</button></a>
						<a href="managestudent.php?id=<?php echo $id; ?>"><button class="button3">Delete</button></a>
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
					<td>No Entery</td>
					<td>No Entery</td>
				</tr>
			<?php } ?>
			
		</tbody>
	</table>
</center>

</body>
</html>
