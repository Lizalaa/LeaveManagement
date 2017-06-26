<?php 

$conn = mysqli_connect('localhost','root','','demoproject');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['update']))
{
$name = $_POST['Name'];
$dec = $_POST['dec'];


$rev = $_POST['id'];
echo $rev;

$update = "UPDATE `leavetype` SET `Name` = '$name', `Description` = '$dec' WHERE `Id` = '$rev'";

if(mysqli_query($conn,$update))
{
	header('Location:../Demo/LeaveTypeMgmt.php');
}

}
 ?>