<html>
<head>
<title>Account Settings</title>
<script>
function validateForm() {
    
	$flag=true;
	if(document.myForm.password.value.length==0)
	{
		alert("Password must be required");
		$flag=false;
	}
	return $flag;
}
</script>
<?php 
	include 'styleup.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$_SESSION['first']=$_POST['firstname'];
		$_SESSION['last']=$_POST['lastname'];
		?>
  <div class="columnleft content"  >
    <form name = "myForm" action="accountConfirm.php" method="post"style="margin-top:80px" >
	<table align="center">
	Please enter your password<br>
    <tr><td><label><b>Password:</b></label></td>
    <td><input type="password"	name ='password' placeholder="Enter Password"</td></tr>
    <tr><td></td><td colspan = "2"><button type="submit" name="submit" onclick='return validateForm()'>Confirm</button></td></tr>
	</table>
</form>
  </div> 
  <?php
}
?>

 <?php include 'styledown.php';?>