<?php
	require_once("dbconn.php");
		$view = viewAllDepartments();

	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$year = $_POST['year'];
		$dept = $_POST['department'];

		$data = array($fname,$lname,$age,$gender,$year,$dept);
		addStudent($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Add Student</h1>
	<br /><br /><br />
</center>
<table>

<form method="post">
<tr>
	<td>
	Student First Name:
	<input type="text" name="fname" required>
	</td>
</tr>
<tr>
	<td>
	Student Last Name: 
	<input type="text" name="lname" required>
	</td>
</tr>	
<tr>
	<td>
	Student Age:
	<input type="number" name="age" required>
	</td>
</tr>
<tr>
	<td>
	Student Gender:
	<input type="radio" name="gender" value="Male" required>Male
	<input type="radio" name="gender" value="Female" required>Female
	</td>
</tr>
<tr>
	<td>
	Student Year:
	<select name="year" required>
		<option value="">---Year Level---</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
		</td>
</tr>
<tr>
	<td>
	Department:
	<select name="department" required>
		<option value="">---Select Department---</option>
			<?php
			if(count($view) > 0){
				foreach ($view as $row) {
						$id = $row['dept_id'];
						$name = $row['dept_name'];
						$schoolname = $row['school_name'];
				//echo '<option value="'.$row['school_id'].'">'.$row['school_name'].'</option>';
			?>
				<option value="<?php echo $id; ?>"><?php echo $name."(".$schoolname.")"; ?></option>
			<?php			
					}	
				}		
			?>
	</select>
		</td>
</tr>
<tr>
	<td>
	<input type="submit" name="submit" class="buttons" value="Add Student">

</form>
	<a href="managestudent.php"><button  class="buttons">Cancel</button></a>
	</td>
</tr>	
</table>

</body>
</html>
