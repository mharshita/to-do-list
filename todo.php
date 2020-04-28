<?php session_start() ;?>
<?php
include("connection.php");
if(isset($_POST['submit']))
{
	$textarea = $_POST['text'];
	$loginId = $_SESSION['user_id'];
	$sql = "insert into list(task,login_id) values('$textarea','$loginId')";
	$result = mysqli_query($con,$sql);
	if(!$result)
	{
		echo "errors!!";
	}
}
if(isset($_GET['delete']))
{
	$id = $_GET['delete'];
	$sql="delete from list where id=$id";
	mysqli_query($con,$sql);
}
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['e_mail']);
	header("location: index.php");
} 
?>
<!DOCTYPE HTML>
<html>
<head>
<title> TO-DO LIST</title>
<link rel="stylesheet" type="text/css" href="list.css"/>
</head>
<body>
<h1 id="heading">MAKE YOUR TO-DO LIST HERE :</h1>
<div id="first_div">
<form method="post">
<table>
<tr>
<td><textarea id="text" name="text"></textarea></td>
<td><input type="submit" name="submit" value="ADD TO LIST" id="add" style="background-color:orange"/></td>
<td><a href="logout.php" class="btn" style="margin-left: 30px ; padding: 13px;
	border-radius: 30px;
	border-style: solid;
	border-width: 2px;
	border-color: grey;
	background-color: orange;
	outline: none;
	box-shadow: 2px 1px 10px;
	text-decoration: none;
	font-size: 20px;
	font-family: courier;
	color: black;
	font-weight: bold;">LOGOUT</a></td>
</tr>
</table>
</form>
</div>
<div id="second_div">
<table id="container">
<tr>
<td colspan="2"><h1 id="yt">YOUR TASKS:</h1></td>
<td class="a"><p id="mark">MARK AS COMPLETED</p></td>
</tr>
<tr>
<?php 
$sql = "select id,task from list where login_id = ".$_SESSION['user_id']." order by id desc";
$res = mysqli_query($con,$sql);
if($res){
while ($row=mysqli_fetch_assoc($res)){
?>
<td class="t"><h4 class="task"><?php echo $row['task']; ?></h4></td>
<td class="a" name="delete"><a href="todo.php?delete=<?php echo $row['id'] ?>" id="delete" style="font-size:26px;">DELETE</a></td>
<td><form method="post"><input type="checkbox" id="check" style="height:35px;width:35px"/></form></td>
</tr><?php
}}?>
</table>
</div>
</body>
</html>