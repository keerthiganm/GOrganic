<?php   
session_start();  
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
$sql = "SELECT * FROM customer_order ORDER BY ordertime";
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 


<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>Existing class groups</title> 

    <style> 
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
        body{
            background-image:url("bg.jpg");
            background-blend-mode: lighten;
            background-repeat:no-repeat;
            background-size:cover;
        }
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: black; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
  
        td { 
            background-color:  rgba(40, 39, 41, 0.829); 
            border-bottom: #F0F0F0 1px solid;
        } 
        th { 
            background-color:  rgba(40, 39, 41, 0.829);
            border-bottom: #F0F0F0 1px solid;
        } 
  
        th, 
        td { 
            font-weight: bold; 
            /* border: 1px solid white;  */
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
    </style> 
    <link rel="stylesheet" href="review.css">
</head> 
  
<body> 
    <section> 
        <h1>Products</h1> 
         <div class="con">
             <div class="centerdiv">
                 <div class="review-card">
        <table> 
            <tr> 
                <th>username</th> 
                <th>deliver_to</th> 
                <th>code</th> 
                <th>price</th>
                <th>phone</th>  
                <th>addr</th> 
                <th>ordertime</th>
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
        </div></div></div>
        <br><br>
        <form action="admin.php">
        <center><input type="submit" value="Back" class="tabs"></center></form>    
    </section> 
    
   
</body> 
  
</html> 
<?php  
}  
?> 