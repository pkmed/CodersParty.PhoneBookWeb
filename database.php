<?php
error_reporting (E_ERROR);
function dbConnect(){
	$connection = @new mysqli("localhost", "id6880972_root", "666partywiththedevilbitch", "id6880972_phonebook");
	return $connection;
}
function checkTable(){
	$db_connection = dbConnect();
	$db_connection->query("CREATE TABLE IF NOT EXISTS `phones` ( 
		`name` VARCHAR(45) NOT NULL, 
		`number` INT(15) NOT NULL, 
		`address` VARCHAR(45) NOT NULL, 
		`id` INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY (`id`), 
		UNIQUE INDEX `number_UNIQUE` (`number`), 
		UNIQUE INDEX `id_UNIQUE` (`id`) 
	)DEFAULT CHARSET=utf8");
	closeConnection($db_connection);
}
function closeConnection($connection){
	$connection->close();
}
function getPhonesList(){
	$db_connection = dbConnect();
	$result = $db_connection->query("SELECT * FROM `phones` ORDER BY `name`, `address`");
	$phones = array();
	while ($row = $result->fetch_row()){
		$phones[] = $row;
	}
	closeConnection($db_connection);
	return $phones;
}
function addPhone($name, $number, $address){
	$db_connection = dbConnect();
	$db_connection->query("INSERT INTO `phones` (`name`, `number`, `address`) VALUES ('{$name}', {$number}, '{$address}');");
	if(strpos(mysqli_error($db_connection),"Duplicate")==false){
		return true;
	} else {
		return false;
	}
	closeConnection($db_connection);
}
function deletePhone($id){
	$db_connection = dbConnect();
	$db_connection->query("DELETE FROM `phones` WHERE `id`={$id}");
	closeConnection($db_connection);
}
function getPhoneByID($id){
	$db_connection = dbConnect();
	$result = $db_connection->query("SELECT * FROM `phones` WHERE `id`='{$id}'");
	$phone = array();
	while ($row = $result->fetch_row()){
		$phone = $row;
	}
	closeConnection($db_connection);
	return $phone;
}
function getPhoneByName($name, $containsPart){
	$db_connection = dbConnect();
	if($containsPart == true){
		$result = $db_connection->query("SELECT * FROM `phones` WHERE `name` LIKE '%{$name}%'");
	} else {
		$result = $db_connection->query("SELECT * FROM `phones` WHERE `name`='{$name}'");
	}
	$phone = array();
	while ($row = $result->fetch_row()){
		$phone[] = $row;
	}
	closeConnection($db_connection);
	return $phone;
}
function getPhoneByAddress($address, $containsPart){
	$db_connection = dbConnect();
	if($containsPart == true){
		$result = $db_connection->query("SELECT * FROM `phones` WHERE `address` LIKE '%{$address}%'");
	} else {
		$result = $db_connection->query("SELECT * FROM `phones` WHERE `address`='{$address}'");
	}
	$phone = array();
	while ($row = $result->fetch_row()){
		$phone[] = $row;
	}
	closeConnection($db_connection);
	return $phone;
}
function getPhoneByNumber($number, $containsPart){
	$db_connection = dbConnect();
	if($containsPart == true){
		$result = $db_connection->query("SELECT * FROM `phones` WHERE `number` LIKE '%{$number}%'");
	} else {
		$result = $db_connection->query("SELECT * FROM `phones` WHERE `number`='{$number}'");
	}
	$phone = array();
	while ($row = $result->fetch_row()){
		$phone[] = $row;
	}
	closeConnection($db_connection);
	return $phone;
}
function editPhone($id, $name, $number, $address){
	$db_connection = dbConnect();
	$db_connection->query("UPDATE `phones` SET `number`={$number}, `name`='{$name}', `address`='{$address}' WHERE `id`={$id};");
	closeConnection($db_connection);
}

?>