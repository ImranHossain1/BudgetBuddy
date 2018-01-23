<!DOCTYPE html>
<html>
<head>
<title>Expense</title>
<script>
function validateForm() {
	
	$flag=true;
	if(document.myForm.expenseitem.value.length==0 && document.myForm.expensecost.value.length==0 && document.myForm.expensedate.value.length==0){
		alert("Expense name and Expense cost and Expense date must be filled");
		$flag=false;
	}
	else if(document.myForm.expenseitem.value.length==0)
	{
		alert("Expense name is required");
		$flag=false;
	}
	else if(document.myForm.expensecost.value.length==0)
	{
		alert("Expense cost is required");
		$flag=false;
	}
	else if(document.myForm.expensedate.value.length==0)
	{
		alert("Expense date is required");
		$flag=false;
	}

	return $flag;
}
function validateDeleteForm(){
	$flag=true;
	if(document.myForm.expenseitem.value.length==0)
	{
		alert("Expense name is required");
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
	$sql = "SELECT * FROM expenses where user_id={$_SESSION['id']}";
	$jsn = getJSONFromDB($sql);
	$jsn = json_decode($jsn);
?>


<div class="columnleft content"  >
     <form name="myForm" action="expensesDetails.php"  method="post" style="margin-top:10px" >
	<table  align="center">
	<tr >
	<td ><input type="text" placeholder="Expense Item" name="expenseitem" ></td>
	<td ><input type="intval" placeholder="Expense Cost" name="expensecost" ></td>
	<td ><input type="date" name="expensedate" ></td>
	<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
	</tr>
	</table>
	<table  align="center">
	<tr  >
	<td ><input type="submit" value="add" name="submit"  onclick="return validateForm()"></td>
	<td ><input type="submit" value="update" name="submit"  onclick="return validateForm()"></td>
	<td ><input type="submit" value="delete" name="submit" onclick="return validateDeleteForm()"></td>
	</tr>
	</table>
	
</form>
  
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
</table>
</form>
</div>
  <?php include 'styledown.php';?>
   <?php 
if(isset($_REQUEST['success'])) {?>
<script type="text/javascript">
	alert("Data successfully!!!");
</script>

 <?php }?>
