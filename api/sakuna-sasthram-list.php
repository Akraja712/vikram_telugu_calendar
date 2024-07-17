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
if (isset($_POST['sakunalu']) && $_POST['sakunalu'] == 1) {
    $sql = "SELECT * FROM `sakunalu`";
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
        $response['message'] = "Sakunalu List Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}


if (isset($_POST['balli_sasthram']) && $_POST['balli_sasthram'] == 1) {
    $sql = "SELECT * FROM `balli_sasthram`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if ($num >= 1) {
        $rows = array();
        foreach ($res as $row) {
            $id = $row['id'];
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['sub_title1'] = $row['sub_title1'];
            $temp['sub_title2'] = $row['sub_title2'];

            $sql_variant = "SELECT * FROM `balli_sasthram_variant` WHERE balli_sasthram_id = '$id'";
            $db->sql($sql_variant);
            $res_variant = $db->getResult();
            $temp['balli_sasthram_variant'] = $res_variant;
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Balli Sasthram List Successfully";
        $response['data'] = $rows;
    } else {
        $response['success'] = false;
        $response['message'] = "Data Not Found";
    }
    print_r(json_encode($response));
}

if (isset($_POST['kaki_sasthram']) && $_POST['kaki_sasthram'] == 1) {
    $sql = "SELECT * FROM `kaki_sasthram`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Kaki Sasthram Panchangam List Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['kukuta_sasthram']) && $_POST['kukuta_sasthram'] == 1) {
    $sql = "SELECT * FROM `kukuta_sasthram`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Kukuta Sasthram Panchangam List Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['kukutasasthram_menu']) && $_POST['kukutasasthram_menu'] == 1) {
    $sql = "SELECT * FROM `kukutasasthram_menu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Kukuta Sasthram Menu Panchangam List Successfullty";
        $response['data'] = $res;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}

if (isset($_POST['pilli_sasthram']) && $_POST['pilli_sasthram'] == 1) {
    $sql = "SELECT * FROM `pilli_sasthram`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $response['success'] = true;
        $response['message'] = "Pilli Sasthram Panchangam List Successfullty";
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