<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
    .form
  {
    width: 200px;
  }
  
</style>
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
<h3>Update Your Employee's Record</h3>
<div class="form">

    <form method="POST" action="update.php">
       <label for="firstName">FirstName</label>
       <input type="text" name="firstName" id="firstName" value= "<?php echo $_POST['firstname']; ?>" class="firstname form-control"><br><br>
        <label for="lastName">LastName</label>
       <input type="text" name="lastName" id="lastName" value= "<?php echo $_POST['lastname']; ?>" class="lastname form-control"><br><br>
        <label for="department">Department</label>
       <input type="text" name="department" id="department" value= "<?php echo $_POST['department']; ?>" class="department form-control"><br><br>
       <input type='hidden' value="<?php echo $_POST['id'];?>" name='id'>
       <input type="submit" name="update" value="Update">
    </form>
    </div>
    </div>
</body>
</html>