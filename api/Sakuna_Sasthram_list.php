<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('Asia/Kolkata');

include_once('../includes/crud.php');
$db = new Database();
$db->connect();

$sql = "SELECT * FROM `sakuna_settings` WHERE id=1";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if ($num >= 1) {
    $rows = array();
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['sakunalu_image'] = DOMAIN_URL . $row['sakunalu_image'];
        $temp['balli_image'] = DOMAIN_URL . $row['balli_image'];
        $temp['kaki_image'] = DOMAIN_URL . $row['kaki_image'];
        $temp['kukuta_image'] = DOMAIN_URL . $row['kukuta_image'];
        $temp['sasthram_image'] = DOMAIN_URL . $row['sasthram_image'];
        $temp['pilli_image'] = DOMAIN_URL . $row['pilli_image'];
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "Sakuna Sasthram list Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));
} else {
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}
?>
