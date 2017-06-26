<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php

 session_start();
 
 ?>

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
  echo "<h2 align='center'> ";
echo "Hello &nbsp;".$_SESSION['firstname'];
echo "</h2>";
?>
<div class="container">
  <h3>Records of employees</h3>

 <?php
// Create connection
$conn = mysqli_connect('localhost','root','','demoproject');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT user.FirstName, leavetype.Name
FROM user
INNER JOIN leavetype ON user.Id=leavetype.Id";
$result = $conn->query($sql);



?>



<div>


	<table border="1" id="dashboard" class="table table-hover">
		<tr>
		<td >Name</td>
        <td>Type of leave</td>
		<td >No. of leaves</td>
		
		</tr>
        <?php
     $row=1;
             while($row = $result->fetch_assoc())

             {
                 ?>
            <tr>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                </tr>
                <?php
                }
                ?>
	


</table>
</div>

<ul class="pagination">
  <li class="active"><a href="#">1</a></li>
  <li><a href="LeaveCategory.php">2</a></li>
  <li><a href="LeaveType.php">3</a></li>
  <li><a href="Leave.php">4</a></li>
  <li class="disabled"> <a href="#">5</a></li>
</ul>

</div>
</body>
</html>