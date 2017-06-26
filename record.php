<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
// Create connection
$conn = mysqli_connect('localhost','root','','demoproject');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM record ";
$result = $conn->query($sql);

?>
<div>
<table border="1">
	<?php
	 
             while($row = $result->fetch_assoc())

             {
                 ?>
<tr>
             <td><?php echo $row['Records']; ?></td>
             </tr>
          <?php

       
             }
             ?>
             </table>
</div>
</body>
</html>