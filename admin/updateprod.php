<?php
session_start();
//$id=$_REQUEST['id'];
$code=$_REQUEST['code'];
$price =  $_REQUEST['price'];
?>

<?php

$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "UPDATE products SET price = '$price' where code='$code'";
if(mysqli_query($link, $sql)){
    echo "Your product price has been updated :)";
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
