<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"]=="POST"){
$username = mysqli_real_escape_string($db,$_POST["username"]);
$password = mysqli_real_escape_string($db,$_POST["password"]);

$sql = "SELECT id from login WHERE client_username = '$username' and client_password = '$password'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);
//login count ==1
if($count==1){
//session_register("username"); 
$_SESSION['login_user']= $username;
$_SESSION['login_id']=$row['id'];
header("location:search.php");
}
else{
echo"THERE WAS SOME ERROR DURING LOGIN PROCESS";

}
}
?>
<html>
   
   <head>
   <meta charset="UTF-8">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 4px #333333; " align = "left">
            <div style = "background-color:#16A9EE; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>