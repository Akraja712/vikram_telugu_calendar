<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('Asia/Kolkata');

include_once('/include/crud.php');
$db = new Database();
$db->connect();

$sql = "SELECT * FROM `panchangam`";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if ($num >= 1) {
    $rows = array();
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['date'] = DateTime::createFromFormat('Y-m-d', $row['date'])->format('d-m-Y');
        $temp['text1']= $row['text1'];
        $temp['text2']= $row['text2'];
        $temp['sunrise'] = date('h:i a', strtotime($row['sunrise']));
        $temp['sunset'] = date('h:i a', strtotime($row['sunset']));
        $temp['thidhi'] = $row['thidhi'];
        $temp['nakshatram'] = $row['nakshatram'];
        $temp['yogam'] = $row['yogam'];
        $temp['karanam'] = $row['karanam'];
        $temp['rahukalam'] = $row['rahukalam'];
        $temp['yamakandam'] = $row['yamakandam'];
        $temp['dhurmuhurtham'] = $row['dhurmuhurtham'];
        $temp['varjyam'] = $row['varjyam'];
    
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "Panchangam Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));
} else {
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}
?>
