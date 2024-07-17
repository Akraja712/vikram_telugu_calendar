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
if (empty($_POST['image_id'])) {
    $response['success'] = false;
    $response['message'] = "Image Id is Empty";
    print_r(json_encode($response));
    return false;
}
$image_id = $db->escapeString($_POST['image_id']);
$sql = "UPDATE images SET downloads = downloads + 1 WHERE id = " . $image_id;
$db->sql($sql);
$response['success'] = true;
$response['message'] = "Image Download Updated";
print_r(json_encode($response));
?>