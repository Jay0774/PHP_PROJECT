<?php
session_start();
if($_SESSION['uid'])
{
	header('location:admin/admindash.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Jayesh Budhwani Student Management System </title>
</head>
<body>

<h1>Welcome to Login Page</h1>
<p>
<form method="post" action="login.php">
<table>
	<tr>
		<td>Username</td>
    <td><input type="text" name="uname" required></td> 
	</tr>
	<tr>
		<td>Password</td>
    <td><input type="password" name="pswd" required></td>
	    
	</tr>
	<tr>
		<td><input type="submit" name="login" value="Login"></td>
	</tr>
</table>
</form>
</p>
</body>
</html>
<?php
include ('dbcon.php');

if(isset($_POST['login']))
{
	$u = $_POST['uname'];
	$p = $_POST['pswd'];
	
	$q = "SELECT * FROM `admin` where username='$u' and pswd='$p'";
	
	$r = mysqli_query($con,$q);
	$row = mysqli_num_rows($r);
	if($row <1)
	{
		?>
		<script>
		alert('Username or Password not match !! ');
		window.open('login.php','_self');
		</script>
		<?php
	}
	else
	{
			$d = mysqli_fetch_assoc($r);
			$id = $d['id'];
			session_start();
			$_SESSION['uid']=$id;
			header('location:admin/admindash.php');
	}
	
	
}

?>
