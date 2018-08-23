<?php
error_reporting (E_ERROR);
require_once '../database.php';
if($_GET['name']!=null){
	if(preg_match("/[a-z]/i", $_GET['number'])){
	    print "number contains letters!";
	    goto form;
	} else {
		editPhone($_GET['id'],$_GET['name'],$_GET['number'],$_GET['address']);
		header("Location: ../index.php");
	}
} else { 
	form:
	if((int)$_GET['id']!=0){
		$phone = getPhoneByID($_GET['id']);
	}?>
	<!DOCTYPE html>
<html>
	<body>
		<form method="get" action="edit.php">
			<input name="id" value="<?=$_GET['id']?>" hidden>
			<label>name</label>
			<input type="text" name="name" value="<?=$phone[0]?>"><br>
			<label>number</label>
			<input type="text" name="number" value="<?=$phone[1]?>"><br>
			<label>address</label>
			<input type="text" name="address" value="<?=$phone[2]?>"><br>
			<input type="submit" value="edit">
		</form>
	</body>
</html>
<?php }?>