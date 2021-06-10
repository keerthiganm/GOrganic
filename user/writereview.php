<?php
session_start();
$uname=$_REQUEST['name'];
$review =  $_REQUEST['review'];
?>

<?php

$link = mysqli_connect("localhost", "root", "", "order");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO review (username, review,reviewed_on) VALUES ('$uname','$review',CURRENT_TIMESTAMP())";
if(mysqli_query($link, $sql)){
    echo "Your review has been added :)";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
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
    </style>
<a href="myreview.php"><button>My Reviews</button></a>
<form action="index.php">
    <input type="submit" value="Back">
    </form>    
</html>
