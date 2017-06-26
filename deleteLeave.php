<?php 

$conn = mysqli_connect('localhost','root','','demoproject');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{

$rev = $_POST['ID'];

$delete = "DELETE FROM `leavetype` WHERE `Id` = '$rev' ";

if(mysqli_query($conn, $delete))
{
	header('Location:../Demo/LeaveTypeMgmt.php');
}

}
 ?>