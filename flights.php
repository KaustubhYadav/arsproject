<?php
session_start();
$connect = mysqli_connect("localhost", "root", "password", "ARS");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>FLIGHT DETAILS</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:7BC39F;">
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
	<h2 align="center">FLIGHT DETAILS</h2>
	<div>
            <div id="flightMenu" style="background-color:#16A9EE; border: 4px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 5px 2px rgba(0,1,0,0.05); padding:30px;font-family: Tahoma, Geneva, sans-serif;font-weight: bold;font-color: #000000;font-size: 15pt;">
            <div class="col-md-3">FLIGHT NO</div>
            <div class="col-md-6">AIRLINE COMPANY</div>
            </div>
            </div>
     
    <?php
    $source1 = $_GET["source"];
    $dest1 = $_GET["destination"];
    $date1 = $_GET["date"];
    //print_r($_GET);
	$query = "SELECT * FROM flights  where source = '$source1' AND destination = '$dest1' AND date='$date1' ";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div >
            <form method="post" action="book.php?action=add&id=<?php echo $row["flight_id"]; ?>">
            <div style="background-color:#70CD6A; border: 4px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 5px 2px rgba(0,1,0,0.05); padding:30px;font-family: Tahoma, Geneva, sans-serif;font-weight: bold;font-color: #FFFFFF; font-size: 15pt;" >
            <div class="col-md-3"><?php echo $row["flight_id"]; ?></div>
            <div class="col-md-6"><?php echo $row["company"]; ?></div>
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="BOOK">
            </div>
            </form>
            </div>
            <?php
		}
	}
	else{
	echo "SORRY THERE ARE NO FLIGHTS AVAILABLE RIGHT NOW. PLEASE TRY AGAIN AFTER SOMETIME";
	}
	?></div>
    <div style="clear:both"></div>
    </body>
</html>