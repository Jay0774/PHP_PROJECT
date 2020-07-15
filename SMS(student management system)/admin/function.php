<?php
function showdetails($y,$r)
{
	include ('dbcon.php');
	
	$q = "SELECT * FROM `student` WHERE rollno=$r and year=$y;";
	$r = mysqli_query($con,$q);
	if(mysqli_num_rows($r)>0)
	{
		$data = mysqli_fetch_assoc($r);
		?>
		<table align="center" width="80%" border="1" style="margin-top:20px;">
		<tr align="center"><th colspan="3">STUDENT DETAILS </th> </tr>
		<tr>
		<td rowspan="7"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:100px; max-width=50px;"></td>
		<th>Roll No.</th>
		<td><?php echo $data['rollno']; ?></td>
		</tr>
		<tr>
		<th>Name</th>
		<td><?php echo $data['name']; ?></td>
		</tr>
		<tr>
		<th>Fathers Name</th>
		<td><?php echo $data['f_name']; ?></td>
		</tr><tr>
		<th>Mothers Name</th>
		<td><?php echo $data['m_name']; ?></td>
		</tr><tr>
		<th>DOB</th>
		<td><?php echo $data['dob']; ?></td>
		</tr><tr>
		<th>Contact No.</th>
		<td><?php echo $data['c_no.']; ?></td>
		</tr>
		<th>Year</th>
		<td><?php echo $data['year']; ?></td>
		</tr>
</table>
		<?php
	}
	else
	{
		echo "<script>alert('No Such Data Found..');</script>";
	}
}

?>
