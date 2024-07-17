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


if (empty($_POST['month'])) {
    $response['success'] = false;
    $response['message'] = "Month is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['year'])) {
    $response['success'] = false;
    $response['message'] = "Year is Empty";
    print_r(json_encode($response));
    return false;
}
$month = $db->escapeString($_POST['month']);
$year = $db->escapeString($_POST['year']);

$sql = "SELECT * FROM `karthi_vrusti` WHERE month='$month' AND year='$year'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $id = $row['id'];
            $temp['id'] = $row['id'];
            $temp['month'] = $row['month'];
            $temp['year'] = $row['year'];
            $temp['text1'] = $row['text1'];
            // $temp['date_month'] = $row['date_month'];
            // $temp['title'] = $row['title'];
            // $temp['description'] = $row['description'];
            $sql = "SELECT * FROM `karthi_vrusti_variant` WHERE karthi_vrusti_id = '$id'";
            $db->sql($sql);
            $res = $db->getResult();
            $temp['karthi_vrusti_variant'] = $res;
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Karthi Vrusti Listed Successfully";
        $response['data'] = $rows;
        print_r(json_encode($response));
}
else{
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}


?>