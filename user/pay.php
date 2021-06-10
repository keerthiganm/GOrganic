<?php
session_start();
$uname=$_SESSION['sess_user'];
$delname =  $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$mail=$_REQUEST['email'];
$addr =  $_REQUEST['add'];
$code="";
?>
<!-- print_r($_SESSION['shopping_cart'][$code]['price']); -->
<?php

$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$c=0;
$price=0;
while($c<$_SESSION['no_of_items'])
{
    $items=$_SESSION['ord'][$c++];
    $quantity=$_SESSION['shopping_cart'][$items]['quantity'];
    $code=$items.'-'.$quantity.','.$code;
    $price=$price+$quantity*$_SESSION['shopping_cart'][$items]['price'];
}
// $orders=preg_replace('/\W\w+\s*(\W*)$/', '$1', $code);
$sql = "INSERT INTO customer_order (username, deliver_to, code, price, phone, addr,ordertime) VALUES ('$uname','$delname','$code','$price','$phone','$addr',CURRENT_TIMESTAMP())";
if(mysqli_query($link, $sql)){
    echo " ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sql = "SELECT * FROM customer_order";
$result = mysqli_query($link,$sql);
while($rows=$result->fetch_assoc()) 
                { 
                $id=$rows['id'];
                }  
// Close connection
mysqli_close($link);
?> 

<?php

$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO yet_to_deliver (id,username, deliver_to, code, price, phone, addr,ordertime) VALUES ('$id','$uname','$delname','$code','$price','$phone','$addr',CURRENT_TIMESTAMP())";
if(mysqli_query($link, $sql)){
    echo " ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?> 

<?php
$to = "$mail";
$subject = "GOrganic";

$message = "
Hello $delname,
your order $code ,ordered by $uname have been successfully placed :)

Order summary
Item subtotal  Rs.$price

For other similar proucts visit www.GOrganic.com
";

// Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// // More headers
// $headers .= 'From: keerthy0212@gmail.com' . "\r\n";


mail($to,$subject,$message);
?>

<?php
$to = "gorganic.fresh@gmail.com";
$subject = "GOrganic";

$message = "
NEW ORDER
A order has been placed by $uname,

The order is $code

Delivery address:
$addr

Order summary
Item subtotal  Rs.$price
";

// Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// // More headers
// $headers .= 'From: keerthy0212@gmail.com' . "\r\n";


mail($to,$subject,$message);
?>

<!DOCTYPE html>
<html>
<style>
   body{
            background-image:url("bg.jpg");
            background-blend-mode: lighten;
            background-repeat:no-repeat;
            background-size:cover;
        }
        .tabs{
			text-transform: uppercase;
            background: #F68B1E;
            border: 1px solid #F68B1E;
            cursor: pointer;
            color: #fff;
            padding: 8px 40px;
            margin: 10px;
            width:50%;
		}
        p{
            color:white;
            font-size:20px;
            font-style:
        }
</style>
<link rel="stylesheet" href="review.css"> 
<body>
<div class="con">
<div class="centerdiv">
<div class="review-card">
<p>
<?php
 echo "Hello $uname,
 your order,<br>";
 echo "$code<br>" ;
 echo "placed under the name-$delname have been successfully placed :)";
 echo "<br><br>";
 echo "Order summary:";
 echo "<br>";
 echo "Item subtotal  Rs.$price";
?>
<br><br>
Payment mode:Pay On Delivery</p>
<center><a href="index.php"><button class="tabs">Back</button></a>
<a href="recent.php"><button class="tabs">Recent Orders</button></a></center>
</div></div></div>
</body>
</html>