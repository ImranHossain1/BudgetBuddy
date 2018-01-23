<?php
	session_start();
	 $email=$_SESSION['email'];
	$con = mysqli_connect("localhost", "root", "", "project");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
		//$img="profile_image/";
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
    	//$img1=$_FILES['imageuplode']['name'];
    	

    	// type  name

    	$mime_name1=$_FILES['image']['type'];
    
		//image temp name
		$img_temp1=$_FILES['image']['tmp_name'];
	
		$type1= explode("/",$mime_name1);
		if($type1[0]=="image" )
				{
				//uploading image to its folder
				$update_Picture ="UPDATE `signup` SET `imagename`='$image' WHERE email='$email'";
				 $run = mysqli_query($con, $update_Picture);
				   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
					$msg = "Image Uploaded Successfully";
					} else {
					$msg = "There Was A problem uploading image";
					} 
				   if($run)
					{
						echo ("<SCRIPT type='text/javascript'>
					window.alert('Image Upload successfully')
					window.location.href='Home.php';
					</SCRIPT>");
					}
					else {
						echo ("<SCRIPT type='text/javascript'>
					window.alert('Image Upload unsuccessful')
					window.location.href='ChangePicture.php';
					</SCRIPT>");
					}
			 }
			 else{
				 echo ("<SCRIPT type='text/javascript'>
					window.alert('You Must choose an image File')
					window.location.href='ChangePicture.php';
					</SCRIPT>");
			 }
	}