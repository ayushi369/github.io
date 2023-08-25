<?php
session_start();
if(!isset($_SESSION['id'])|| !isset($_SESSION['pass']))
{
  header("location: Login.php");
  exit();
}
?>
<?php

$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }
  $match="completed";
 $sql = "SELECT * FROM completedtask WHERE status='$match'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

?>
<html>
 <head>
 <title>Completed Task</title>
 <link rel="stylesheet" href="completed.css">
 </head>
 <body>
 <div class="heading"> <center><a href="Homepage.php"><button type="button" class="button"> Home </button></a><a href="Login.php"><button type="button" class="button"> Logout </button></a><center></div>
    <center><h1>Completed Task</h1></center>
	
       <center> <table border="1" cellpadding="15" height="100" width="1000" cellspacing="0">
		  <tr>
		    <th>Employee ID</th>
			<th>Task ID</th>
			<th>Task Name</th>
			<th>Status</th>
			<th>Remove</th>
	      </tr>
		  <?php while($row = mysqli_fetch_assoc($result))
		  {
	      ?>
		  <form method="POST" action="delete.php">
		  <tr>
		     <td><input type="text" class="text" name="id" value="<?php echo $row['employeeid']; ?>"> </td>
			 <td><input type="text" class="text" name="taskid" value=" <?php echo $row['taskid']; ?>"></td>
			 <td> <?php echo $row['taskname']; ?> </td>
			 <td> <?php echo $row['status']; ?> </td>
			 <td> <input type="submit" name="Delete" class="delete" value="Delete"/></td>
		  </tr>
		  </form>
		  <?php } ?>
		</table></center>
<?php } else {?>
<h1> No Data Found </h1>
<?php } ?>
</body>
</html>