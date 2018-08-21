<?php
require_once 'database.php';
checkTable();
$phones = getPhonesList();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>phone book</title>
	</head>
	<body>
		<form action="./functions/add.php"><input type="submit" value="добавить номер"></form>
		<form action="./functions/find.php">
			<input type="submit" value="найти по номеру" name="findByNumber">
			<input type="submit" value="найти по имени" name="findByName">
			<input type="submit" value="найти по адресу" name="findByAddress">
		</form>
		<table border="1px solid black">
			<tr>
				<th>имя</th>
				<th>номер</th>
				<th>адрес</th>
			</tr>
			<?php
				for ($i=0;  $i<sizeof($phones);$i++) { ?>
					<tr>
						<td><?=$phones[$i][0]?></td>
						<td><?=$phones[$i][1]?></td>
						<td><?=$phones[$i][2]?></td>
						<td><a href="../phonebook/functions/edit.php?id=<?=$phones[$i][3]?>">изменить</a></td>
						<td><a href="../phonebook/functions/delete.php?id=<?=$phones[$i][3]?>">удалить</a></td>
					</tr>
			<?php } ?>
		</table>
	</body>
</html>