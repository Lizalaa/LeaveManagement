uu<!DOCTYPE html>
<html>
<head>
	<title></title>
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
      <li ><a href="nav.php">Home</a></li>
      <li><a href="user.php">User</a></li>
         <li><a href="Employeemgmt.php">Employee Type Management</a></li>
      <li><a href="LeaveTypeMgmt.php" class="active">Leave Type Management</a></li>
       <li class="active"><a href="LeaveEntry.php">Leave Entry</a></li>
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
$sql = "SELECT user.FirstName,dleave.From, dleave.To,leavetype.Name,leavecategory.CName FROM user 
    JOIN dleave ON
        user.Id=dleave.Id
    JOIN leavetype ON
        user.Id=leavetype.Id
    JOIN leavecategory ON
        user.Id=leavecategory.Id";
$result = $conn->query($sql);



?>



<div class="container">


	<table border="1" id="dashboard" class="table table-hover">
		<tr>
		<td >FirstName</td>
        <td>Leave start date</td>
           <td>Leave end date</td>
		<td >Leave type</td>
        <td >Leave category</td>
		
		</tr>
        <?php
     $row=1;
             while($row = $result->fetch_assoc())

             {
                 ?>
            <tr>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['From']; ?></td>
                <td><?php echo $row['To']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['CName']; ?></td>
                </tr>
                <?php
                }
                ?>
	


</table>


</div>


</body>
</html>