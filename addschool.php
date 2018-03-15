<?php 
	require_once("dbconn.php");
	if(isset($_POST['submit'])){
		$schoolname = $_POST['schoolname'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];

		$data = array($schoolname,$address,$telephone);
		addSchool($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
	<h1>Add School</h1>
	<br /><br /><br />
</center>
<table>
<form method="post">
<tr>
	<td>	
	School Name:
	<input type="text" name="schoolname" required>
	</td>
</tr>
<tr>
	<td>
	School Address:
	<input type="text" name="address" required>
	</td>
</tr>
<tr>
	<td>
	School Telephone:
	<input type="number" name="telephone" required>
	</td>
</tr>
<tr>
	<td>
	<input type="submit" name="submit" class="buttons" value="Add School">
</form>
	<a href="manageschool.php"><button  class="buttons">Cancel</button></a>
	</td>
</tr>
</table>
</body>
</html>

