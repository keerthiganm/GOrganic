<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>  
<?php  
// Username is root 
$user = 'root'; 
$password = '';  
$database = 'user-registeration';  
$servername='localhost'; 
$mysqli = new mysqli($servername, $user, $password, $database); 
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 
  $uname=$_SESSION['sess_user'];
  echo $uname;
// SQL query to select data from database 
$sql = "SELECT username,phone FROM user_details where username='".$uname."'";  
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 
<?php
while($row=$result->fetch_assoc())  
{  
$username=$row['username'];  
$phone=$row['phone'];
}  
?>
<?php  
}  
?> 
<?php  
echo $username;
echo $phone;   
?> 
