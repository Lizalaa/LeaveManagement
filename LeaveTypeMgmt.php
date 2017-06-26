<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">


</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Leave Management System</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="nav.php">Home</a></li>
      <li><a href="user.php">User</a></li>
      <li><a href="Employeemgmt.php">Employee Type Management</a></li>
      <li><a href="LeaveTypeMgmt.php" class="active">Leave Type Management</a></li>
       <li><a href="LeaveEntry.php">Leave Entry</a></li>
    </ul>
  </div>
</nav>
  

<?php

 session_start();
 
 ?>
<?php
// Create connection
$conn = mysqli_connect('localhost','root','','demoproject');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM leavetype ";
$result = $conn->query($sql);



?>

<?php
  echo "<h2 align='right'> ";
echo "Hello &nbsp;".$_SESSION['firstname'];
echo "</h2>";
?>
<div class="container">


	<table border="1" id="tbUser" class="table table-hover">
		<tr>
		<td >Name</td>
		<td >Description</td>
		<td >Select</td>
		</tr>
	
	 <?php
	    while($row = $result->fetch_assoc())

             {
                 
                $id = $row['Id'];
                 ?>
             <tr>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><form method="POST" action="deleteLeave.php">
                <input type='hidden' value='<?php echo $id;?>' name='ID'>
                <input type="submit" name='button' class='delete' value='Delete'>
                </form>
                <form method="POST" action="updateRecordsLeave.php">
                <input type='hidden' value='<?php echo $id;?>' name='id'>
                <input type='hidden' value='<?php echo  $row['Name'];?>' name='Name'>
                <input type='hidden' value='<?php echo  $row['Description'];?>' name='dec'>
                <input type="submit" name='button' class='delete' value='Update'>
                </form>
                 </td>
            </tr><?php
             }
             ?>

</table>
</table>
<h2>Add User</h2>
<form method="POST" action="user.php">
  <input type="submit" value="Add">
  </form>
</div>


</div>



</body>
</html>