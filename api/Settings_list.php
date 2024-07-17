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

$sql = "SELECT * FROM `settings` WHERE id=1";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if ($num >= 1) {
    $rows = array();
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['image'] = DOMAIN_URL . $row['image'];
        $temp['telecast_image'] = DOMAIN_URL . $row['telecast_image'];
        $temp['image_tab'] = DOMAIN_URL . $row['image_tab'];
        $temp['video_tab'] = DOMAIN_URL . $row['video_tab'];
        $temp['gowri_image'] = DOMAIN_URL . $row['gowri_image'];
        $temp['chakram_image'] = DOMAIN_URL . $row['chakram_image'];
        $temp['thidhi_image'] = DOMAIN_URL . $row['thidhi_image'];
        $temp['karanam_image'] = DOMAIN_URL . $row['karanam_image'];
        $temp['rahukalam_image'] = DOMAIN_URL . $row['rahukalam_image'];
        $temp['yogam_image'] = DOMAIN_URL . $row['yogam_image'];
        $temp['neti_arti_image'] = DOMAIN_URL . $row['neti_arti_image'];
        $temp['old_arti_image'] = DOMAIN_URL . $row['old_arti_image'];
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "Settings Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));
} else {
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}
?>
