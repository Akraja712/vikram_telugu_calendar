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

$sql = "SELECT * FROM `notifications`";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if ($num >= 1) {
    $rows = array();
    foreach ($res as $row) {
        $temp = array();
        $temp['id'] = $row['id'];
        $temp['title'] = $row['title'];
        $temp['description'] = $row['description'];
        $temp['link'] = $row['link'];
        $temp['image'] = DOMAIN_URL . $row['image'];
        $temp['date'] = date("d-m-Y", strtotime($row['date']));
        $temp['time'] = date("h:i A", strtotime($row['time'])); 

        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "notifications Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));
} else {
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}
?>
