<!DOCTYPE html>
<html>
<head>
<title>Budget</title>
<script>
function validateForm() {
	
	$flag=true;
	if(document.myForm.budgetcatagory.value.length==0 && document.myForm.budgetamount.value.length==0 && document.myForm.budgetdate.value.length==0){
		alert("Budget name and Budget cost and Budget date must be filled");
		$flag=false;
	}
	else if(document.myForm.budgetcatagory.value.length==0)
	{
		alert("Budget name is required");
		$flag=false;
	}
	else if(document.myForm.budgetamount.value.length==0)
	{
		alert("Budget cost is required");
		$flag=false;
	}
	else if(document.myForm.budgetdate.value.length==0)
	{
		alert("Budget date is required");
		$flag=false;
	}

	return $flag;
}
function validateDeleteForm(){
	$flag=true;
	if(document.myForm.budgetcatagory.value.length==0)
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
	$sql = "SELECT * FROM budget where user_id = {$_SESSION['id']}";
	$jsn = getJSONFromDB($sql);
	$jsn = json_decode($jsn);
?>


<div class="columnleft content"  >
     <form name="myForm" action="budgetDetails.php"  method="post" style="margin-top:10px" >
	<table  align="center">
	<tr >
	<td ><input type="text" placeholder="Budget Item" name="budgetcatagory" ></td>
	<td ><input type="intval" placeholder="Budget Cost" name="budgetamount" ></td>
	<td ><input type="date" name="budgetdate" ></td>
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
</table>

</div>
  <?php include 'styledown.php';?>
   <?php 
if(isset($_REQUEST['success'])) {?>
<script type="text/javascript">
	alert("Data successfully!!!");
</script>

 <?php }?>

