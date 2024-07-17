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

if (isset($_POST['mahabharatham']) && $_POST['mahabharatham'] == 1) {

    $sql = "SELECT * FROM `mahabharatham`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Mahabharatham Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['mahabharatham_menu']) && $_POST['mahabharatham_menu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $sql = "SELECT * FROM `mahabharatham_menu` WHERE mahabharatham_id = $id";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];

            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Mahabharatham Menu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['mahabharatham_submenu']) && $_POST['mahabharatham_submenu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $menu_id = $db->escapeString($_POST['menu_id']);
    $sql = "SELECT ms.id,ms.title,ms.description,mm.title AS menu_title FROM `mahabharatham_submenu` ms,`mahabharatham_menu` mm WHERE ms.mahabharatham_menu_id = mm.id AND ms.mahabharatham_id = $id AND ms.mahabharatham_menu_id = $menu_id";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['menu_title'] = $row['menu_title'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Mahabharatham Submenu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
//<<-----Ramayanam list---->
if (isset($_POST['ramayanam']) && $_POST['ramayanam'] == 1) {
    $sql = "SELECT * FROM `ramayanam`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Ramayanam Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['ramayanam_menu']) && $_POST['ramayanam_menu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $sql = "SELECT * FROM `ramayanam_menu` WHERE ramayanam_id = '$id'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Ramayanam Menu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['ramayanam_submenu']) && $_POST['ramayanam_submenu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $menu_id = $db->escapeString($_POST['menu_id']);
    $sql = "SELECT rs.id,rs.title,rs.description,rm.title AS menu_title FROM `ramayanam_submenu` rs,`ramayanam_menu` rm WHERE rs.ramayanam_menu_id = rm.id AND rs.ramayanam_id = $id AND rs.ramayanam_menu_id = $menu_id";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['menu_title'] = $row['menu_title'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Ramayanam Submenu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}

///<<-----Bhagawath Geetha --->>
if (isset($_POST['bhagawath_geetha']) && $_POST['bhagawath_geetha'] == 1) {
    $sql = "SELECT * FROM `bhagawath_geetha`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Bhagawath Geetha Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['bhagawath_geetha_menu']) && $_POST['bhagawath_geetha_menu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $sql = "SELECT * FROM `bhagawath_geetha_menu` WHERE bhagawath_geetha_id = '$id'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Bhagawath Geetha Menu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['bhagawath_geetha_submenu']) && $_POST['bhagawath_geetha_submenu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $menu_id = $db->escapeString($_POST['menu_id']);
    $sql = "SELECT bs.id,bs.title,bs.description,bm.title AS menu_title FROM `bhagawath_geetha_submenu` bs,`bhagawath_geetha_menu` bm WHERE bs.bhagawath_geetha_menu_id = bm.id AND bs.bhagawath_geetha_id = $id AND bs.bhagawath_geetha_menu_id = $menu_id";

    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['menu_title'] = $row['menu_title'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Bhagawath Geetha Submenu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}

//<<-----Bhagawatham list---->
if (isset($_POST['bhagawatham']) && $_POST['bhagawatham'] == 1) {
    $sql = "SELECT * FROM `bhagawatham`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Bhagawatham Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['bhagawatham_menu']) && $_POST['bhagawatham_menu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $sql = "SELECT * FROM `bhagawatham_menu` WHERE bhagawatham_id = '$id'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Bhagawatham Menu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['bhagawatham_submenu']) && $_POST['bhagawatham_submenu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $menu_id = $db->escapeString($_POST['menu_id']);
    $sql = "SELECT bs.id,bs.title,bs.description,bm.title AS menu_title FROM `bhagawatham_submenu` bs,`bhagawatham_menu` bm WHERE bs.bhagawatham_menu_id = bm.id AND bs.bhagawatham_id = $id AND bs.bhagawatham_menu_id = $menu_id";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['menu_title'] = $row['menu_title'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Bhagawatham Submenu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}

//<<-----Telugu_sethakamulu list---->
if (isset($_POST['telugu_sethakamulu']) && $_POST['telugu_sethakamulu'] == 1) {
    $sql = "SELECT * FROM `telugu_sethakamulu`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Telugu Sethakamulu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['telugu_sethakamulu_menu']) && $_POST['telugu_sethakamulu_menu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $sql = "SELECT * FROM `telugu_sethakamulu_menu` WHERE telugu_sethakamulu_id	 = '$id'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Sethakamulu Menu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['telugu_sethakamulu_submenu']) && $_POST['telugu_sethakamulu_submenu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $menu_id = $db->escapeString($_POST['menu_id']);
    $sql = "SELECT ts.id,ts.title,ts.description,ts.title AS menu_title FROM `telugu_sethakamulu_submenu` ts,`telugu_sethakamulu_menu` tm WHERE ts.telugu_sethakamulu_menu_id = tm.id AND ts.telugu_sethakamulu_id = $id AND ts.telugu_sethakamulu_menu_id = $menu_id";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['menu_title'] = $row['menu_title'];
            $temp['title'] = $row['title'];
            $temp['description'] = $row['description'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Sethakamulu Submenu Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}


//<<-----Shivapuranam list---->
if (isset($_POST['shivapuranam']) && $_POST['shivapuranam'] == 1) {
    $sql = "SELECT * FROM `shivapuranam`";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if($num>=1){
        $rows = array();
        $temp = array();
        foreach ($res as $row) {
            $temp['id'] = $row['id'];
            $temp['title'] = $row['title'];
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Shivapuranam Listed Successfullty";
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "Not Found";
        print_r(json_encode($response));
    }

}
if (isset($_POST['shivapuranam_menu']) && $_POST['shivapuranam_menu'] == 1) {
    $id = $db->escapeString($_POST['id']);
    $sql = "SELECT * FROM `shivapuranam_menu` WHERE shivapuranam_id = '$id'";
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
            $temp['image'] = DOMAIN_URL . $row['image'];
            $rows[] = $temp;
        }
        $response['success'] = true;
        $response['message'] = "Shivapuranam Menu Listed Successfullty";
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