
<?php
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['pass']))
{
  header("location: Login.php");
  exit();
}
$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }
 $match="pending";
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
    <center><h1>Pending Task</h1></center>
	
       <center> <table border="1" cellpadding="15" height="100" width="1000" cellspacing="0">
		  <tr>
		    <th>Employee ID</th>
			<th>Task ID</th>
			<th>Task Name</th>
			<th>Status</th>
	      </tr>
		  <?php while($row = mysqli_fetch_assoc($result))
		  {
	      ?>
		  <tr>
		     <td><!--<input type="text" name="id" value=""--><?php echo $row['employeeid'];?> </td>
			 <td> <?php echo $row['taskid']; ?> </td>
			 <td> <?php echo $row['taskname']; ?> </td>
			 <td> <a href="pending1.php?employeeid=<?php echo $row['employeeid'];?>&taskid=<?php echo $row['taskid']; ?>"><?php echo $row['status']; ?></a> </td> 
		  </tr>
		  
		  <?php } ?>
		</table></center>
<?php } else {?>
<h1> No Data Found </h1>
<?php } ?>
</body>
</html>