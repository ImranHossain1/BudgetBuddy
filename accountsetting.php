<!DOCTYPE html>
<html>
<head>
<title>Account Settings</title>
<script>
function validateForm() {
    
	$flag=true;
	if(document.myForm.firstname.value.length==0 && document.myForm.lastname.value.length==0 && document.myForm.dob.value.length==0){
		alert("All Field must be filled");
		$flag=false;
	}
	else if(document.myForm.firstname.value.length==0)
	{
		alert("Firstname must be filled");
		$flag=false;
	}
	else if(document.myForm.lastname.value.length==0)
	{
		alert("Lastname must be required");
		$flag=false;
	}
	else if(document.myForm.dob.value.length==0)
	{
		alert("Date Of Birth must be required");
		$flag=false;
	}
	return $flag;
}
</script>
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
    <form name = "myForm" action="accountUpdate.php" method="post"style="margin-top:80px" >
	<table align="center">
    <tr><td><label><b>First Name</b></label></td>
    <td><input type="text"	name ='firstname' value="<?php echo $jsn[0]->firstname;?>" ></td></tr>
	<tr><td><label><b>Last Name</b></label></td>
    <td><input type="text"name ='lastname' value="<?php echo $jsn[0]->lastname;?>" ></td></tr>
	<tr><td><label><b>Date Of Birth</b></label></td>
    <td><input type="date"name ='dob'value="<?php echo $jsn[0]->dob;?>" ></td></tr>
    <tr><td colspan = "2"><button type="submit" name="submit" onclick='return validateForm()'>Update</button></td></tr>
	
	</table>
	<tr>Do you want to change your password? <a href="changePassword.php">Click Here!</a></tr>
</form>
  </div> 
  <?php include 'styledown.php';?>