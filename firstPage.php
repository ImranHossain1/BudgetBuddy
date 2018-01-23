<?php
$con = mysqli_connect("localhost", "root", "", "project");
?>



<!DOCTYPE html>
<html>
<head>
<title>LOG IN PAGE</title>
<style>
* {
    box-sizing: border-box;
}
.header{
    background-color: rgb(153, 102, 255);
    color: white;
    padding: 6px;
	height:70px;
	text-align: center;
}


.clearfix::after {
    content: "";
}

.content {
    width: 100%;
	height:472px;
	background-color:rgb(153, 204, 255);
	text-align:center;
	
}



.menu a{
	color:white;
	 text-decoration: none;
	
}

.footer{
	background-color: rgb(153, 102, 255);
    color: white;
    padding: 6px;
	height:200px;
	text-align: center;
	float:bottom;
}
</style>
<script>
function validateForm() {
    
	$flag=true;
	if(document.myForm.email.value.length==0 && document.myForm.password.value.length==0){
		alert("Username and Password must be filled");
		$flag=false;
	}
	else if(document.myForm.email.value.length==0)
	{
		alert("Username must be filled");
		$flag=false;
	}
	else if(document.myForm.password.value.length==0)
	{
		alert("password must be required");
		$flag=false;
	}
	return $flag;
}
</script>

</head>
<body>
<?php
   if(isset($_SESSION["error"])){
        $error = $_SESSION["error"];
         echo "<span>$error</span>";
   }
 ?>  
<div class="header">
  <h1>Budget Tracker</h1>
</div>


  <div class="column content" >
   <form name = "myForm" action="loginTest.php" method ="POST" >
	<table align="center">
    
	<tr><td align = "right"><label><b>Email </b></label></td>
    <td align = "left"><input type="text" placeholder="Email" name="email" ></td></tr></br>
    <tr><td align = "right"><label><b>Password</b></label></td>
    <td align = "left"><input type="password" placeholder="Enter Password" name="password" ></td></tr></br>	
    <tr  ><td colspan = "2"><input type="submit" value="Sign In" onclick="return validateForm()"></td></tr>
	<tr  ><td colspan = "2"> Don't have any account?  <a href="SignUp.php"> Creat a new Account.</a></td></tr>
	</table>
</form>



  </div>
</div>

<div class="footer">
  <p>Developed by @copy; </br> Murshed, Md Munjur </br> Hossain, Md Imran </p>
</div>

</body>
</html>




