<?php
require_once("dbconn.php");
$departments = viewAllDepartments();
if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$year = $_POST['year'];
		$dept = $_POST['department'];

		$data = array($fname,$lname,$age, $gender,$year,$dept,$id);
		updateStudent($data);
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$student = getStudent(array($id));
		if(count($student) > 0){
			foreach ($student as $row) {
						$id = $row['student_id'];
						$fname = $row['student_fname'];
						$lname = $row['student_lname'];
						$age = $row['student_age'];
						$gender = $row['student_gender'];
						$year = $row['student_year'];
						$dept = $row['dept_id'];
						
		
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Update Department</h1>
	<br /><br /><br />
</center>
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
<form method="post">
	<td>
	<input type="text" name="id" value="<?php echo $id; ?>" required readonly>
	</td>
	<td>	
	<input type="text" name="fname" value="<?php echo $fname; ?>" required>
	</td>
	<td>	
	<input type="text" name="lname" value="<?php echo $fname; ?>" required>
	</td>
	<td>
	<input type="number" name="age" value="<?php echo $age; ?>" required>
	</td>
	<td>
	<input type="radio" name="gender" value="Male" <?php if($gender=="Male"){?> checked="true" <?php } ?>>Male

	<input type="radio" name="gender" value="Female"<?php if($gender=="Female") { echo "checked"; } ?>>Female
	</td>
	<td>
	<select name="year" required>
		<option value="">---Year Level---</option>
	<?php 
		for($i = 1; $i<5;$i++){
	?>	
		<option value="<?php echo $i; ?>"	
	<?php	
			if($year == $i){
				echo "selected";
			}
		
	?>
	><?php echo $i; ?></option>
	<?php } ?>
	</select>
	</td>
	<td>
	<select name="department" value="<?php echo $dept_id?>" required>
		<option value="">---Select Department---</option>
		<?php
		foreach ($departments as $row) {
					$id = $row['dept_id'];
					$name = $row['dept_name'];
					$school = $row['school_name'];
		?>
		<option value="<?php echo $id; ?>"
			<?php
				if($dept == $id){
					echo "selected";
				}
			 ?>
			 ><?php echo $name."(".$school.")" ?></option>
		<?php			
			}		
		?>
	</select>
	</td>
	<td>
		<input type="submit" name="submit"  class="buttons" value="Update Student">
		</form>
	    <a href="managestudent.php"><button class="buttons">Cancel</button></a>
	</td>
			
		</tbody>	
</table>
<?php
			}
		}
	}
	else{
		echo "Nothing to Show";
 ?>
 	<a href="managestudent.php">Back</a>
 <?php		
	}
?>
</body>
</html>


