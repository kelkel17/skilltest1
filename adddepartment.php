<?php
	require_once("dbconn.php");
		$view = viewAllSchools();

	if(isset($_POST['submit'])){
		$deptname = $_POST['deptname'];
		$dean = $_POST['dean'];
		$school = $_POST['school'];

		$data = array($deptname,$dean,$school);
		addDepartment($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Add Department</h1>
	<br /><br /><br />
</center>
<table>
<form method="post">
<tr>
	<td>
	Department Name:
	<input type="text" name="deptname" required>
	</td>
</tr>
<tr>
	<td>	
	Dean:
	<input type="text" name="dean" required>
	</td>
</tr>
<tr>
	<td>
	School:
	<select name="school" required>
		<option value="">---Select School---</option>
			<?php
			if(count($view) > 0){
				foreach ($view as $row) {
						$id = $row['school_id'];
						$name = $row['school_name'];
				//echo '<option value="'.$row['school_id'].'">'.$row['school_name'].'</option>';
			?>
				<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
			<?php			
					}	
				}		
			?>
	</select>
	</td>
</tr>
<tr>
	<td>
	<input type="submit" name="submit"  class="buttons" value="Add Department">	
</form>
	<a href="managedepartment.php"><button  class="buttons">Cancel</button></a>
	</td>
</tr>
</table>

</body>
</html>
