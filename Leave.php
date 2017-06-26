<!DOCTYPE html>
<html>
<head>
	<title></title>
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
$errFrom=$errTo=$errNote="";
$from=$to=$note="";

if(isset($_POST['submit']))
{

	if($_POST['month'] =="month" || $_POST['day'] =="day" || $_POST['year'] =="year")
{
	$errFrom="Empty";
}
else
{	
	$from=$_POST['year']+"-"+ $_POST['month']+"-"+  $_POST['day'] ;
}


	if($_POST['month'] =="month" || $_POST['day'] =="day" || $_POST['year'] =="year")
{
	$errTo="Empty";
}
else
{	
	$to=$_POST['year']+"-"+ $_POST['month']+"-"+  $_POST['day'] ;
}

if(empty($_POST['note']))
	{
		$errNote="Please leave a note";
	}
	else
	{
		$note=$_POST['note'];
	}

	if (!$errFrom && !$errTo && !$errNote)
 {
	// Create connection
$conn = mysqli_connect('localhost','root','','demoproject');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `dleave`(`Id`, `UserId`, `TypeId`, `CategoryId`, `From`, `To`, `Note`) VALUES (NULL,'SELECT Id FROM user WHERE user.Id=dleave.Id','SELECT Id FROM leavetype WHERE leavetype.Id=dleave.Id','SELECT Id FROM leavecategory WHERE leavecategory.Id=dleave.Id','$from','$to','$note')";
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
		<h3>Leave Info</h3>
			<div class="leave-info">

			<form name="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				

			<div class="from">
				  	<label for="from">From</label>
				  	<br>
					<select name="month" class="month form-control">

					<OPTION value="month">Month</OPTION>
			<?php
			for($i=1;$i<=12;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select> -
				<select name="day" class="day form-control">
				<OPTION value="day">Day</OPTION>
				<?php
			for($i=1;$i<=31;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select>-
				<select name="year" class="year form-control">
				<OPTION value="year">Year</OPTION>
				<?php
			for($i=2000;$i<=2030;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
			</select><span class="error"><?php echo $errFrom; ?></span>
			</div>



			<div class="To">
				  	<label for="To">To</label>
				  	<br>
					<select name="month" class="month form-control">

					<OPTION value="month">Month</OPTION>
			<?php
			for($i=1;$i<=12;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select> -
				<select name="day" class="day form-control">
				<OPTION value="day">Day</OPTION>
				<?php
			for($i=1;$i<=31;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
				</select>-
				<select name="year" class="year form-control">
				<OPTION value="year">Year</OPTION>
				<?php
			for($i=2000;$i<=2030;$i++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
			</select><span class="error"><?php echo $errTo; ?></span>
			</div>

			<div>
				<label for="note">Note</label>
				<br>
				<textarea name="note" rows="5"  cols="20" class="note form-control"></textarea>
						<span class ="error"> <?php echo $errNote; ?></span>
			</div>

			<div><input type="submit" name="submit" value="Insert"></div>

			
			</form>
			</div>
			

			<ul class="pagination">
  <li ><a href="nav.php">1</a></li>
  <li><a href="LeaveCategory.php">2</a></li>
  <li ><a href="LeaveType.php">3</a></li>
  <li class="active"><a href="Leave.php">4</a></li>
  <li class="disabled"> <a href="#">5</a></li>
</ul>
</div>
</body>
</html>