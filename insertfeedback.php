<?php
session_start();
$connect = mysqli_connect("localhost", "root", "password", "ARS");
?>
<?php
header("location: feedback.php");

$var1= $_SESSION['login_id'];
$var2= $_SESSION['login_user'];
$var3= $_POST['feedback'];

$mysql="INSERT INTO feedback(user_id, user_name, comment) VALUES ('$var1','$var2','$var3')";

if(mysqli_query($connect, $mysql)){}
else
{echo"FAILURE";}
die();









?>