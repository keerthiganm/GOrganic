<?php
session_start();
//$id=$_REQUEST['id'];
$name =  $_REQUEST['name'];
$code=$_REQUEST['code'];
$price =  $_REQUEST['price'];
$image =  $_REQUEST['image'];
$desc=$_REQUEST['desc'];
?>

<?php

$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO products (id,name,code,price,image,description) VALUES ('','$name','$code','$price','$image','$desc')";
if(mysqli_query($link, $sql)){
    echo "Your product has been added :)";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?> 

<html>
<a href="products.php"><button>Products</button></a>
<form action="admin.php">
    <input type="submit" value="Back">
    </form>    
</html>
