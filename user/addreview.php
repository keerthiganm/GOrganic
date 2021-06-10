<!DOCTYPE html>
<head>
    <title>Products | Write a Review</title>
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <link rel="stylesheet" href="review.css">
</head>
<body>
    
    <div class="con">
        <h1 id="title">Write a Review</h1>
        <form action="writereview.php" method="POST">
        <div class="centerdiv">
                <input id="name" name="name" placeholder="username" type="text" required class="field">
                <br><br>
                <textarea id="msg" name="review" placeholder="Review" required class="field"></textarea>
                    <center>
                        <button type="submit" id="submit" class="button">Submit</button>
                </center>
        </div>
    </form>
    </div>
    
    
</body>
</html>