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
<a href="admindash.php" style="float:left;" style="margin-left:10px" style="color:white">Back</a>
<a href="logout.php" style="float:right; margin-right:100px color:white">Logout</a>
<h1>Welcome to Admin Dashboard</h1>
</div>
<p>
<form method="post" action="dstud.php" enctype="multipart/form-data">
<table align="center">
	<tr>
		<th>Enter Roll no.</th>
    <td><input type="text" name="rollno" required></td> 
	</tr>
	<tr>
		<th>Enter Name</th>
    <td><input type="text" name="name" required></td>
	    
	</tr>
	
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Search"></td>
	</tr>
</table>
</form>
<table align="center" width="80%" border="1" style="margin-top:20px;">
<tr>
<th>No.</th>
<th>Roll No.</th>
<th>Name</th>
<th>Fathers Name</th>
<th>Mothers Nmae</th>
<th>DOB</th>
<th>Contact No.</th>
<th>Image</th>
<th>Year</th>
<th>Delete</th>
</tr>
<?php



if(isset($_POST['submit']))
{
	include ('../dbcon.php');
	
	$r = $_POST['rollno'];
	$n = $_POST['name'];
	
	$q = "SELECT * FROM `student` WHERE rollno='$r' and name like '%$n%'";
	
	$r = mysqli_query($con,$q);
	$row = mysqli_num_rows($r);
	if($row < 1 )
	{
		echo "<tr align='center'><td colspan='10'>No Records Found</td></tr>";
	}
	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($r))
		{
			$count++;
		?>
		<tr>
		<td><?php echo $count; ?></td>
<td><?php echo $data['rollno']; ?></td>
<td><?php echo $data['name']; ?></td>
<td><?php echo $data['f_name']; ?></td>
<td><?php echo $data['m_name']; ?></td>
<td><?php echo $data['dob']; ?></td>
<td><?php echo $data['c_no.']; ?></td>
<td><img src="../dataimg/<?php echo $data['image']; ?>"></a></td>
<td><?php echo $data['year']; ?></td>
<td><a href="dform.php?sid=<?php echo $data['id']?>">Delete</a></td>
</tr>
		<?php
		}
	}
	
	
}
?>

</table>
</p>
</body>
</html>

