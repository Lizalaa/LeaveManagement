<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	.error{
		color:red;
	}
	form div
	{
		padding: 10px;
	}

	.leave-info
	{
		width: 250px;
	}
</style>
	<title>Leave Type</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Leave Management System</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="user.php">User</a></li>
         <li><a href="Employeemgmt.php">Employee Type Management</a></li>
      <li><a href="LeaveTypeMgmt.php" class="active">Leave Type Management</a></li>
       <li><a href="LeaveEntry.php">Leave Entry</a></li>
    </ul>
  </div>
</nav>

<?php 
$errName=$errDes="";
$name=$des="";

if (isset($_POST['submit']))
 {
	if(($_POST['leavename'])== "-1")
	{
		$errName="Please select a name";
	}
	else
	{
		$name=$_POST['leavename'];
		
	}

	if(empty($_POST['des']))
	{
		$errDes="Please give a description";
	}
	else
	{
		$des=$_POST['des'];
	}

if (!$errName && !$errDes)
 {
	// Create connection
$conn = mysqli_connect('localhost','root','','demoproject');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `LeaveType`(`Id`, `Name`, `Description`) VALUES (NULL,'$name','$des') ";
$result = $conn->query($sql);

echo '<div class="container">
  <div class="alert alert-success alert-dismissible" id="myAlert">
    <a href="#" class="close">&times;</a>
    <strong>Success!</strong>Data inserted
  </div>
</div>

<script>
$(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").alert("close");
    });
});
</script>';

}
}
?>



	<div class="container">
	<h3>Leave Type</h3>
			<div class="leave-info">
<form name="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<div>
		<label for="name">Name</label>
		<select name="leavename" class="leavename form-control">
<option value = "-1"> Select a leave name..</option>
<option value = "Public"> Public</option>
<option value = "Annual"> Annual</option>
<option value = "Unpaid"> Unpaid</option>
<option value = "Sick"> Sick</option>
</select>
<span class ="error"> <?php echo $errName; ?></span>
	</div>

	<div>
	<label for="description">Description</label>
		<textarea name="des" rows="5" cols="30" class="leavename form-control"></textarea>
		<span class ="error"> <?php echo $errDes; ?></span>
	</div>
	<div><input type="submit" name="submit" value="Insert"></div>
</form>
</div>



			<ul class="pagination">
  <li ><a href="nav.php">1</a></li>
  <li ><a href="LeaveCategory.php">2</a></li>
  <li class="active"><a href="LeaveType.php">3</a></li>
  <li ><a href="Leave.php">4</a></li>
  <li class="disabled"> <a href="#">5</a></li>
</ul>
</div>

</body>
</html>