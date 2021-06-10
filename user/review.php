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
$sql = "SELECT * FROM review";
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 


<!DOCTYPE html>
<style>
h1 { 
            text-align: center; 
            color: white; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
 body{
    background-image:url("bg.jpg");
            background-blend-mode: lighten;
            background-repeat:no-repeat;
            background-size:cover;
 }
</style>
<head>
    <title>Product | Reviews</title>
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <link rel="stylesheet" href="review.css">
</head>
<body>
    <div class="con">
        <h1> Reviews  </h1>
        <div class="centerdiv">
        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
                { 
             ?> 
            
                <div class="review-card">
                    <b>
                    <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <?php echo $rows['username'];?> 
           </b>
                <br>
                <?php echo $rows['review'];?> 
                <br>
                <?php echo $rows['reviewed_on'];?> 
            </div>
            <?php 
                } 
             ?> 
        </div>
    
    <center>
    <a href="addreview.php"><button>Add review</button></a>
        <a href="myreview.php"><button>My review</button></a>
        <a href="index.php"><button>Back</button></a>
    </center>
    </div>
</body>
</html>
<?php  
}  
?> 
