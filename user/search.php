<?php
session_start();
$code=$_REQUEST['search'];
$status="";
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
// SQL query to select data from database 
$sql = "SELECT * FROM products WHERE code LIKE '%$code%'";  
$result = $mysqli->query($sql); 
while($row = mysqli_fetch_assoc($result))
{
    $name = $row['name'];
    $code = $row['code'];
    $price = $row['price'];
    $image = $row['image'];		
}
$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

}

?> 

<html>
	<style>
		.tabs{
			text-transform: uppercase;
            background: #F68B1E;
            border: 1px solid #F68B1E;
            cursor: pointer;
            color: #fff;
            padding: 8px 40px;
            margin: 10px;
		}
        body{
            background-image:url("bg.jpg");
            background-blend-mode: lighten;
            background-repeat:no-repeat;
            background-size:cover;
        }
        .image{
            object-fit: contain;
        }
        .buy{
            background: #F68B1E;
            border: 1px solid #F68B1E;
            cursor: pointer;
            width:25%;
            margin-top:5px;
            margin-bottom:5px;
        }
        .name{
            font-size:50px;
        }
        .price{
            font-size:20px;
        }
        .message_box{
	        margin: 10px 0px;
            border: 1px solid #2b772e;
            text-align: center;
            font-weight: bold;
            color: #2b772e;
            background-color:white;
	    }
        .cart_div {
	        float:right;
	        font-weight:bold;
	        position:relative;
	}
        .cart_div a {
	        color:#000;
	    }	
        .cart_div span {
	    font-size: 12px;
        line-height: 14px;
        background: #F68B1E;
        padding: 2px;
        border: 2px solid #fff;
        border-radius: 50%;
        position: absolute;
        top: -1px;
        left: 13px;
        color: #fff;
        width: 14px;
        height: 13px;
        text-align: center;
	}
    .search{
       width:25%;
       margin:10px;
       padding: 8px 40px;
       border: 1px solid #F68B1E;
    }
	</style>

<head>
<title>Shopping cart</title>
<div class="otherlinks" style="float:left;">
<a href="recent.php"><button name="recent" class="tabs">Orders</button></a>
<a href="review.php"><button name="reviews" class="tabs">reviews</button></a>
</div>

<a href="index.php" ><button name="all" class="tabs">Products</button></a>
<a href="logout.php" style="float:right;"><button name="logout" class="tabs">Logout</button></a>


<link rel='stylesheet' href='review.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div" >
<a href="orders.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$sql = "SELECT * FROM products WHERE code LIKE '%$code%'";  
$result = $mysqli->query($sql); 
while($row = mysqli_fetch_assoc($result))
{
		echo "<div class='con'>
              <div class='centerdiv'>
              <div class='review-card'>
			  <form method='post' action='orders.php'>
			  <input type='hidden' name='code' value=".$row['code']." />
              <div class='name'>".$row['name']."</div>
			  <div class='image'><img src='".$row['image']."' /></div>
		   	  <div class='price'>Rs".$row['price']."/kg</div>
              <div class='desc review-card'>".$row['description']."</div>
			  <center><button type='submit' class='buy'>Buy Now</button><center>
			  </form>
		   	  </div>
              </div>
              </div>";
}
$mysqli->close();  
?>

<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />
</div>
</body>
</html>
