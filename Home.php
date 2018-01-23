<?php
 include 'styleup.php';
 $email=$_SESSION['email'];
 $id=$_SESSION['id'];
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
	
	//echo $email;
	$jsonData= getJSONFromDB("SELECT * FROM `signup` where email='$email'");
	$jsn=json_decode($jsonData);
 ?>

	<div class="columnleft content"  >
    <form style="margin-top:80px" >
	<table align="center">
    <tr><td><label><b>First Name:</b></label></td>
    <td><?php	 echo $jsn[0]->firstname;?></td></tr>
	<tr><td><label><b>Last Name:</b></label></td>
    <td><?php	 echo $jsn[0]->lastname;?></td></tr>
	<tr><td><label><b>Gender:</b></label></td>
    <td><?php echo $jsn[0]->gender;?></td></tr>
	<tr><td><label><b>Date Of Birth:</b></label></td>
    <td><?php echo $jsn[0]->dob;?></td></tr>
	<tr><td><label><b>Email:</b></label></td>
    <td><?php echo $jsn[0]->email;?></td></tr>
	</table>
	</form>
  </div>
  
<?php include 'styledown.php';?>
   

