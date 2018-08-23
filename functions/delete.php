<?php
error_reporting (E_ERROR);
require_once '../database.php';
if($_GET['id']!=null){
	deletePhone($_GET['id']);
	header("Location: ../index.php");
	exit();
}
?>