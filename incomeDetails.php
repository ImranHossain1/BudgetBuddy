<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$sql = "";
	if($_REQUEST['submit'] == 'add'){
		$sql = "INSERT INTO income (incomesource,incomeamount,incomedate,user_id) values('{$_REQUEST['incomesource']}','{$_REQUEST['incomeamount']}','{$_REQUEST['incomedate']}','{$_REQUEST['id']}')";
		//echo $sql;return;
	}
	elseif ($_REQUEST['submit'] == 'update') {
		$sql = "UPDATE income set incomeamount='{$_REQUEST['incomeamount']}',incomedate='{$_REQUEST['incomedate']}' where incomesource='{$_REQUEST['incomesource']}'";
		
	}
	elseif ($_REQUEST['submit'] == 'delete') {
		$sql = "DELETE from income where incomesource='{$_REQUEST['incomesource']}'";
	}
	getJSONFromDB($sql);
	header("Location:income.php?success=ok");

}