
<?php
session_start();

if(isset($_POST['login'])){
$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }
 

$username=$_POST['userid'];
$password=$_POST['passwd'];

$sql = "SELECT*FROM login WHERE userid='$username' and password='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
   if($count==1)
   {
	  $_SESSION['id']=$username;
	  $_SESSION['pass']=$password;
      header("location:Homepage.php");	
	  exit();
   }
   
   else
   {
	   echo'<script>alert("Invalid Password or Username")</script>';
   }
}
?>

<html>
<head>
<title> Login Page </title>
<link rel="stylesheet" href="Loginpage.css">
</head>
<body>
  <form id="f1" method="POST">
  
    <div class = "headingContainer">
	   <h3> Login </h3>
	</div>
	
	<div class="mainContainer">
      <font size="5"> UserID:</font><input type="text" placeholder="Enter UserID" name="userid"/><br><br>
	   <font size="5"> Password: </font><input type="password" placeholder="Enter Password" name="passwd"/><br><br>
	   <center> <button type="submit" name="login">Sign In</button> </center>
	</div>
  </form>
</body>
</html>