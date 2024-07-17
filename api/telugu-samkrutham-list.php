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
if (isset($_POST['telugu_sawancharalu']) && $_POST['telugu_sawancharalu'] == 1) {
    $sql = "SELECT * FROM `telugu_years`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Telugu Sawanchralu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['telugu_nelalu']) && $_POST['telugu_nelalu'] == 1) {

    $sql = "SELECT * FROM `telugu_months`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Telugu Nelalu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['telugu_ankelu']) && $_POST['telugu_ankelu'] == 1) {
    $sql = "SELECT * FROM `ankelu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Telugu Ankelu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['telugu_aksharalu']) && $_POST['telugu_aksharalu'] == 1) {
    $sql = "SELECT * FROM `aksharalu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Telugu Aksharalu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['guninthalu']) && $_POST['guninthalu'] == 1) {
    $sql = "SELECT * FROM `guninthalu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Guninthalu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['rashulu']) && $_POST['rashulu'] == 1) {
    $sql = "SELECT * FROM `rashulu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Rashulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['64_kalalu']) && $_POST['64_kalalu'] == 1) {
    $sql = "SELECT * FROM `kalalu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "64 Kalalu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['vruthulu']) && $_POST['vruthulu'] == 1) {
    $sql = "SELECT * FROM `vruthulu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Vruthulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['nava_grahalu']) && $_POST['nava_grahalu'] == 1) {
    $sql = "SELECT * FROM `navagrahalu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Nava Grahalu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['ruthuvulu']) && $_POST['ruthuvulu'] == 1) {
    $sql = "SELECT * FROM `ruthuvulu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Ruthuvulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['kolathalu']) && $_POST['kolathalu'] == 1) {
    $sql = "SELECT * FROM `kolathalu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
            $rows = array();
            $temp = array();
            foreach ($res as $row) {
                $id = $row['id'];
                $temp['id'] = $row['id'];
                $temp['title'] = $row['title'];
     
                $sql = "SELECT * FROM `kolathalu_variant` WHERE kolathalu_id = '$id'";
                $db->sql($sql);
                $res = $db->getResult();
                $temp['kolathalu_variant'] = $res;
                $rows[] = $temp;
            }
            $response['success'] = true;
            $response['message'] = "kolathalu Listed Successfully";
            $response['data'] = $rows;
            print_r(json_encode($response));
    }
    else{
        $response['success'] = false;
        $response['message'] = "Data Not Found";
        print_r(json_encode($response));
    }
}
    
if (isset($_POST['pakshamulu']) && $_POST['pakshamulu'] == 1) {
    $sql = "SELECT * FROM `pakshamulu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Pakshamulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['lagnam']) && $_POST['lagnam'] == 1) {
    $sql = "SELECT * FROM `lagnam`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Lagnam Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['thidhi_aadhi_devathalu']) && $_POST['thidhi_aadhi_devathalu'] == 1) {
    $sql = "SELECT * FROM `thidhi_addhi`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Thidhi Aadhi Devathalu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['telugu_varamulu']) && $_POST['telugu_varamulu'] == 1) {
    $sql = "SELECT * FROM `telugu_weeks`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Telugu Varamulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}

if (isset($_POST['pandlu_perulu']) && $_POST['pandlu_perulu'] == 1) {
    $sql = "SELECT * FROM `fruits`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Pandlu Perulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['prasadhamulu_perulu']) && $_POST['prasadhamulu_perulu'] == 1) {
    $sql = "SELECT * FROM `prasadhams`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Prasadhamulu Perulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['pushpala_perulu']) && $_POST['pushpala_perulu'] == 1) {
    $sql = "SELECT * FROM `pushpalu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Pushpala Perulu Listed Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
?>