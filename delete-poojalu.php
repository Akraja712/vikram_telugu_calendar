<?php
include_once('includes/crud.php');
$db = new Database();
$db->connect();
	
	if (isset($_GET['id'])) {
		$ID = $db->escapeString($_GET['id']);
	} else {
		// $ID = "";
		return false;
		exit(0);
	}
	$data = array();
	$sql_query = "SELECT *  FROM poojalu WHERE id =" . $ID;
	$db->sql($sql_query);
	$res = $db->getResult();
	$target_path = "".$res[0]['image'];
		if(unlink($target_path)){		
	$sql_query = "DELETE  FROM poojalu WHERE id =" . $ID;
	$db->sql($sql_query);
	$res = $db->getResult();
	header("location:poojalu.php");
		}
?>
