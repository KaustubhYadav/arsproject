<?php

session_start();
$connect = mysqli_connect("localhost", "root", "password", "ARS");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 </head>
<title>FEEDBACK</title>
<body background="Images/plane.jpg">

<div id="menu">
     <ul>
          <li><a href="search.php" class="active">Home</a></li>
          <li><a href="pay2.php">TRANSACTIONS</a></li>
          <li><a href="#">TRACK FLIGHT</a></li>
          <li><a href="feedback.php">FEEDBACK</a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><?php echo $_SESSION["login_user"];?></a></li>
     </ul>
</div>
<br>
<br>
<div>
<H1>FEEDBACK</H1>
<?php
    $query = "SELECT * FROM feedback";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div>
            
            <div style="background-color:#70CD6A; border: 4px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 5px 2px rgba(0,1,0,0.05); padding:40px;font-family: Tahoma, Geneva, sans-serif;font-weight: bold;font-color: #FFFFFF; " >
            <div class="col-md-3" style="font-size: 18pt;"><?php echo $row["user_name"]; ?></div>
            <div class="col-md-9" style="font-size: 13pt;"><?php echo $row["comment"]; ?></div>
            </div>
            </div>
            <?php
		}
	}
	?></div>

<form method="POST" action="insertfeedback.php">
<div><br><textarea name="feedback"></textarea><br></div><br>
<div><input type="submit" value="SEND FEEDBACK"></div>
</form>
</div>



</body>
</html>