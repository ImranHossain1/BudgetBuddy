<!DOCTYPE html>
<html>
<head>
<title>Income</title>
<script>
function validateForm() {
	
	$flag=true;
	if(document.myForm.incomesource.value.length==0 && document.myForm.incomeamount.value.length==0 && document.myForm.incomedate.value.length==0){
		alert("Budget name and Budget cost and Budget date must be filled");
		$flag=false;
	}
	else if(document.myForm.incomesource.value.length==0)
	{
		alert("Budget name is required");
		$flag=false;
	}
	else if(document.myForm.incomeamount.value.length==0)
	{
		alert("Budget cost is required");
		$flag=false;
	}
	else if(document.myForm.incomedate.value.length==0)
	{
		alert("Budget date is required");
		$flag=false;
	}

	return $flag;
}
function validateDeleteForm(){
	$flag=true;
	if(document.myForm.incomesource.value.length==0)
	{
		alert("Budget name is required");
		$flag=false;
	}
	return $flag;
}
</script>

<?php include 'styleup.php';

	function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
	$sql = "SELECT * FROM income where user_id={$_SESSION['id']}";
	$jsn = getJSONFromDB($sql);
	$jsn = json_decode($jsn);
?>


<div class="columnleft content"  >
     <form name="myForm" action="historyDetails.php"  method="post" style="margin-top:10px" >
	<table  align="center">
	<tr >
	<td ><select name="month">
	<option value = "01" > January </option>
	<option value = "02" > February </option>
	<option value = "03" > March </option>
	<option value = "04" > April </option>
	<option value = "05" > May </option>
	<option value = "06" > June </option>
	<option value = "07" > July </option>
	<option value = "08" > Augest </option>
	<option value = "09" > September </option>
	<option value = "10" > October </option>
	<option value = "11" > November </option>
	<option value = "12" > December </option>
	<select></td>
	<td ><select name ="year">
	
	<option value = "2017" > 2017</option>
	<option value = "2018" > 2018</option>
	<option value = "2019" > 2019</option>
	<option value = "2020" > 2020</option>
	<option value = "2021" > 2021</option>
	<option value = "2022" > 2022</option>
	<option value = "2023" > 2023</option>
	<option value = "2024" > 2024</option>
	<option value = "2025" > 2025</option>
	<option value = "2026" > 2026</option>
	<option value = "2027" > 2027</option>
	<option value = "2028" > 2028</option>
	<option value = "2029" > 2029</option>
	<option value = "2030" > 2030</option>
	<option value = "2031" > 2031</option>
	<option value = "2032" > 2032</option>
	<option value = "2033" > 2033</option>
	<option value = "2034" > 2034</option>
	<option value = "2035" > 2035</option>
	<option value = "2036" > 2036</option>
	</tr>
	</table>
	<table  align="center">
	<tr  >
	<td ><input type="submit" value="Budget" name="submit"></td>
	<td ><input type="submit" value="Expense" name="submit"></td>
	<td ><input type="submit" value="Income" name="submit"></td>
	</tr>
	</table>
	
</form>
 
</form>
</div>
  <?php include 'styledown.php';?>
   <?php 
if(isset($_REQUEST['success'])) {?>
<script type="text/javascript">
	alert("Data successfully!!!");
</script>

 <?php }?>







