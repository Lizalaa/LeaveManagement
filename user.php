<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.form1
	{
		width: 200px;
	}
	
	.error{
		color:red;
	}
	
	</style>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
   
<nav class="navbar navbar-default"> 
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Leave Management System</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="nav.php">Home</a></li>
      <li class="active"><a href="user.php">User</a></li>
       <li><a href="Employeemgmt.php">Employee Type Management</a></li>
      <li><a href="LeaveTypeMgmt.php" class="active">Leave Type Management</a></li>
       <li><a href="LeaveEntry.php">Leave Entry</a></li>
    </ul>
  </div>
</nav>

<?php
//validation of user form
session_start();
$errFirstname= $errLastname= $errDept= $errType= $errDOB= $errJoin= "";
$firstname = $lastname = $dep = $type  = $dob = $join= "";
$count=0;

if(isset($_POST['submit']))
{
#validating full name
if(empty($_POST['firstname']))
{
	$errFirstname="First name is required";
}
else
{
	if(ereg("^[a-z A-Z]+$", $_POST['firstname']))
	{
		$firstname=$_POST['firstname'];
		$_SESSION['firstname'] = $firstname;
			
	}
	else
	{
		$errFirstname= "Name is not in pattern";
	}
}

if(empty($_POST['lastname']))
{
	$errLastname="last name is required";
}
else
{
	if(ereg("^[a-z A-Z]+$", $_POST['lastname']))
	{
		$lastname=$_POST['lastname'];
		$_SESSION['lastname'] = $lastname;
			
	}
	else
	{
		$errLastname= "Name is not in pattern";
	}
}

if(empty($_POST['department']))
{
	$errDept="department is required";
}
else
{
	
		$dept=$_POST['department'];
			$_SESSION['department'] = $dept;
	}

	if($_POST['month'] =="month" || $_POST['day'] =="day" || $_POST['year'] =="year")
{
	$errDOB="Date of birth is required";
}
else
{	
	$dob=$_POST['year']+"-"+ $_POST['month']+"-"+  $_POST['day'] ;
}

	if($_POST['month'] =="month" || $_POST['day'] =="day" || $_POST['year'] =="year")
{
	$errJoin="Date of join is required";
}
else
{	
	$join=$_POST['year']+"-"+ $_POST['month']+"-"+  $_POST['day'] ;
}

if(empty($_POST['type']))
{
	$errType="Type is required";
}
else
{
	$type=$_POST['type'];
		$_SESSION['type'] = $type;
}

if(!$errFirstname && !$errLastname && !$errDept && !$errType && !$errDOB && !$errJoin )
{

// Create connection
$conn = mysqli_connect('localhost','root','','demoproject');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `user`(`Id`, `FirstName`, `LastName`, `Department`, `DOB`, `JoinDate`, `Type`) VALUES (NULL,'$firstname','$lastname','$dept','$dob','$join','$type') ";
$result = $conn->query($sql);

echo "Inserted";


	header("Location:login.php");
}
}
//validation ends
?>

<div class="container">
			<div class="user-info">
			<form  class="form2" name="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			
			<h3 class="text-center">User Info</h3>
				  <div class="form">
				  
				  	<div>
				  		<div class="left-input">
						  	<div>
						  		<label for="firstname">First Name</label>
						  	</div>	
						  	<div class="form1">
						  		<input type="text" name="firstname" placeholder="write your name" id="firstname" class="firstname form-control">
						  		<span class ="error"> <?php echo $errFirstname; ?> </span>
</div>
</div>

<div class="right-input">
						  	<div>
						  		<label for="lastname">Last Name</label>
						  	</div>	
						  	<div class="form1">
						  		<input type="text" name="lastname" placeholder="write your caste" id="lastname" class="lastname form-control">
								<span class ="error"> <?php echo $errLastname; ?> </span>
						  	</div>
						</div>



					<div>
				  		<label for="department" >Department</label>
				  	</div>
				  	<div class="form1">
				  		<input type="text" name="department" placeholder="write your department" id="department" class="department form-control">
				  	<span class ="error"> <?php echo $errDept; ?> </span>
				  	</div>

				  
				  	<div class="date">
				  	<label for="DOB">DOB</label>
				  	<br>
					<select name="month">

					<OPTION value="month">Month</OPTION>
			<?php
			for($i=1;$i<=12;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select> -
				<select name="day">
				<OPTION value="day">Day</OPTION>
				<?php
			for($i=1;$i<=31;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select>-
				<select name="year">
				<OPTION value="year">Year</OPTION>
				<?php
			for($i=2000;$i<=2030;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
			</select><span class="error"><?php echo $errDOB; ?></span>
			</div>


			<div class="join date">
				  	<label for="joindate">joindate</label>
				  	<br>
					<select name="month">

					<OPTION value="month">Month</OPTION>
			<?php
			for($i=1;$i<=12;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select> -
				<select name="day">
				<OPTION value="day">Day</OPTION>
				<?php
			for($i=1;$i<=31;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select>-
				<select name="year">
				<OPTION value="year">Year</OPTION>
				<?php
			for($i=2000;$i<=2030;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
			</select><span class="error"><?php echo $errJoin; ?></span>
			</div>
				  	<div>
				  		
							<input type="radio"  id="Admin" value="Admin" name="type" > Admin
						
					
						
							<input type="radio" id="Employee" value="Employee" name="type"> Employee
						
						
						<span class= "error"> <?php echo $errType; ?></span>
					</div>
					<div>
						<input type="submit" value="Insert" name="submit" />
					</div>
					</div>


</form>
	</div>
</div>
</body>
</html>