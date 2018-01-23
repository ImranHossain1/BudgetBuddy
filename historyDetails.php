<!DOCTYPE html>
<html>
<head>
<title>History</title>


<?php include 'styleup.php';

	$id=$_SESSION['id'];
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
	
}?>
<div class="columnleft content"  >
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//$sql = "";
	if($_REQUEST['submit'] == 'Budget'){
		$month= $_REQUEST['month'];
		$year= $_REQUEST['year'];
		//echo $month;
		$jsonData=getJSONFromDB("select * from budget where user_id=$id and substring(budgetdate,1,4)=$year and substring(budgetdate,6,7)=$month");
		
		$jsn=json_decode($jsonData);?>
		<table border="1" align="center">
		<tr>
		<td>Budget Item </td>
		<td>Budget Cost </td>
		<td>Budget Date </td>

		</tr>
		<?php
		for($i=0;$i<sizeof($jsn);$i++):?>
			 <tr>
		<td><?php echo $jsn[$i]->budgetcatagory; ?></td>
		<td><?php echo $jsn[$i]->budgetamount; ?></td>
		<td><?php echo $jsn[$i]->budgetdate; ?></td>
			 </tr>

		<?php endfor?>
		</table><?php
		}

	//$sql = "";
	else if($_REQUEST['submit'] == 'Expense'){
		$month= $_REQUEST['month'];
		$year= $_REQUEST['year'];
		//echo $month;
		$jsonData=getJSONFromDB("select * from expenses where user_id=$id and substring(expensedate,1,4)=$year and substring(expensedate,6,7)=$month");
		
		$jsn=json_decode($jsonData);?>
		<table border="1" align="center">
		<tr>
		<td>Expense Item </td>
		<td>Expense Cost </td>
		<td>Expense Date </td>

		</tr>
		<?php
		for($i=0;$i<sizeof($jsn);$i++):?>
			 <tr>
		<td><?php echo $jsn[$i]->expenseitem; ?></td>
		<td><?php echo $jsn[$i]->expensecost; ?></td>
		<td><?php echo $jsn[$i]->expensedate; ?></td>
			 </tr>

		<?php endfor?>
		</table><?php
		}
		else if($_REQUEST['submit'] == 'Expense'){
		$month= $_REQUEST['month'];
		$year= $_REQUEST['year'];
		//echo $month;
		$jsonData=getJSONFromDB("select * from expenses where user_id=$id and substring(expensedate,1,4)=$year and substring(expensedate,6,7)=$month");
		
		$jsn=json_decode($jsonData);?>
		<table border="1" align="center">
		<tr>
		<td>Expense Item </td>
		<td>Expense Cost </td>
		<td>Expense Date </td>

		</tr>
		<?php
		for($i=0;$i<sizeof($jsn);$i++):?>
			 <tr>
		<td><?php echo $jsn[$i]->expenseitem; ?></td>
		<td><?php echo $jsn[$i]->expensecost; ?></td>
		<td><?php echo $jsn[$i]->expensedate; ?></td>
			 </tr>

		<?php endfor?>
		</table><?php
		}
		else if($_REQUEST['submit'] == 'Income'){
		$month= $_REQUEST['month'];
		$year= $_REQUEST['year'];
		//echo $month;
		$jsonData=getJSONFromDB("select * from income where user_id=$id and substring(incomedate,1,4)=$year and substring(incomedate,6,7)=$month");
		
		$jsn=json_decode($jsonData);?>
		<table border="1" align="center">
		<tr>
		<td>Income Item </td>
		<td>Income Cost </td>
		<td>Income Date </td>

		</tr>
		<?php
		for($i=0;$i<sizeof($jsn);$i++):?>
			 <tr>
		<td><?php echo $jsn[$i]->incomesource; ?></td>
		<td><?php echo $jsn[$i]->incomeamount; ?></td>
		<td><?php echo $jsn[$i]->incomedate; ?></td>
			 </tr>

		<?php endfor?>
		</table><?php
		}
}
?>
</div>

  <?php include 'styledown.php';?>
   