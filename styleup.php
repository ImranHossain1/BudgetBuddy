<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<style>
* {
    box-sizing: border-box;
}
.header{
    background-color: rgb(153, 102, 255);
    color: white;
    padding: 1px;
	height:70px;
	text-align: center;
}

.columnleft {
    float: left;
    padding: 15px;
	
}
.columnright {
    float: right;
    padding: 15px;
	
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
	
	
}
.menu {
	
    width: 20%;
	height:472px;
	background-color: rgb(0, 102, 153);
	
}
.content {
    width: 60%;
	height:472px;
	background-color:rgb(153, 204, 255);
	text-align:center;
	
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
	
}
.menu li {
	top:250px;
    padding: 8px;
    margin-bottom: 0px;
    background-color: rgb(0, 102, 153);
    color: #ffffff;
	text-align:center ;
	
}
.menu a{
	color:white;
	 text-decoration: none;
	
}
.menu li:hover {
    background-color: #0099cc;
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
</head>
<body>
<?php
session_start();
$email=$_SESSION['email'];
$db = mysqli_connect("localhost", "root", "", "project");
$sql = "SELECT * FROM `signup`where email='$email'";
$result = mysqli_query($db, $sql);

?>
<div class="header">
  <h1>Budget Tracker</h1>
 
</div>

<div class="clearfix" >
	
	 <div class="columnright menu">
    <ul style="margin-top:40px">
	  <li ><a href="Home.php" > Home<a></li>
      <li ><a href="accountsetting.php" > Account Setting<a></li>
	  <li>
       <?php

		if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
			ECHO "<A HREF=\"LogOut.php\">LOGOUT</A>"."</BR>";
		}
		else
		{
			header("Location: firstPage.php");
		}
	  ?>
	  </li>
    </ul>
	
  </div>
  <div class="columnleft menu">
  
	<ul style="margin-top:0px">
     <?php while ($row = mysqli_fetch_array($result)) {
		 $_SESSION['id']=$row['id'];
		 ?>
		<div align = "center">
		<a href="Home.php"><?php echo "<img src='images/".$row['imagename']."' width='120px' height='100px'>";?></a>
		</div>
		<div align = "center">
		<a href="Home.php"><?php echo $row['firstname'].' '.$row['lastname'];?></a>
		</div>
		<div align = "center">
		<a href="ChangePicture.php">Change Picture</a>
		</div>
<?php	}?>
	  
    </ul>
	
    <ul style="margin-top:80px">
      
       <li ><a href="overview.php" > Overview<a></li>
	  <li ><a href="budget.php" > Budget<a></li>
	  <li ><a href="income.php" > Income<a></li>
	  <li ><a href="expenses.php" > Expenses<a></li>
	  <li ><a href="history.php" > History<a></li>
	  
    </ul>
	
  </div>