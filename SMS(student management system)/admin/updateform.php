<?php
session_start();

if(isset($_SESSION['uid']))
{
	
}
else
{
	header('location:../login.php');
}
include ('../dbcon.php');
$sid = $_GET['sid'];

$q = "SELECT * FROM `student` WHERE id='$sid'";
$r = mysqli_query($con,$q);
$data=mysqli_fetch_assoc($r)
?>
<!DOCTYPE html>
<html>
<head>
<title>Jayesh Budhwani Student Management System </title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="admintitle" align="center">
<a href="ustud.php" style="float:left; margin-left:100px color:white">Back</a>
<a href="logout.php" style="float:right; margin-right:100px color:white">Logout</a>
<h1>Welcome to Admin Dashboard</h1>
</div>
<p>
<form method="post" action="udata.php" enctype="multipart/form-data">
<table align="center">
	<tr>
		<td>Roll no.</td>
    <td><input type="text" name="rollno" value=<?php echo $data['rollno']; ?> required></td> 
	</tr>
	<tr>
		<td>Name</td>
    <td><input type="text" name="name" value=<?php echo $data['name']; ?> required></td>
	    
	</tr>
	<tr>
		<td>Fathers Name</td>
    <td><input type="text" name="fname" value=<?php echo $data['f_name']; ?> required></td> 
	</tr>
	<tr>
		<td>Mothers Name</td>
    <td><input type="text" name="mname" value=<?php echo $data['m_name']; ?> required></td>
	</tr>
	<tr>
		<td>DOB</td>
    <td><input type="text" name="dob" value=<?php echo $data['dob']; ?> required></td> 
	</tr>
	<tr>
		<td>Contact No.</td>
    <td><input type="text" name="cno" value=<?php echo $data['c_no.']; ?> required></td>
	    
	</tr>
	<tr>
		<td>Year</td>
    <td><input type="number" name="year" value=<?php echo $data['year']; ?> required></td>
	    
	</tr>
	    <tr>
		<td>Image</td>
    <td><input type="file" name="img" required></td>
	    
	</tr>
	
	<tr>
	<td><input type="hidden" name="sid" value=<?php  echo $data['id']?> /></td></tr>
	<tr>	<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>
</form>
</p>
</body>
</html>




