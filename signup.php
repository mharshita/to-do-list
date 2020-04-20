<?php session_start(); ?>
<?php
include("connection.php");
if(isset($_POST['sign_up']))
{
    $email = mysqli_real_escape_string($con,$_POST['e_mail']);
	$username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
	$query = "insert into user(password,e_mail,username) values('$password','$email','$username')";
	mysqli_query($con,$query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "YOU ARE NOW LOGGED IN";
	header("location: login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>
sign up
</title>
<link rel="stylesheet" type="text/css" href="login.css"/>
</head>
<body>
<form method="post" action=" ">
<table id="sign_table">
<th id="th"><h1 style="color: white">SIGN UP</h1></th>
<tr>
<td><h3 class="t" style="color: white ; font-size: 30px">E-Mail</h3></td>
<td><input type="text" calss="text" name="e_mail" style="height: 28px ; width: 250px ;  font-size: 20px ; font-family: courier ; font-weight: bold" required/></td>
</tr>
<tr>
<td><h2 class="t" style="color: white ; font-size: 30px">USERNAME</h2></td>
<td><input type="text" class="text" name="username" style="height: 28px ; width: 250px ; font-size: 20px ; font-family: courier ; font-weight: bold" required/></td>
</tr>
<tr>
<td><h3 class="t" style="color: white ; font-size: 30px">PASSWORD</h3></td>
<td><input type="password" class="text" name="password" style="height: 28px ; width: 250px ;  font-size: 20px ; font-family: courier ; font-weight: bold" required/></td>
</tr>
<tr>
<td> <input type="submit" name="sign_up" class="btn"></td>
</tr>
</table>
</form>
</body>
</html>