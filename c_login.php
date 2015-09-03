<?php

require_once('dbCon.php');
header("content-type: application/json");
$db = new DBConn();

$name = $_POST['name_'];
$pass = $_POST['pass_'];
$db->loGin($name,$pass);

?>