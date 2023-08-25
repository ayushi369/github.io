<?php
session_start();
if(!isset($_SESSION['id'])|| !isset($_SESSION['pass']))
{
  header("location: Login.php");
  exit();
}
?>
<?php
 
if(isset($_POST['assign'])){
$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }
  
  $taskname=$_POST['task'];
  $status="Pending";
  $empid=$_POST['id'];
  
  $sql1 = "SELECT*FROM login WHERE empid ='$empid'";
  $result1 = mysqli_query($conn,$sql1);
  $row = mysqli_fetch_array($result1,MYSQLI_ASSOC);
  $count = mysqli_num_rows($result1);
  if($count==1)
  {
    $sql = "INSERT INTO completedtask (employeeid,taskname,status) values ('$empid','$taskname','$status')";
    mysqli_query($conn,$sql);
    header("location: pending.php");
  }
  else
  {
	echo'<script>alert("Entered employeeid does not exist.\nPlease enter valid Employee ID")</script>';
  }
}
?>
<html>
 <head>
 <title> Assign Task</title>
 <link rel="stylesheet" href="assigntask.css">
 </head>
 <body>
 <div class="heading"> <center><a href="Homepage.php"><button type="button" class="button"> Home </button></a><a href="Login.php"><button type="button" class="button"> Logout </button></a><center></div>
    <center><h1>Task Management System</h1></center>
	<form id="f1" method="POST">
  
    <div class = "headingContainer">
	   <h3> Assign Task </h3>
	</div>
	
	<div class="mainContainer">
      <font size="5"> EmployeeID:</font><input type="text" placeholder="Enter EmployeeID" name="id"/><br><br>
	   <font size="5"> Task Name: </font><input type="text" placeholder="Enter Task" name="task"/><br><br>
	   <center> <button type="submit" name="assign" class="assign">ASSIGN</button> </center>
	</div>
  </form>
</body>
</html>