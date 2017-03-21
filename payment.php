<?php
session_start();
$connect = mysqli_connect("localhost", "root", "password", "ARS");
?>

<?php
$var1 = $_POST["seat_number"];
$var2 = $_SESSION['login_id'];
$var4 = $_SESSION['plane_id'];

$var3 = $_POST["ticket_price"];
$available_query = "INSERT INTO bills (id, flight_id, seat_id, price) VALUES ( $var2 , '$var4', $var1, $var3)";
$alter_status = "UPDATE $var4 SET status = 'BOOKED' WHERE $var4.seat_id = $var1"
?>
<html>
<head>
<meta charset="UTF-8">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
<?php
if(mysqli_query($connect, $available_query))
{
mysqli_query($connect, $alter_status);
echo "TRANSACTION SUCCESSFUL";}
else{echo "FAILURE";
echo $db1;
print_r($_SESSION);
print_r($_POST);
echo $var1;
echo $var3;}
?>

</body>

</html>
