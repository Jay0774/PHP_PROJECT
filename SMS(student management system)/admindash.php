<?php
session_start();

if(isset($_SESSION['uid']))
{
	
}
else
{
	header('location:../login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Jayesh Budhwani Student Management System </title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="admintitle" align="center">
<h1>Welcome to Admin Dashboard</h1>
</div>
<p>
<table align="center">
	<tr>
		<td>1.<a href="cstud.php">Insert Student Details </a> </td>
	</tr>
	<tr>
		<td>2.<a href="ustud.php">Update Student Details </a> </td>
	</tr>
	<tr>
		<td>3.<a href="dstud.php">Delete Student Details </a> </td>
	</tr>
	<tr>
		<td>4.<a href="logout.php">Logout</a> </td>
	</tr>
</table>
</p>
</body>
</html>
