<!DOCTYPE html>
<html>


<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style1.css">
</head>




<body>
<?php
session_start();  
$dbname = "signin";
$conn = mysqli_connect("localhost","root", "",$dbname);

$id =$_POST['lname'];
$_SESSION['sess_user']=$id;
$psw =$_POST['lpass'];



if($id == ""||$psw == ""){

    if($id=="")
    {
    echo'<script type="text/javascript">alert("Username Required!");history.go(-1);</script>';
    die();
}
if($psw=="")
    {
    echo'<script type="text/javascript">alert("Password Required!");history.go(-1);</script>';
    die();
}


}




$sql="SELECT ID,Password FROM signindetails where ID='".$id."' AND Password='".$psw."'limit 1;";
$result = mysqli_query($conn,$sql);
if($result === FALSE){
       echo mysqli_error($conn);
    die();
}


$count = mysqli_num_rows($result);

if ($count == 1){
    
    header('Location: home.html');

}else{
    
   echo '<script type="text/javascript">alert("Invalid Username/Password.");history.go(-1);</script>';
   echo "<script>location,href='projects/login.php'</script>";
 
}

?>





</body>
</html>