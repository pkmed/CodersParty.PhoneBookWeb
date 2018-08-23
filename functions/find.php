<?php
/*
else if($_GET['number']=="" && $_GET['number']!=null) {
    print("empty number");
} else if($_GET['name']=="" && $_GET['name']!=null) {
    print("empty name");
} else if($_GET['address']=="" && $_GET['address']!=null) {
    print("empty address");
}
*/
?>
<!DOCTYPE html>
<html>
    <body>
		<?php
		error_reporting (E_ERROR);
		require_once '../database.php';
		if($_GET['number']!=""){
			$phones = getPhoneByNumber($_GET['number']); 
			if(sizeof($phones)>0){ ?>

				<form action="../index.php"><input type="submit" value="back"></form>
				<table border="1px solid black">
				<?php
				for ($i=0;  $i<sizeof($phones);$i++) { ?>
					<tr>
						<td><?=$phones[$i][0]?></td>
						<td><?=$phones[$i][1]?></td>
						<td><?=$phones[$i][2]?></td>
						<td><a href="../functions/edit.php?id=<?=$phones[$i][3]?>">изменить</a></td>
						<td><a href="../functions/delete.php?id=<?=$phones[$i][3]?>">удалить</a></td>
					</tr>
				<?php
				} ?>
				</table>

			<?php 
			} else { 
				print("not found"); ?>
				<form action="../index.php"><input type="submit" value="back"></form>
			<?php
			}
		} else if($_GET['name']!=""){
			$phones = getPhoneByName($_GET['name']); 
			if(sizeof($phones)>0){ ?>
				
				<form action="../index.php"><input type="submit" value="back"></form>
				<table border="1px solid black">
				<?php
				for ($i=0;  $i<sizeof($phones);$i++) { ?>
					<tr>
						<td><?=$phones[$i][0]?></td>
						<td><?=$phones[$i][1]?></td>
						<td><?=$phones[$i][2]?></td>
						<td><a href="../functions/edit.php?id=<?=$phones[$i][3]?>">изменить</a></td>
						<td><a href="../functions/delete.php?id=<?=$phones[$i][3]?>">удалить</a></td>
					</tr>
				<?php
				} ?>
				</table>

			<?php 
			} else { 
				print("not found"); ?>
				<form action="../index.php"><input type="submit" value="back"></form>
			<?php
			}
		} else if($_GET['address']!=""){ 
			$phones = getPhoneByAddress($_GET['address']); 
			if(sizeof($phones)>0){ ?>
				
				<form action="../index.php"><input type="submit" value="back"></form>
				<table border="1px solid black">
				<?php
				for ($i=0;  $i<sizeof($phones);$i++) { ?>
					<tr>
						<td><?=$phones[$i][0]?></td>
						<td><?=$phones[$i][1]?></td>
						<td><?=$phones[$i][2]?></td>
						<td><a href="../functions/edit.php?id=<?=$phones[$i][3]?>">изменить</a></td>
						<td><a href="../functions/delete.php?id=<?=$phones[$i][3]?>">удалить</a></td>
					</tr>
				<?php
				} ?>
				</table>

			<?php 
			} else { 
				print("not found"); ?>
				<form action="../index.php"><input type="submit" value="back"></form>
			<?php
			}
		} else { ?>
			<form method="get" action="find.php">
			<?php
			if($_GET['findByNumber']!=null){ ?>
				<label>number</label>
				<input type="text" name="number"><br>
			<?php
			} else if($_GET['findByName']!=null){ ?>
				<label>name</label>
				<input type="text" name="name"><br>
			<?php
			} else if($_GET['findByAddress']!=null){ ?>
				<label>address</label>
				<input type="text" name="address"><br>
			<?php 
			} ?>
				<input type="submit" value="find">
			</form>
			<form action="../index.php"><input type="submit" value="back"></form>
		<?php
		} ?>
	</body>
</html>