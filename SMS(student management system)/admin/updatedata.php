<?php
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
	$id = $_POST['sid'];
	move_uploaded_file($t,"../dataimg/$i");
	
	$q = "UPDATE `student` SET `rollno`='$r',`name`='$n',`f_name`='$f',`m_name`='$m',`dob`='$d',`c_no.`='$c',`image`='$i',`year`='$y' WHERE `id`='$id'";
	
	$r = mysqli_query($con,$q);
	
	if($r == true )
	{
		?>
		<script>
		alert('Data Updated sucessfully !! ');
		<?php header("location:uform.php?sid=$id");?>
		</script>
		<?php
	}
?>
