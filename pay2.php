<?php
session_start();
$connect = mysqli_connect("localhost", "root", "password", "ARS");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>TRANSACTION HISTORY</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">

</head>
<body>
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

<div class="container" style="width:60%;">
	<h2 align="center">TRANSACTION DETAILS</h2>
    <div>
            <div style="border: 4px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 5px 2px rgba(0,1,0,0.05); padding:30px;" >
            <div class="col-md-3">BILL ID</div>
            <div class="col-md-3">FLIGHT NO</div>
            <div class="col-md-3">SEAT NO</div>
            <div class="col-md-3">PRICE</div>
            </div>
            </div>
     
    <?php
    //print_r($_GET);
    $varid= $_SESSION['login_id'];
	$query = "SELECT * FROM bills  where id = '$varid' ";
	$result = mysqli_query($connect, $query);
	        
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div>
            <div style="border: 4px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 5px 2px rgba(0,1,0,0.05); padding:30px;" >
            <div class="col-md-3"><?php echo $row["bill_id"]; ?></div>
            <div class="col-md-3"><?php echo $row["flight_id"]; ?></div>
            <div class="col-md-3"><?php echo $row["seat_id"]; ?></div>
            <div class="col-md-3"><?php echo $row["price"]; ?></div>
            </div>
            </div>
            <?php
		}
	}
	else{
	echo "SORRY THERE ARE NO TRANSACTION HISTORY";
	}
	?></div>
    <div style="clear:both"></div>
    </body>
</html>