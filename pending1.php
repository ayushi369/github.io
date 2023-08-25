<?php
if(isset($_GET['employeeid']) && isset($_GET['taskid']))
{
   error_reporting(E_ALL);
   ini_set('display_errors',1);
   
   $servername="localhost";
   $username="root";
   $password="";
   $dbname='task';

   $conn = new mysqli($servername,$username,$password,$dbname);

   if($conn->connect_error)
   {
     die("Connection Failed:" .connect_error);
   }
   $employeeid = $_GET['employeeid'];
   $taskid = $_GET['taskid'];
   
   $sql = "UPDATE completedtask SET status='completed' WHERE employeeid='$employeeid' AND taskid='$taskid'";
   
   if(mysqli_query($conn,$sql)== TRUE)
   {
    header("location: completed.php");
   }
    else
	{
	  echo "Error in updating record:".mysqli_error($conn);
	}
}
?>
   