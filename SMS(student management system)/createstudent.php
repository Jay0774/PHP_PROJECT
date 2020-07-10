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
<a href="admindash.php" style="float:left; margin-left:100px color:white">Back</a>
<a href="logout.php" style="float:right; margin-right:100px color:white">Logout</a>
<h1>Welcome to Admin Dashboard</h1>
</div>
<p>
<form method="post" action="cstud.php" enctype="multipart/form-data">
<table align="center">
	<tr>
		<td>Roll no.</td>
    <td><input type="text" name="rollno" required></td> 
	</tr>
	<tr>
		<td>Name</td>
    <td><input type="text" name="name" required></td>
	    
	</tr>
	<tr>
		<td>Fathers Name</td>
    <td><input type="text" name="fname" required></td> 
	</tr>
	<tr>
		<td>Mothers Name</td>
    <td><input type="text" name="mname" required></td>
	</tr>
	<tr>
		<td>DOB</td>
    <td><input type="text" name="dob" required></td> 
	</tr>
	<tr>
		<td>Contact No.</td>
    <td><input type="text" name="cno" required></td>
	    
	</tr>
	<tr>
		<td>Year</td>
    <td><input type="number" name="year" required></td>
	    
	</tr>
	    <tr>
		<td>Image</td>
    <td><input type="file" name="img" required></td>
	    
	</tr>
	
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>
</form>
</p>
</body>
</html>

<?php



if(isset($_POST['submit']))
{
	include ('../dbcon.php');
	
	$r = $_POST['rollno'];
	$n = $_POST['name'];
	$f = $_POST['fname'];
	$m = $_POST['mname'];
	$d = $_POST['dob'];
	$c = $_POST['cno'];
	$y = $_POST['year'];
	$i = $_FILES['img']['name'];
	$t = $_FILES['img']['tmp_name'];
	
	move_uploaded_file($t,"../dataimg/$i");
	
	$q = "INSERT INTO `student`( `rollno`, `name`, `f_name`, `m_name`, `dob`, `c_no.`,`image`, `year`) VALUES ('$r','$n','$f','$m','$d','$c','$i','$y')";
	
	$r = mysqli_query($con,$q);
	$row = mysqli_num_rows($r);
	if($r == true )
	{
		?>
		<script>
		alert('Data Inserted sucessfully !! ');
		window.open('cstud.php','_self');
		</script>
		<?php
	}
	else
	{
			$d = mysqli_fetch_assoc($r);
			$id = $d['id'];
			session_start();
			$_SESSION['uid']=$id;
			header('location:cstud.php');
	}
	
	
}
?>
