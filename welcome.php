<?php
include('session.php');
?>
<html>
<body>
<?php
echo"LOGIN WAS SUCCESSFUL. WELCOME ". $_SESSION['login_user'] ."!!";
echo"<br>";
?>

<?php
//this is debug section########################################

echo"####DEBUG#####";
echo"<br>";
print_r($_SESSION);
//this is debug section########################################

?>


</body>
</html>