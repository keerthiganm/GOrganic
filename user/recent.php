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
$sql = "SELECT * FROM customer_order where username='".$uname."'";  
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>Recent Orders</title> 

    <style> 
        body{
            /* background-color:rgba(42,84,108,255); */
            background-image:url("bg.jpg");
            background-blend-mode: lighten;
            background-repeat:no-repeat;
            background-size:cover;
            /* background-position:center; */
        }

        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: white; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
  
        td { 
            background-color: white; 
            border: 1px solid black; 
        } 
        th { 
            background-color: rgba(72,101,9,0.9); 
            color:white;
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
        .innerbg{
            padding:20px;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }
        .innerbg2
        {
            background-color:rgba(40, 39, 41, 0.829);
            padding:20px;
        }
    </style> 
</head> 
  
<body> 
    <section> 
    <div class="innerbg">
    <div class="innerbg2">
        <h1>Previous Orders</h1> 

        <table> 
            <tr> 
                <th>Billing</th> 
                <th>Shipping</th> 
                <th>code</th> 
                <th>price</th>
                <th>contact</th>  
                <th>address</th>  
                <th>ordered on</th> 
            </tr> 
            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
                { 
             ?> 
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $rows['username'];?></td> 
                <td><?php echo $rows['deliver_to'];?></td> 
                <td><?php echo $rows['code'];?></td> 
                <td><?php echo $rows['price'];?></td> 
                <td><?php echo $rows['phone'];?></td> 
                <td><?php echo $rows['addr'];?></td> 
                <td><?php echo $rows['ordertime'];?></td> 
            </tr> 
            <?php 
                } 
             ?> 
        </table> 
        <br><br>
        <form action="index.php">
        <center><input type="submit" value="Back"></center></form> 
        </div>
        </div>   
    </section> 
    
   
</body> 
  
</html> 
<?php  
}  
?> 