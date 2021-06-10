<?php
session_start();
//$id=$_REQUEST['id'];
$code=$_REQUEST['code'];
?>

<?php

$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "DELETE FROM `products` WHERE code='$code'";

if(mysqli_query($link, $sql)){
    echo "Product has been removed";
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
