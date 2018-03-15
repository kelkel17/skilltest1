<?php
require_once("dbconn.php");
if(isset($_POST['submit'])){
		$schoolid = $_POST['schoolid'];
		$schoolname = $_POST['schoolname'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];

		$data = array($schoolname,$address,$telephone, $schoolid);
		updateSchool($data);
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$school = getSchool(array($id));
		if(count($school) > 0){
			foreach ($school as $row) {
					$schoolid = $row['school_id'];
					$schoolname = $row['school_name'];
					$address = $row['school_address'];
					$telephone = $row['telephone'];
			

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Update School</h1>
	<br /><br /><br />
</center>
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
		<form method="post">
			<td>
			<input type="text" name="schoolid" value="<?php echo $schoolid?>" required readonly>
			</td>
			<td>
			<input type="text" name="schoolname" value="<?php echo $schoolname?>" required>
			</td>
			<td>
			<input type="text" name="address" value="<?php echo $address?>" required>
			</td>
			<td>
			<input type="number" name="telephone" value="<?php echo $telephone?>" required>
			</td>
			<td>
			<input type="submit" name="submit" class="buttons" value="Update School">
			</form>
			<a href="manageschool.php"><button class="buttons">Go Back</button></a>
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
 	<a href="manageschool.php">Back</a>
 <?php		
	}
?>
</body>
</html>




