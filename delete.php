<?php 

$conn = mysqli_connect('localhost','root','','demoproject');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rev = $_POST['id'];

$remove = "DELETE FROM `user` WHERE `Id` = '$rev'";

if(mysqli_query($conn,$remove))
{
	header('Location:../Demo/Employeemgmt.php');
}


 ?>