<!DOCTYPE html>
<html>
<head>
<title>Account Settings</title>
<?php
include 'styleup.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$email=$_SESSION['email'];
	$firstname=$_SESSION['first'];
	$lastname=$_SESSION['last'];
	$conn = mysqli_connect("localhost", "root", "")or die ('error connect to db');
	$db=mysqli_select_db($conn,"project") or die ('error select DB');
	$m= mysqli_query($conn, "SELECT * FROM `signup` where email='$email'");
	$check= mysqli_fetch_array($m);
	$password=$_POST['password'];
	if($check['password']==$password){
		$edit= mysqli_query($conn,"UPDATE `signup` SET `firstname`='$firstname',`lastname`='$lastname' WHERE email='$email'");
			if(!$edit)
			{
				echo mysqli_error();
			}
			else
			{
				header('Location: Home.php');
			}
	}
	else{
		echo ("<SCRIPT type='text/javascript'>
    window.alert('Password is not correct')
    window.location.href='accountsetting.php';
    </SCRIPT>");
	}
	
}?>
 <?php include 'styledown.php';?>