<!DOCTYPE html>
<html>
<head>
	<title></title>
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
      <li ><a href="user.php">User</a></li>
        <li  class="active"><a href="Employeemgmt.php">Employee Type Management</a></li>
      <li><a href="LeaveTypeMgmt.php">Leave Type Management</a></li>
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
$sql = "SELECT * FROM user ";
$result = $conn->query($sql);
?>
<div>
<?php
  echo "<h2 align='right'> ";
echo "Hello &nbsp;".$_SESSION['firstname'];
echo "</h2>";
?>
</div>
<div class="container"> 

	<table border="1" class="table table-hover">
		<tr>
		<td >FirstName</td>
		<td >LastName</td>
		<td >Department</td>
		<td >Update</td>
		</tr>
	
	 <?php
	 $row=1;
             while($row = $result->fetch_assoc())

             {
                $_SESSION['id'] = $row['Id'];
                $id= $_SESSION['id'];
                 ?>
             <tr>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['Department']; ?></td> 
                <td>
                <form method="POST" action="delete.php">
                <input type='hidden' value='<?php echo $id;?>' name='id'>
                <input type="submit" name='button' class='btn btn-danger delete' value='Delete'>
                </form>
                <form method="POST" action="updateRecords.php">
                <input type='hidden' value='<?php echo $id;?>' name='id'>
                <input type='hidden' value='<?php echo  $row['FirstName'];?>' name='firstname'>
                <input type='hidden' value='<?php echo  $row['LastName'];?>' name='lastname'>
                <input type='hidden' value='<?php echo  $row['Department'];?>' name='department'>
                <input type="submit" name='button' class='btn btn-primary delete' value='Update'>
                </form>
                 </td>
            </tr>

        <?php

       
             }
    ?>

</table>
<h2>Add User</h2>
<form method="POST" action="user.php">
  <input type="submit" value="Add">
  </form>
</div>


</body>
</html>