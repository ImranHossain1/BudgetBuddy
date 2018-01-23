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
     <form name="myForm" action="incomeDetails.php"  method="post" style="margin-top:10px" >
	<table  align="center">
	<tr >
	<td ><input type="text" placeholder="Income Item" name="incomesource" ></td>
	<td ><input type="intval" placeholder="Income Cost" name="incomeamount" ></td>
	<td ><input type="date" name="incomedate" ></td>
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







