<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "")or die ('error connect to db');
	
	$db=mysqli_select_db($conn,"project") or die ('error select DB');
	//echo $sql;
	$email=$_SESSION['email'];
	echo $email;
	$record = mysqli_query($conn,"SELECT * FROM `signup` where email='$email'");
	while($data= mysqli_fetch_array($record)){?>
	<table>
		
		<td><?php	 echo $data['firstname'];?></td>
		<td><?php	 echo $data['lastname'];?></td>
		<td><?php	 echo $data['gender'];?></td>
		<td><?php	 echo $data['email'];?></td>
<?php	
}
?>
 </table>
 
$id= $_GET['id'];
$m= mysqli_query($con, "SELECT * FROM `user_table` where id = '$id'");
$check= mysqli_fetch_array($m);
$edit= mysqli_query($con,"UPDATE `user_table` SET `name`=[value-2],`email`=[value-3],`password`=[value-4] WHERE id='$id'");