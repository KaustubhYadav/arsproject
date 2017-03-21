<?php
session_start();
$connect = mysqli_connect("localhost", "root", "password", "ars_flights");
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">

</head>
<style>
table {
    border: 3px;
   
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    background-color: #BACFB6;
    text-color: #000000;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

</style>
<body style="background-color:7BC39F;">
<div id="menu">
     <ul>
          <li><a href="search.php" class="active">Home</a></li>
          <li><a href="pay2.php">TRANSACTIONS</a></li>
          <li><a href="#">TRACK FLIGHT</a></li>
          <li><a href="#">FEEDBACK</a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><?php echo $_SESSION["login_user"];?></a></li>
     </ul>
</div>


<table>
<tr>
<th>SEAT NO</th>
<th>CLASS</th>
<th>PRICE</th>
<th>BOOK TICKET</th>
</tr>

<?php

$table = $_GET["id"];
$available_query = "SELECT * FROM $table where status = 'AVAILABLE'";
$eco_book ="SELECT * FROM $table where status = 'AVAILABLE' AND class='ECO'";
$pre_book ="SELECT * FROM $table where status = 'AVAILABLE' AND class='PREMIUIM'";
$lux_book ="SELECT * FROM $table where status = 'AVAILABLE' AND class='LUXURY'";
$result = mysqli_query($connect, $available_query);
?>

<?php
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
			?>
			
			<tr>
            <form method="post" action="book2.php?id=<?php echo $table ?>">
            
            <td><input type="hidden" name="seat_number" value="<?php echo $row["seat_id"]; ?>"><?php echo $row["seat_id"]; ?></td>
            
            <td><input type="hidden" name="class" value="<?php echo $row["class"]; ?>"><?php echo $row["class"]; ?></td>
            <td><input type="hidden" name="ticket_price" value="<?php echo $row["price"]; ?>"><?php echo $row["price"]; ?></td>
            <td><input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="BOOK"></td>
            </form>
            
            </tr>
             <?php
		}


}
else{echo"SORRY THIS FLIGHT IS COMPLETELY BOOKED.PLEASE TRY OTHER FLIGHTS";}

	

?>
</table>
</body>
</html>