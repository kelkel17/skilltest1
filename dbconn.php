<?php 
	function con(){
		return new PDO("mysql:host=localhost;dbname=skill",'root','');
	}
	//SCHOOLS
	function addSchool($data){
			$con = con();
			$sql = "INSERT INTO schools(school_name,school_address,telephone) VALUES (?, ?, ?)";
			$stmt = $con->prepare($sql);
			$insert = $stmt->execute($data);
			$con = null;

			if($insert){
				header('Location: manageschool.php');
			}
			else{
				die("Error in Adding School.");
			}
	}

	function viewAllSchools(){
			$con = con();
			$sql = "SELECT * FROM schools";
			$stmt = $con->prepare($sql);
			$stmt->execute(); 
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;

	}

	function getSchool($data){
			$con = con();
			$sql = "SELECT * FROM schools WHERE school_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data); 
			$rows = $stmt->fetchAll();
			$con = null;

			return $rows;
	}

	function updateSchool($data){
			$con = con();
			$sql = "UPDATE schools SET school_name = ?, school_address = ?, telephone = ? WHERE school_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data); 
			$con = null;

			if($update){
				header('Location: manageschool.php');
			}
			else{
				die("Error in Updating School.");
			}
	}

	function deleteSchool($data){
			$con = con();
			$sql = "DELETE FROM schools where school_id = ?";
			$stmt = $con->prepare($sql);
			$delete = $stmt->execute($data); 
			$con = null;

			if($delete){
				header('Location: manageschool.php');
			}
			else{
				die("Error in Deleting School.");
			}
	}

	//DEPARTMENTS
	function addDepartment($data){
			$con = con();
			$sql = "INSERT INTO departments(dept_name,dean,schoolid) VALUES (?, ?, ?)";
			$stmt = $con->prepare($sql);
			$insert = $stmt->execute($data);
			$con = null;

			if($insert){
				header('Location: managedepartment.php');
			}
			else{
				die("Error in Adding Department.");
			}
	}
	function viewAllDepartments(){
			$con = con();
			$sql = "SELECT * FROM departments AS d INNER JOIN schools AS s ON s.school_id = d.schoolid";
			$stmt = $con->prepare($sql);
			$stmt->execute(); 
			$view = $stmt->fetchAll();
			$con = null;

			return $view;

	}

	function getDepartment($data){
			$con = con();
			$sql = "SELECT * FROM departments AS d INNER JOIN schools AS s ON s.school_id = d.schoolid WHERE dept_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data); 
			$rows = $stmt->fetchAll();
			$con = null;

			return $rows;
	}

	function updateDepartment($data){
			$con = con();
			$sql = "UPDATE departments SET dept_name = ?, dean = ?, schoolid = ? WHERE dept_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data); 
			$con = null;

			if($update){
				header('Location: managedepartment.php');
			}
			else{
				die("Error in Updating Department.");
			}
	}

	function deleteDepartment($data){
			$con = con();
			$sql = "DELETE FROM departments where dept_id = ?";
			$stmt = $con->prepare($sql);
			$delete = $stmt->execute($data); 
			$con = null;

			if($delete){
				header('Location: managedepartment.php');
			}
			else{
				die("Error in Deleting Department.");
			}
	}



	//STUDENTS

	function addStudent($data){
			$con = con();
			$sql = "INSERT INTO students(student_fname,student_lname,student_age,student_gender,student_year,dept_id) VALUES (?, ?, ?, ?, ?, ? )";
			$stmt = $con->prepare($sql);
			$insert = $stmt->execute($data);
			$con = null;

			if($insert){
				header('Location: managestudent.php');
			}
			else{
				die("Error in Adding Student.");
			}
	}
	function viewAllStudents(){
			$con = con();
			$sql = "SELECT * FROM students AS s INNER JOIN departments AS d ON s.dept_id = d.dept_id INNER JOIN schools a ON d.schoolid = a.school_id";
			$stmt = $con->prepare($sql);
			$stmt->execute(); 
			$view = $stmt->fetchAll();
			$con = null;

			return $view;

	}

	function getStudent($data){
			$con = con();
			$sql = "SELECT * FROM students AS s INNER JOIN departments AS d ON s.dept_id = d.dept_id INNER JOIN schools a ON d.schoolid = a.school_id WHERE student_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data); 
			$rows = $stmt->fetchAll();
			$con = null;

			return $rows;
	}

	function updateStudent($data){
			$con = con();
			$sql = "UPDATE students SET student_fname = ?, student_lname = ?, student_age = ?, student_gender = ?, student_year = ?, dept_id = ? WHERE student_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data); 
			$con = null;

			if($update){
				header('Location: managestudent.php');
			}
			else{
				die("Error in Updating Student.");
			}
	}

	function deleteStudent($data){
			$con = con();
			$sql = "DELETE FROM students where student_id = ?";
			$stmt = $con->prepare($sql);
			$delete = $stmt->execute($data); 
			$con = null;

			if($delete){
				header('Location: managestudent.php');
			}
			else{
				die("Error in Deleting Student.");
			}
	}

?>