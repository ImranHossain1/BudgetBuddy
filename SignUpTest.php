<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "project");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    	 //text data variables

    	$firstname=$_REQUEST['firstname'];
    	$lastname=$_REQUEST['lastname'];
    	$email=$_REQUEST['email'];
    	$password=$_REQUEST['password'];
		$confirmpassword=$_REQUEST['confirmpassword'];
    	$gender=$_REQUEST['gender'];
		$dob=$_REQUEST['dob'];

    	//image name
		/*
		$target = "images/".basename($_FILES['image']['name']);
	$db = mysqli_connect("localhost", "root", "", "photos");
	$image = $_FILES['image']['name'];
	$text = $_POST['text'];
	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
	mysqli_query($db, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	$msg = "Image Uploaded Successfully";
	} else {
	$msg = "There Was A problem uploading image";
	}
		
		
		*/
		
		//$img="profile_image/";
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
    	//$img1=$_FILES['imageuplode']['name'];
    	

    	// type  name

    	$mime_name1=$_FILES['image']['type'];
    
		//image temp name
		$img_temp1=$_FILES['image']['tmp_name'];
	
		      $type1= explode("/",$mime_name1);  //come here as an array
			 
			 
    	if($firstname!='' and $lastname!=='' and $email!=''and $dob!='' and $password!='' and $confirmpassword!=='')
		{
			if($password==$confirmpassword){
				if($type1[0]=="image" )
				{
				//uploading image to its folder
				$insert_signupinfo ="insert into signup (firstname,lastname,gender,dob,email,imagename,password) 
				   values('$firstname','$lastname','$gender','$dob','$email','$image','$password')";

				 $run = mysqli_query($con, $insert_signupinfo);
				   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
					$msg = "Image Uploaded Successfully";
					} else {
					$msg = "There Was A problem uploading image";
					} 
				   if($run)
					{
						
						echo ("<SCRIPT type='text/javascript'>
							window.alert('data inserted successfully')
							window.location.href='Home.php';
							</SCRIPT>");
						$_SESSION['firstname']=$firstname;
						$_SESSION['lastname']=$$lastname;
						$_SESSION['email']=$email;
						$_SESSION['dob']=$dob;
						$_SESSION['password']=$password;
						$_SESSION['image']=$image;
						$_SESSION['gender']=$gender;
					}
					else {
						echo "<script>alert('data inserted unsuccessful');</script>";
					}
			 }
					else
					{
				
						echo "<script>alert('You are allow to take only imege file');</script>";
					}
			}
			else  {
				echo "<script>alert('Password is not matched.');</script>";
			}
				
		}
		else{
			echo "<script>alert('Please insert all data successfully');</script>";
		}
    	
    	
    }

?>