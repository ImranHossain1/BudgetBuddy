<?php

session_start();
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
if($_SERVER["REQUEST_METHOD"]=="POST"){
    	 //text data variables
    	$_SESSION["email"]=$_REQUEST['email'];
    	$_SESSION["password"]=$_REQUEST['password'];
		
$jsonData=getJSONFromDB("select * from signup");
//echo $jsonData;
$jsn=json_decode($jsonData);
//echo "<pre>";
//print_r($jsn);
$value=0;
for($i=0;$i<sizeof($jsn);$i++){
	 if($jsn[$i]->email==$_SESSION["email"] && $jsn[$i]->password==$_SESSION["password"])
	 {
		$value=1;
	 }
}
 if($value == 1){
	 header("Location: Home.php");
 }
 else{
	
	echo ("<SCRIPT type='text/javascript'>
    window.alert('Username or password is not correct')
    window.location.href='firstpage.php';
    </SCRIPT>");
 }
    
}
?>