<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$sql = "";
	if($_REQUEST['submit'] == 'add'){
		$sql = "INSERT INTO expenses (expenseitem,expensecost,expensedate,user_id) values('{$_REQUEST['expenseitem']}','{$_REQUEST['expensecost']}','{$_REQUEST['expensedate']}','{$_REQUEST['id']}')";
		//echo $sql;return;
	}
	elseif ($_REQUEST['submit'] == 'update') {
		$sql = "UPDATE expenses set expensecost='{$_REQUEST['expensecost']}',expensedate='{$_REQUEST['expensedate']}' where expenseitem='{$_REQUEST['expenseitem']}'";
		
	}
	elseif ($_REQUEST['submit'] == 'delete') {
		$sql = "DELETE from expenses where expenseitem='{$_REQUEST['expenseitem']}'";
	}
	getJSONFromDB($sql);
	header("Location:expenses.php?success=ok");

}

?>