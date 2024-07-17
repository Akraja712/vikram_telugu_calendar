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
if (empty($_POST['video'])) {
    $response['success'] = false;
    $response['message'] = "Video is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['video_category_id'])) {
    $response['success'] = false;
    $response['message'] = "Video Category Id is Empty";
    print_r(json_encode($response));
    return false;
}
$video_category_id = $db->escapeString($_POST['video_category_id']);
$video = $db->escapeString($_POST['video']);
$sql = "SELECT * FROM `video_post` WHERE video_category_id = '$video_category_id' AND name like '%".$video."%'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if($num>=1){
    $rows = array();
    $temp = array();
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['name'] = $row['name'];
        $temp['video'] = DOMAIN_URL . $row['video'];
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "Video List Successfullty";
    $response['data'] = $rows;
    print_r(json_encode($response));

}
else{
    $response['success'] = false;
    $response['message'] = "Not Found";
    print_r(json_encode($response));
}
?>