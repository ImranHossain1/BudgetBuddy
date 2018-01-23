<!DOCTYPE html>
<html>
<head>
<title>Account Settings</title>
<script>
function validateForm() {
    
	$flag=true;
	if(document.myForm.image.value.length==0)
	{
		alert("image must be uploaded");
		$flag=false;
	}
	return $flag;
}
</script>
<?php 
	include 'styleup.php';
	 $email=$_SESSION['email'];
	function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
	
	//echo $email;
	$jsonData= getJSONFromDB("SELECT * FROM `signup` where email='$email'");
	$jsn=json_decode($jsonData);
 ?>
  <div class="columnleft content"  >
    <form name = "myForm" action="changePicConfirm.php" method="post"style="margin-top:80px" enctype="multipart/form-data">
	<table align="center">
	Your Current pic is:<?php echo "<img src='images/".$jsn[0]->imagename."' width='120px' height='100px'>";?>
    <tr><td><label><b>Choose a new Picture:</b></label></td>
    <td><input type="file" name="image" ></td></tr>
    <tr><td colspan = "2"><button type="submit" name="submit" onclick='return validateForm()'>Update Image</button></td></tr>
	
	</table>

</form>
  </div> 
  <?php include 'styledown.php';?>