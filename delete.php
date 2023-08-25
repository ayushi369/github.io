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
$employeeid = $_POST['id'];
$taskid = $_POST['taskid'];
$sql = "DELETE FROM completedtask WHERE employeeid='$employeeid' AND taskid='$taskid'";

if(mysqli_query($conn,$sql)==TRUE)
{
  header("location: completed.php");
}
else
{
  echo "Error in deleting record:".mysqli_connect_error();
}
?>