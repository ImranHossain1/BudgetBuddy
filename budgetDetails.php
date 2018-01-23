<?php
session_start();
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$sql = "";
	if($_REQUEST['submit'] == 'add'){
		$sql = "INSERT INTO budget (budgetcatagory,budgetamount,budgetdate,user_id) values('{$_REQUEST['budgetcatagory']}','{$_REQUEST['budgetamount']}','{$_REQUEST['budgetdate']}','{$_REQUEST['id']}')";
		
	}
	elseif ($_REQUEST['submit'] == 'update') {
		$sql = "UPDATE budget set budgetamount='{$_REQUEST['budgetamount']}',budgetdate='{$_REQUEST['budgetdate']}' where budgetcatagory='{$_REQUEST['budgetcatagory']}'";
		
	}
	elseif ($_REQUEST['submit'] == 'delete') {
		$sql = "DELETE from budget where budgetcatagory='{$_REQUEST['budgetcatagory']}'";
	}
	getJSONFromDB($sql);
	header("Location:budget.php?success=ok");

}