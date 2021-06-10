<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
	<style>
		body{
			background-image:url("bg.jpg");
            background-blend-mode: lighten;
            background-repeat:no-repeat;
            background-size:cover;
		}
		.con {
			background-color: rgba(40, 39, 41, 0.829);
            display: flex;
            justify-content: center;
            align-items:flex-start;
            padding: 20px;
            width: min-content;
            height: min-content;
            flex-direction: column;
            margin: 5vh auto;
        }

        .centerdiv {
            min-width: 600px;
            overflow-y: auto;
            max-height: 100vh;
            padding: 10px;
            margin: 0px;
        }
		.card {
            margin: 5px;
            color: white;
            border: 1px solid white;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        }
		td{
			color:white;
		}
		.tabs{
			text-transform: uppercase;
            background: #F68B1E;
            border: 1px solid #F68B1E;
            cursor: pointer;
            color: #fff;
            padding: 8px 40px;
            margin: 10px;
		}
		.rem {
            background: none;
            border: none;
            color:#F68B1E;;
			font-weight:bold;
            cursor: pointer;
            padding: 0px;
	    }
        .rem:hover {
	        text-decoration:underline;
	}
		
	</style>
<head>
<title>Shopping Cart</title>
<link rel='stylesheet' href='style.css' type='text/css' media='all' />
</head>
<body>

<a href="index.php" style="float:left;"><button name="back" value="back" style="float:right" class="tabs">Back</button></a>
<a href="logout.php" style="float:right;"><button class="tabs">LOG OUT</button></a>

<div style="width:700px; margin:50 auto;">


<center><h2 style="color:black;font-size:50px;">GOrganic</h2></center>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
$_SESSION["no_of_items"]=$cart_count;
?>

<?php
// print_r($_SESSION);
if(!empty($_SESSION["shopping_cart"])) {
$cart_order = (array_keys($_SESSION["shopping_cart"]));
$_SESSION["ord"] = $cart_order;
?>

<div class="cart_div">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	

<div class="con">
<div class="centerdiv">
<div class="card">
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='rem'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "Rs".$product["price"]; ?></td>
<td><?php echo "Rs".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
}
?>
</div></div></div>
</div>


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<form action="pay.php">
<div class="centerdiv">
<div class="card" style="background-color:rgba(0, 0, 0, 0.5);">
                <input id="name" name="name" placeholder="Name" type="text" style="width: 100%;" required class="field">
				<br><br>
				<input id="phone" name="phone" placeholder="Contact" type="text" style="width: 100%; required class="field">
                <br><br>
				<input id="email" name="email" placeholder="email" type="email" style="width: 100%; required class="field">
                <br><br>
                <textarea id="add" name="add" placeholder="Address" style="width: 100%; required class="field"></textarea><br><br>
                <center><input type="submit" id="submit" class="tabs"></center></div>
</div></form>

<br /><br />
</div>
</body>
</html>