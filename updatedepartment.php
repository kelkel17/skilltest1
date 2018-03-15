<?php
require_once("dbconn.php");
$schools = viewAllSchools();
if(isset($_POST['submit'])){
		$deptid = $_POST['id'];
		$deptname = $_POST['deptname'];
		$dean = $_POST['dean'];
		$school = $_POST['school'];

		$data = array($deptname,$dean,$school, $deptid);
		updateDepartment($data);
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$department = getDepartment(array($id));
		if(count($department) > 0){
			foreach ($department as $row) {
						$deptid = $row['dept_id'];
						$deptname = $row['dept_name'];
						$dean = $row['dean'];
						$schoolid = $row['schoolid'];
						
			}
		}
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
				<th>Department ID</th>
				<th>Department Name</th>
				<th>Dean</th>
				<th>School</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<form method="post">
			<td>
			<input type="text" name="id" value="<?php echo $deptid?>" required readonly>
			</td>
			<td>
			<input type="text" name="deptname" value="<?php echo $deptname?>" required>
			</td>
			<td>
			<input type="text" name="dean" value="<?php echo $dean?>" required>
			<br />
			</td>
			<td>
			<select name="school" value="<?php echo $schoolid?>" required>
				<option value="">---Select School---</option>
				<?php
				foreach ($schools as $row) {
							$id = $row['school_id'];
							$name = $row['school_name'];
				?>
				<option value="<?php echo $id; ?>"
					<?php
						if($id == $schoolid){
							echo "selected";
						}
					 ?>
					 ><?php echo $name; ?></option>
				<?php			
					}		
				?>
			</select>
			</td>
			<td>
			<input type="submit" name="submit" class="buttons" value="Update Department">
				</form>
			<a href="managedepartment.php"><button class="buttons">Cancel</button></a>
			</td>
	
		</tbody>	
</table>
<?php
	}
	else{
		echo "Nothing to Show";
 ?>
 	<a href="managedepartment.php">Back</a>
 <?php		
	}
?>
</body>
</html>


