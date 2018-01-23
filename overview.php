<!DOCTYPE html>
<html>
<head>
<title>Overview</title>

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
	<h1 style="color:#666633;"><u>Overview</u></h1>
	<div>
		<h2 style="color:#006600;">Total Budget:
		<?php
		$jsonData= getJSONFromDB("select * from budget where user_id=$id ");
		$jsn=json_decode($jsonData);
		$budgetValue=0;
		for($i=0;$i<sizeof($jsn);$i++){
		$budgetValue+=$jsn[$i]->budgetamount;
		}
		echo $budgetValue;?></h2>
	</div>
	<div>
		<h2 style="color:#006600;">Total Income:
		<?php
		$jsonIncomeData= getJSONFromDB("select * from income where user_id=$id ");
		$jsn=json_decode($jsonIncomeData);
		$incomeValue=0;
		for($i=0;$i<sizeof($jsn);$i++){
		$incomeValue+=$jsn[$i]->incomeamount;
		}
		echo $incomeValue;
		?></h2>
	</div>
	<div>
		<h2 style="color:#006600;">Total Expense:
		<?php
		$jsonExpenseData= getJSONFromDB("select * from expenses where user_id=$id ");
		$jsn=json_decode($jsonExpenseData);
		$expenseValue=0;
		for($i=0;$i<sizeof($jsn);$i++){
		$expenseValue+=$jsn[$i]->expensecost;
		}
		echo $expenseValue;
		?></h2>
		
	</div>
	<div>
		<h2 style="color:#006600;">Total Balance:<?php
		$balanceValue=$incomeValue-$expenseValue;
		echo $balanceValue;
		?>
		</h2>
	</div>
	<div>
		<?php
		$balance=$budgetValue-$expenseValue;
		if ($balance<0)
		{
			?>
				<h1 style="color:#ff0000;">Your Expense is cross your Budget!</h1>
			<?php
		}
		else if ($balance<5000)
		{?>
			<h1 style="color:#996633;">Please  try to Expense Low!</h1>
			<?php
		}
		else if ($balance>5000)
		{?>
			<h1 style="color:#006600;">Your expense is on your budget!</h1>
			<?php
		}
		?>
	</div>
</div>
 <?php include 'styledown.php';?>


  
