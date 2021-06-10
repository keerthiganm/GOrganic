<?php   
session_start();  
$id=$_REQUEST['id'];
if(!isset($_SESSION["sess_user"])){  
    header("location:adminlogin.php");  
} else {  
?>  
<?php  
// Username is root 
$user = 'root'; 
$password = '';  
$database = 'order';  
$servername='localhost'; 
$mysqli = new mysqli($servername, $user, $password, $database); 
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 
  $uname=$_SESSION["sess_user"];
// SQL query to select data from database 
$sql = "SELECT * FROM customer_order where id='$id'";
$result = $mysqli->query($sql); 
while($rows=$result->fetch_assoc()) 
{ 
    $id=$rows['id'];
    $uname=$rows['username'];
    $deliver_to=$rows['deliver_to'];
    $code=$rows['code'];
    $price=$rows['price'];
    $phone=$rows['phone'];
    $addr=$rows['addr'];
    $ordertime=$rows['ordertime']; 
}
$mysqli->close();  
?> 
<?php  
}  
?> 


<?php
//session_start();
//$id=$_REQUEST['id'];


$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO delivered (id,username,deliver_to,code,price,phone,addr,ordertime) VALUES ('$id','$uname','$deliver_to','$code','$price','$phone','$addr','$ordertime')";
if(mysqli_query($link, $sql)){
    header("Location: deliveredorder.php");  ;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?> 


<?php
//session_start();
//$id=$_REQUEST['id'];


$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "DELETE FROM `yet_to_deliver` WHERE id='$id'";
if(mysqli_query($link, $sql)){
    echo "" ;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?> 

