<?php

function dbConnect(){
	$connection = @new mysqli("127.0.0.1", "root", "", "phoneBook");
	return $connection;
}
function closeConnection($connection){
	$connection->close();
}
function getPhonesList(){
	$db_connection = dbConnect();
	$result = $db_connection->query("SELECT * FROM `phones` ORDER BY `name`, `address`");
	while ($row = $result->fetch_row()){
		$phones[] = $row;
	}
	closeConnection($db_connection);
	return $phones;
}
function addPhone($name, $number, $address){
	$db_connection = dbConnect();
	$db_connection->query("INSERT INTO `phones` (`name`, `number`, `address`) VALUES ('{$name}', {$number}, '{$address}');");
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
	$phone = $result->fetch_row();
	closeConnection($db_connection);
	return $phone;
}
function getPhoneByName($name){
	$db_connection = dbConnect();
	$result = $db_connection->query("SELECT * FROM `phones` WHERE `name`='{$name}'");
	$phone = $result->fetch_row();
	closeConnection($db_connection);
	return $phone;
}
function getPhoneByAddress($address){
	$db_connection = dbConnect();
	$result = $db_connection->query("SELECT * FROM `phones` WHERE `address`='{$address}'");
	$phone = $result->fetch_row();
	closeConnection($db_connection);
	return $phone;
}
function getPhoneByNumber($number){
	$db_connection = dbConnect();
	$result = $db_connection->query("SELECT * FROM `phones` WHERE `number`='{$number}'");
	$phone = $result->fetch_row();
	closeConnection($db_connection);
	return $phone;
}
function editPhone($id, $name, $number, $address){
	$db_connection = dbConnect();
	$db_connection->query("UPDATE `phones` SET `number`={$number}, `name`='{$name}', `address`='{$address}' WHERE `id`={$id};");
	closeConnection($db_connection);
}

?>