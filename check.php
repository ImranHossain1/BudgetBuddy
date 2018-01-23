
<?php
	function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
	
	if($_REQUEST["signal"]=="read" && isset($_REQUEST['email'])){
			$sql="select * from signup where email ='".$_REQUEST['email']."'";
			//echo $sql."<br/>";
			$jsonData= getJSONFromDB($sql);
			$data=json_decode($jsonData);
			$x=sizeof($data);
			//echo $x;
			echo $x;
	}
?>