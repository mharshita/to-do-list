<?php session_start(); ?>
<?php
include("connection.php");
if(isset($_POST['log_in']))
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$s = "select * from user where username = '$username' && password = '$password' ";
	$result = mysqli_query($con,$s);
	$row = mysqli_fetch_assoc($result);
	if(is_array($row))
	{
		$_SESSION['user_id'] = $row['user_id'];
	}
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "YOU ARE NOW LOGGED IN";
		header("location: todo.php");
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>
log in
</title>
<link rel="stylesheet" type="text/css" href="login.css"/>
</head>
<body>
<form method="post" action=" ">
<table id="sign_table">
<th id="th"><h1 style="color: white">LOG IN</h1></th>
<tr>
<td><h4 class="t"  style="color: white ; font-size: 30px">USERNAME</h4></td>
<td><input type="text" class="text" name="username" style="height: 28px ; width: 250px ; font-size: 20px ; font-family: courier ; font-weight: bold"  required/></td>
</tr>
<tr>
<td><h4 class="t"  style="color: white ; font-size: 30px">PASSWORD</h4></td>
<td><input type="password" class="text" name="password" style="height: 28px ; width: 250px ; font-size: 20px ; font-family: courier ; font-weight: bold"  required/></td>
</tr>
<tr>
<td> <input type="submit" name="log_in" class="btn"/></td>
<td> <a href="index.php" class="btn">BACK</a></td>
</tr>
</table>
</form>
</body>
</html>