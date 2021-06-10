<!DOCTYPE html>
<html>


<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style1.css">
</head>




<body>
<?php
$dbname = "signin";
$conn = mysqli_connect("localhost","root", "",$dbname);
$sql ="CREATE TABLE signindetails(ID VARCHAR(10) not null,
Name VARCHAR(10) not null,
Email VARCHAR(20) not null,
Mobile_No VARCHAR(10) not null,
Password VARCHAR(15) not null,
District VARCHAR(15) not null,
Address VARCHAR(50) not null,

PRIMARY KEY(ID,Mobile_No)
);";
$res1 = mysqli_query($conn,$sql);
$id =$_POST['suser'];
$name =$_POST['sname'];
$email =$_POST['sem'];
$mno =$_POST['smb'];
$psw=$_POST['spass'];
$dis=$_POST['sids'];
$add =$_POST['sadd'];


if($id == ""||$name == ""||$email == ""||$mno==""||$psw == ""||$dis == ""||$add=""){
    echo '<script type="text/javascript">alert("Please Fill all the details!");history.go(-1);</script>';
    die();
}


$sql2 = "INSERT INTO signindetails(ID,Name,Email,Mobile_No,Password,District,Address) VALUES('$id','$name','$email','$mno','$psw','$dis','$add');";
$res2 = mysqli_query($conn,$sql2);

if($res2 === FALSE){
    echo mysqli_error($conn);
 echo '<script type="text/javascript">alert("Username/Mobile Number already Register-Try another");history.go(-1);</script>';
    die();
}
$result = mysqli_query($conn,"SELECT * FROM signindetails;");
if($result === FALSE){
    echo mysqli_error($conn);
    die();
}



 
    header('Location: login.php');

   

?>










</body>
</html>



<?php
include('login.php');
?>