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


if (empty($_POST['day'])) {
    $response['success'] = false;
    $response['message'] = "Day is Empty";
    print_r(json_encode($response));
    return false;
}

$day = $db->escapeString($_POST['day']);

$sql = "SELECT * FROM `rahu_yamagandam` WHERE day='$day'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if($num>=1){
        foreach ($res as $row) {
            $id = $row['id'];
            $temp['id'] = $row['id'];
            $temp['day'] = $row['day'];
            $temp['rahu'] = $row['rahu'];
            $temp['yamagandam'] = $row['yamagandam'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Rahu Yamagandams Listed Successfully";
        $response['data'] = $rows;
        print_r(json_encode($response));
}
else{
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}


?>