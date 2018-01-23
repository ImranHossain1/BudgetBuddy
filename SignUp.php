<!DOCTYPE html>
<html>
<head>
<title>SIGN UP PAGE</title>
 <link rel="icon" href="icon.png" />
 
<script type="text/javascript">
var request = new XMLHttpRequest();
var flag=1;
function fnamecheck()
	{
	 var a=document.frm.firstname.value;
	 var msg=document.getElementById("fnc");
	 if(a.length<3){
		msg.innerHTML="invalid name";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="valid name";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	function lnamecheck()
	{
	 var a=document.frm.lastname.value;
	 var msg=document.getElementById("lnc");
	 if(a.length<3){
		msg.innerHTML="invalid name";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="valid name";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	function dobcheck()
	{
	 var a=document.frm.dob.value;
	 var msg=document.getElementById("do");
	 if(a.length==0){
		msg.innerHTML="invalid name";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="valid name";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	
	function eml(mail)
	{
		request.onreadystatechange=function(mail)
				{
					if (request.readyState == 4 && request.status == 200)
						{
						    resp=request.responseText;
							//alert(resp);
							msg=document.getElementById("emailc");
							if(resp>0){
							msg.innerHTML="email is used";
							msg.style.color="red";
							return false;
							}
							else{
							msg.innerHTML="email valid";
							msg.style.color="green";
							return true;
						}
					}
						
				};
				var url="check.php?signal=read&email="+mail;
				request.open("GET", url, true);
				request.send();
	}
	
	function emailcheck(mail)
	{
	 var a=mail.value;
	 //alert(a);
	 var pos=a.indexOf("@");
	 var com=a.indexOf(".com");
	 var msg=document.getElementById("emailc");
	 if(pos>=-1 && com>pos){
		flag=1;
		eml(a);
		return true;
	}
	else
		{
			msg.innerHTML="invalid email";
			msg.style.color="red";
			flag=0;
			return false;
		}
	}
	
    
    
	function passcheck()
	{
	 var a=document.frm.password.value;
	 var msg=document.getElementById("passc");
	 if(a.length<5){
		msg.innerHTML="invalid password";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="valid password";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	function cpasscheck()
	{
	 var a=document.frm.confirmpassword.value;
	 var b=document.frm.password.value;
	 
	 var msg=document.getElementById("cpassc");
	 if(a!=b){
		msg.innerHTML="pass not match";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="pass match";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	function submitfrm()
	{
		var ch=document.getElementById("emailc");
		if(fnamecheck()==true && lnamecheck()==true && dobcheck()==true && passcheck()==true && cpasscheck()==true&&ch.style.color=="green"){
		document.frm.submit();
		}
		else
		alert("Submit all the criteria carefully!!!!");
	}
    
</script>
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
	height:80px;
	text-align: center;
	float:bottom;
}
</style>

</head>
<body>

<div class="header">
  <h1>Budget Tracker</h1>
</div>

<div class="clearfix" >

  </div>

  <div class="column content" >
   <form name = "frm" action="SignUpTest.php" method ="POST" enctype="multipart/form-data" >
	<table align="center" border ="1">
    <tr><td align = "right"><label><b>First Name</b></label></td>
    <td align = "left"><input type="text" name="firstname" id="fn" onkeyup="fnamecheck()" placeholder="Enter first name" > <i id="fnc"></i> </td></tr> </br>
	<tr><td align = "right"><label><b>Last Name</b></label></td>
    <td align = "left"><input type="text" name="lastname" id="ln" onkeyup="lnamecheck()" placeholder="Enter last name" > <i id="lnc"></i></td></tr></br>
	<tr><td align = "right"><label><b>Gender</b></label></td>
	
    <td align = "left">
	
	<input type="radio" name="gender" value="male" checked> Male
    <input type="radio" name="gender" value="female"> Female
    <input type="radio" name="gender" value="other"> Other
	
	</td></tr></br>
	<tr><td align = "right"><label><b>Date Of Birth</b></label></td>
    <td align = "left"><input type="date" name="dob" id="do" onkeyup="dobcheck()"></td></tr></br>
	<tr><td align = "right"><label><b>Email </b></label></td>
    <td align = "left">
	<input type="text" name="email" id="emailid" onkeyup="emailcheck(this)" placeholder="Email" > <i id="emailc"></i></td></tr></br>
	<tr><td align = "right"><label><b>Uplode Image </b></label></td>
	<td align = "left"><input type="file" name="image" ></td></tr></br>
    <tr><td align = "right"><label><b>Password</b></label></td>
    <td align = "left"><input type="password" name="password" id="pass" onkeyup="passcheck()" placeholder="Enter password" > <i id="passc"></i></td></tr></br>
	<tr><td align = "right"><label><b>Confirm Password</b></label></td>
    <td align = "left"><input type="password" name="confirmpassword" id="cpass" onkeyup="cpasscheck()" placeholder="re-type password" ><i id="cpassc"></td></tr></br>
	
    <tr  ><td colspan = "2"><input type="button" value="Sign Up" class = "button" id="sign" onclick="submitfrm()"></td></tr>
	
	</table>
</form>



  </div>
</div>

<div class="footer">
  <p>Developed by @copy; </br> Murshed, Md Munjur </br> Hossain, Md Imran </p>
</div>

</body>
</html>



