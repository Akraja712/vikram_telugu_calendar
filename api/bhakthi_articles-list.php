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
if (isset($_POST['neti_articles']) && $_POST['neti_articles'] == 1) {
   
    $sql = "SELECT * FROM `neti_articles`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Neti Articles Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['old_articles']) && $_POST['old_articles'] == 1) {
   
    $sql = "SELECT * FROM `old_articles`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Old Articles Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
?>