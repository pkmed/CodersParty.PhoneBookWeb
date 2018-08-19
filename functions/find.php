<!DOCTYPE html>
<body>
<?php
require_once '../database.php';
if($_GET['number']!=""){
	$phone = getPhoneByNumber($_GET['number']);?>
	<table border="1px solid black">
		<tr>
			<td><?=$phone[0]?></td>
			<td><?=$phone[1]?></td>
			<td><?=$phone[2]?></td>
			<td><a href="../phonebook/functions/edit.php?id=<?=$phone[3]?>">изменить</a></td>
			<td><a href="../phonebook/functions/delete.php?id=<?=$phone[3]?>">удалить</a></td>
		</tr>
	</table>
	<form action="../index.php"><input type="submit" value="back"></form>
	<?
} else if($_GET['name']!=""){ 
	$phone = getPhoneByName($_GET['name']);?>
	<table border="1px solid black">
		<tr>
			<td><?=$phone[0]?></td>
			<td><?=$phone[1]?></td>
			<td><?=$phone[2]?></td>
			<td><a href="../phonebook/functions/edit.php?id=<?=$phone[3]?>">изменить</a></td>
			<td><a href="../phonebook/functions/delete.php?id=<?=$phone[3]?>">удалить</a></td>
		</tr>
	</table>
	<form action="../index.php"><input type="submit" value="back"></form>
<?
} else if($_GET['address']!=""){ 
	$phone = getPhoneByAddress($_GET['address']);?>
	<table border="1px solid black">
		<tr>
			<td><?=$phone[0]?></td>
			<td><?=$phone[1]?></td>
			<td><?=$phone[2]?></td>
			<td><a href="../phonebook/functions/edit.php?id=<?=$phone[3]?>">изменить</a></td>
			<td><a href="../phonebook/functions/delete.php?id=<?=$phone[3]?>">удалить</a></td>
		</tr>
	</table>
	<form action="../index.php"><input type="submit" value="back"></form>
<?
} else {
?>
	<form method="get" action="find.php">
		<?php
		if($_GET['findByNumber']!=null){
			?>
			<label>number</label>
			<input type="text" name="number"><br>
		<?} else if($_GET['findByName']!=null){ ?>
			<label>name</label>
			<input type="text" name="name"><br>
		<?} else if($_GET['findByAddress']!=null){?>
			<label>address</label>
			<input type="text" name="address"><br>
		<?}?>
		<input type="submit" value="find">
	</form>
<?}?>
</body>