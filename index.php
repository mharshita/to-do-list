<?php
include 'config.php';
$con = mysqli_connect("us-cdbr-iron-east-01.cleardb.net","b6684c04b5974d","2888ee12"," C:\Users\Mangla\Downloads\to_do_list.sql");
if(isset($_POST['submit']))
{
	$textarea = $_POST['text'];
	$sql="insert into list(task) values('$textarea')";
	mysqli_query($con,$sql);
}
if(isset($_GET['delete']))
{
	$id = $_GET['delete'];
	$sql="delete from list where id=$id";
	mysqli_query($con,$sql);
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
$sql = "select * from list order by id desc";
$res = mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($res)){
?>
<td class="t"><h4 class="task"><?php echo $row['task']; ?></h4></td>
<td class="a" name="delete"><a href="index.php?delete=<?php echo $row['id'] ?>" id="delete" style="font-size:26px;">DELETE</a></td>
<td><form method="post"><input type="checkbox" id="check" style="height:35px;width:35px"/></form></td>
</tr><?php
 } ?>
</table>
</div>
</body>
</html>