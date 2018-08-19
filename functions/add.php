<?php
require_once '../database.php';
if($_GET['name']!=null&&$_GET['number']!=null&&$_GET['address']!=null){
	if(preg_match("/[a-z]/i", $_GET['number'])){
	    print "number contains letters!";
	} else {
		if(addPhone($_GET['name'],$_GET['number'],$_GET['address'])==true){
			header("Location: ../index.php");
			exit();
		} else {
			print "number already exists";
		}
	}
}
?>
<!DOCTYPE html>
<body>
	<form method="get" action="add.php">
		<label>name</label>
		<input type="text" name="name"><br>
		<label>number</label>
		<input type="text" name="number"><br>
		<label>address</label>
		<input type="text" name="address"><br>
		<input type="submit" value="add">
	</form>
</body>