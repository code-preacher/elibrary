<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}

	public function displayAllBookWithOrder($college_id,$department_id,$orderValue,$orderType)
	{
		$query = "SELECT * FROM book WHERE college_id={$college_id} and department_id={$department_id} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}

		public function displayAllWithOrderAndId($table,$orderValue,$orderType,$id)
	{
		$query = "SELECT * FROM {$table} WHERE sender_id={$id} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}

			public function displayAllWithOrderAndId2($table,$orderValue,$orderType,$id)
	{
		$query = "SELECT * FROM {$table} WHERE college_id={$id} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}

	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}




	//Display Specific
	public function displayName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

		public function displayCollegeName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM college where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

		public function displayFaculty($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM faculty where id='$id' ";
		$result = $this->con->query($query);
		$data=array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$row[]=$data;
			return $row;
		}else{
			return "No found records";
		}
	}

			public function displayDepartmentName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM department where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

				public function displayStudentName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM student where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}



			public function displayProfile($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}


		public function displayOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}


		public function displayOneStudent($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where matno='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}



	
//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM {$table}");
		if ($q) {
		    return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}

//Counting Specific
	
	
// Inserting

	public function insertCollege($post)
	{
		$name=$this->cleanse(strtoupper($_POST['name']));
		$query="INSERT into college(name) values('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-col.php?msg=College was created successfully&type=success");
		}else{
			header("Location:view-col.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertDepartment($post)
	{
		$college_id=$this->cleanse($_POST['college_id']);
		$department=$this->cleanse(strtoupper($_POST['department']));
		$query="INSERT into department(college_id,name) values('$college_id','$department')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-dep.php?msg=Department  was created successfully&type=success");
		}else{
			header("Location:view-dep.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertReview($post)
	{
		$sender_id=$this->cleanse($_POST['sender_id']);
		$college_id=$this->cleanse($_POST['college_id']);
		$department_id=$this->cleanse($_POST['department_id']);
		$message=$this->cleanse($_POST['message']);
		$query="INSERT into review(sender_id,college_id,department_id,message) values('$sender_id','$college_id','$department_id','$message')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-c.php?msg=Review  was sent successfully&type=success");
		}else{
			header("Location:view-c.php?msg=Error adding data try again!&type=error");
		}
	}


		public function insertStudent($post)
	{
		$name=$this->cleanse($_POST['name']);
		$matno=$this->cleanse(strtoupper($_POST['matno']));
		$password=$this->cleanse($_POST['password']);
		$college_id=$this->cleanse($_POST['college_id']);
		$department_id=$this->cleanse($_POST['department_id']);
		$query="INSERT into student(name,matno,password,college_id,department_id) values('$name','$matno','$password','$college_id','$department_id')";
		$query2="INSERT into login(name,email,password,role) values('$name','$matno','$password',3)";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-student.php?msg=Student was created successfully&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-student.php?msg=Error adding data try again!&type=error");
		}
	}


//Inserting with Files

	public function insertBook($post,$file)
	{
		$name=$this->cleanse($_POST['name']);
		$college_id=$this->cleanse($_POST['college_id']);
		$department_id=$this->cleanse($_POST['department_id']);
		$college_name=$this->displayCollegeName($college_id);
		$department_name=$this->displayDepartmentName($department_id);

		$book=$_FILES['book']['name'];
		$temp=$_FILES['book']['tmp_name'];
		$folder="book/" ;  
		$pos=strpos($book,'.');
		$len=strlen($book);
		$ext=substr($book, $pos, $len); 
		$book1=str_replace($book,'.',uniqid().$ext); 
		$bookf='elibrary-'.$faculty_name.'-'.$department_name.'-'.$book1;

		move_uploaded_file($temp,$folder.$bookf)  ;

		$query="INSERT into book(name,college_id,department_id,book) values('$name','$college_id','$department_id','$bookf')";;
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-book.php?msg=Book was successfully inserted&type=success");
		}else{
			header("Location:view-book.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertDataWithFiles($post)
	{
		$value1 = $this->cleanse($_POST['value1']);
		$value2 = $this->cleanse($_POST['value2']);

		$img1=$_FILES['img1']['name'];
		$temp=$_FILES['img1']['tmp_name'];
		$folder="images/" ;  
		$pos1=strpos($img1,'.');
		$len1=strlen($img1);
		$ext1=substr($img1, $pos1, $len1); 
		$imgv1=str_replace($img1,'.',uniqid().$ext1 ); 
		$imgf1='mymodel-'.$imgv1;

		move_uploaded_file($temp,$folder.$imgf1)  ;

		$query="INSERT INTO table(col1,col2) VALUES('$value1','$value2')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:url?msg=Data was successfully inserted&type=success");
		}else{
			header("Location:url?msg=Error adding data try again!&type=error");
		}
	}

//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM {$table} WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}


	
	public function updateAdmin($post)
	{
		$name=$this->cleanse($_POST['name']);
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET name='$name',email='$email',password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}


		public function updateStudent($post)
	{
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET password='$password' WHERE email='$email' ";
		$query2="UPDATE student SET password='$password' WHERE matno='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
			$this->con->query($query2);
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}


	//Search
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}



	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}


}

?>

