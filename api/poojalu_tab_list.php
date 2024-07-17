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

$sql = "SELECT *,ptv.id AS id FROM `poojalu_tab` pt,`poojalu_tab_variant` ptv WHERE ptv.poojalu_tab_id = pt.id";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if ($num >= 1) {
    $rows = array();
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['poojalu_id'] = $row['poojalu_id'];
        $temp['subcategory_id'] = $row['subcategory_id'];
        $temp['title'] = $row['title'];
        $temp['description'] = $row['description'];
        $temp['sub_title'] = $row['sub_title'];
        $temp['sub_description'] = $row['sub_description'];
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "poojalu Tab List Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));
} else {
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}
?>
