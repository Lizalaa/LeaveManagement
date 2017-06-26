<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
		<style> 
    .error{
		color:red;
	}
	.form
	{
		width: 200px;
	}
	
</style>
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
      <li ><a href="#">Home</a></li>
      <li><a href="#">User</a></li>
         <li><a href="#">Employee Type Management</a></li>
      <li><a href="#">Leave Type Management</a></li>
       <li><a href="#">Leave Entry</a></li>
    </ul>
  </div>
</nav>


<?php
session_start();
$errusername= $errpassword="";
$username= $password="";


if(isset($_POST['btn']))
{
	
//validating username
  if(empty($_POST['username']))
    {
     $errusername="*User Name is empty";
    }
   else
    {
    $username=$_POST['username'];
    }
	
	
	
	
//validating password
  if(empty($_POST['password']))
    {
     $errpassword="*Password is empty";
    }
   else
    {
    $password=$_POST['password'];
    }

    if(!$errusername && !$errpassword)
    {

    	$link = mysql_connect('localhost','root','');
if(!$link)
{
	die('error'.mysql_error());
}
mysql_select_db("demoproject",$link);
	 $name=$_POST['username'];
 $_SESSION['firstname']=$name;
 $sql="SELECT FirstName from `user`   /*DATABASE KO Name and Password */
 		WHERE Firstname='$name' ";
 		$result=mysql_query($sql);
 		$q=mysql_num_rows($result);   //mysql_num_rows: number of rows
 		if($q)
 		{
 			header("Location:nav.php");
 		}
 		else
 		{
 			echo "<script>
			alert('Login Failed');
			window.history.go(-1);
			</script>";
 		}
	}
}
	?>

	<div class="container">
	
<div class="form">
	<h3>Login Here</h3>
	<form  class="form2" name="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			
	
				  <div class="form">
				  
				  	<div>
				  		<div class="left-input">
						  	<div>
						  		<label for="firstname">First Name</label>
						  	</div>	
						  	<div class="form1">
						  		<td><input type="text" placeholder="Admin's name" name="username" id="username" class="firstname form-control">
						  		<span class ="error"> <?php echo $errusername; ?> </span>
</div>
</div>

<div class="right-input">
						  	<div>
						  		<label for="password">Password</label>
						  	</div>	
						  	<div class="form1">
						  		<input type="password"  name="password" id="password" class="password form-control">
						  		<span class ="error"> <?php echo $errpassword; ?> </span> </span>
						  	</div>
						</div>

<div><input type="submit" name="btn" value ="Login" id="btn"></div>
	
</div>
</div>
</body>
</html>