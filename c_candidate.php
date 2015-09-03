<?php
require_once('dbCon.php');
header("content-type: application/json");
$db = new DBConn();

$idCL = $_GET['idcl'];
$db->GetCandidate($idCL);
	
?>