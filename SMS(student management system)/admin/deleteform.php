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

$q = "DELETE FROM `student` WHERE id='$sid'";
$r = mysqli_query($con,$q);
if($r == true )
	{
		?>
		<script>
		alert('Data Deleted sucessfully !! ');
		<?php header("location:dstud.php");?>
		</script>
		<?php
	}
?>





