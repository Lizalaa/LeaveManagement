<!DOCTYPE html>
<html>
<head>
<style type="text/css">
		.form
	{
		width: 200px;
	}
	
</style>
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
      <li ><a href="#">Home</a></li>
      <li><a href="#">User</a></li>
         <li><a href="#">Employee Type Management</a></li>
      <li><a href="#">Leave Type Management</a></li>
       <li><a href="#">Leave Entry</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<h3>Update Your Employee's Leave Record</h3>
<div class="form">
    <form method="POST" action="updateLeave.php">
       <label for="Name">Name</label>
       <input type="text" name="Name" id="Name" value= "<?php echo $_POST['Name']; ?>"><br><br>
        <label for="Description">Description</label>
       <input type="text" name="dec" id="dec" value= "<?php echo $_POST['dec']; ?>"><br><br>
       <input type='hidden' value="<?php echo $_POST['id'];?>" name='id'>
       <input type="submit" name="update" value="Update">
    </form>
    </div>
    </div>
</body>
</html>