<?php 

$conn = mysqli_connect('localhost','root','','demoproject');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['update']))
{
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$depart = $_POST['department'];

$rev = $_POST['id'];
echo $rev;

$update = "UPDATE `user` SET `FirstName` = '$fname', `LastName` = '$lname', `Department` = '$depart' WHERE `Id` = '$rev'";

if(mysqli_query($conn,$update))
{
	header('Location:../Demo/Employeemgmt.php');
}

}
 ?>