<?php
include 'styleup.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email=$_SESSION['email'];
	$currentPass=$_POST['currentpassword'];
	$newPass=$_POST['newpassword'];
	$conPass=$_POST['conpassword'];
	$conn = mysqli_connect("localhost", "root", "")or die ('error connect to db');
	$db=mysqli_select_db($conn,"project") or die ('error select DB');
	$m= mysqli_query($conn, "SELECT * FROM `signup` where email='$email'");
	$check= mysqli_fetch_array($m);
	if($check['password']==$currentPass){
		if($newPass!='' and $conPass!==''){
			if($newPass==$conPass){
		$edit= mysqli_query($conn,"UPDATE `signup` SET `password`='$newPass' WHERE email='$email'");
			if(!$edit)
			{
				echo mysqli_error();
			}
			else
			{
				echo ("<SCRIPT type='text/javascript'>
					window.alert('Password update Successfully')
					window.location.href='Home.php';
					</SCRIPT>");
			}
			}
			else{
				echo ("<SCRIPT type='text/javascript'>
					window.alert('Password is not matched')
					window.location.href='changePassword.php';
					</SCRIPT>");
			}
		}
		else{
			echo ("<SCRIPT type='text/javascript'>
					window.alert('please enter new password')
					window.location.href='changePassword.php';
					</SCRIPT>");
		}
		
	}
	else{
		echo ("<SCRIPT type='text/javascript'>
					window.alert('Current Password Invalid')
					window.location.href='changePassword.php';
					</SCRIPT>");
	}
	
}?>