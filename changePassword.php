<html>
<head>
<title>Account Settings</title>
<script>
function validateForm() {
    
	$flag=true;
	if(document.myForm.currentpassword.value.length==0 && document.myForm.newpassword.value.length==0 && document.myForm.conpassword.value.length==0)
	{
		alert("All Field must be required");
		$flag=false;
	}
	else if(document.myForm.currentpassword.value.length==0){
		alert("Current Password must be required");
		$flag=false;
	}
	else if(document.myForm.newpassword.value.length==0){
		alert("New Password must be required");
		$flag=false;
	}
	else if(document.myForm.conpassword.value.length==0){
		alert("Confirm Password must be required");
		$flag=false;
	}
	return $flag;
}
</script>
<?php 
	include 'styleup.php';
	?>
  <div class="columnleft content"  >
      <form name = "myForm" action="ChangePassConfirm.php" method="post"style="margin-top:80px" >
	<table align="center">
    <tr><td><label><b>Current Password:</b></label></td>
    <td><input type="password"	name ='currentpassword' placeholder="Enter Current Password"</td></tr>
	<tr><td><label><b>New Password:</b></label></td>
    <td><input type="password"	name ='newpassword' placeholder="Enter New Password"</td></tr>
	<tr><td><label><b>Confirm Password:</b></label></td>
    <td><input type="password"	name ='conpassword' placeholder="Enter Confirm Password"</td></tr>
    <tr><td></td><td colspan = "2"><button type="submit" name="submit" onclick='return validateForm()'>Confirm</button></td></tr>
	</table>
</form>
  </div> 
  
 <?php include 'styledown.php';?>