<?php

session_start();

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
<title>SEARCH FLIGHTS</title>
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
<form method="get" action="flights.php">
<div>FROM&nbsp&nbsp<input type="text" name="source"><br></div><br>
<div>TO&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="destination"><br></div><br>
<div>DATE&nbsp&nbsp&nbsp<input type="date" name="date"><br></div><br>
<div><input type="submit" value="SEARCH FLIGHTS"></div>
</form>
</div>



</body>
</html>