<?php
session_start();
$connect = mysqli_connect("localhost", "root", "password", "ARS");
?>
<?php
$_SESSION['plane_id']=$_GET['id'];
?>
<html>
<head>
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

<h1>BILL DETAILS</h1>
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
<table>
<tr>
<th>PASSENGER</th>
<th>SEAT NO</th>
<th>CLASS</th>
<th>PRICE</th>
<th>PAY FOR TICKET</th>
</tr>
<tr>
            <form method="post" action="payment.php">
            <td><?php echo $_SESSION['login_user']; ?></td>
            <td><input type="hidden" name="seat_number" value="<?php echo $_POST["seat_number"]; ?>"><?php echo $_POST["seat_number"]; ?></td>
            <td><?php echo $_POST["class"]; ?></td>
            <td><input type="hidden" name="ticket_price" value="<?php echo $_POST["ticket_price"]; ?>"><?php echo $_POST["ticket_price"]; ?></td>
            <td><input type="submit" name="pay" style="margin-top:5px;" class="btn btn-default" value="MAKE PAYEMENT"></td>
            </form>
            </tr>
    
</table>

<br>
</body>
</html>
