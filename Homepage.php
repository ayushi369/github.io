<?php
session_start();
if(!isset($_SESSION['id'])|| !isset($_SESSION['pass']))
{
  header("location: Login.php");
  exit();
}
?>
<html>
 <head>
 <title> Home Page</title>
 <link rel="stylesheet" href="Homepage.css">
 </head>
 <body>
 <div class="heading"> <a href="Login.php"><center><button type="button"> Logout </button><center></a></div>
    <center><h1>Task Management System</h1></center>
    <div class="container">
	   <div class="circle1"><a href="assigntask.php	" style="text-decoration:none;color:black;"><img src="add Task.png" height="120px" width="120px" class="img"><br><p>Add Task</p></img></a></div>
	   <div class="circle1"><a href="completed.php" style="text-decoration:none;color:black;"><img src="completed task.jpeg" height="120px" width="120px" class="img"><br><p>Completed Task</p></img></a></div>
	   <div class="circle1"><a href="pending.php" style="text-decoration:none;color:black;"><img src="pending task.jpg" height="120px" width="120px" class="img"><br><p>Pending Task</p></img></a></div>
	</div>
	
 </body>
 </html>