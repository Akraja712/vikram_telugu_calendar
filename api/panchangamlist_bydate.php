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
if (empty($_POST['date'])) {
    $response['success'] = false;
    $response['message'] = "Date is Empty";
    print_r(json_encode($response));
    return false;
}
$date_input = $db->escapeString($_POST['date']);
$date_obj = DateTime::createFromFormat('d-m-Y', $date_input);
if (!$date_obj) {
    $date_obj = DateTime::createFromFormat('Y-m-d', $date_input);
}
if (!$date_obj) {
    $response['success'] = false;
    $response['message'] = "Invalid date format";
    print_r(json_encode($response));
    return false;
}
$date = $date_obj->format('Y-m-d');

$sql = "SELECT * FROM `panchangam` WHERE date='$date'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if($num>=1){
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['date'] = DateTime::createFromFormat('Y-m-d', $row['date'])->format('d-m-Y');
        $temp['text1']= $row['text1'];
        $temp['text2']= $row['text2'];
        $temp['text3']= $row['text3'];
        $temp['text4']= $row['text4'];
        $temp['text5']= $row['text5'];
        $temp['text6']= $row['text6'];
        $temp['sunrise'] =$row['sunrise'];
        $temp['sunset'] = $row['sunset'];
        $temp['moonrise'] = $row['moonrise'];
        $temp['moonset'] = $row['moonset'];
        $temp['festivals'] = $row['festivals'];
        $temp['thidhi'] = $row['thidhi'];
        $temp['nakshatram'] = $row['nakshatram'];
        $temp['yogam'] = $row['yogam'];
        $temp['karanam'] = $row['karanam'];
        $temp['abhijith_muhurtham'] = $row['abhijith_muhurtham'];
        $temp['bhrama_muhurtham'] = $row['bhrama_muhurtham'];
        $temp['amrutha_kalam'] = $row['amrutha_kalam'];
        $temp['rahukalam'] = $row['rahukalam'];
        $temp['yamakandam'] = $row['yamakandam'];
        $temp['dhurmuhurtham'] = $row['dhurmuhurtham'];
        $temp['varjyam'] = $row['varjyam'];
        $temp['gulika'] =$row['gulika'];
        $temp['hc1']= $row['hc1'];
        $temp['hc2']= $row['hc2'];
        $temp['hc3']= $row['hc3'];
        $temp['hc4']= $row['hc4'];
        $temp['hc5']= $row['hc5'];
        $temp['hc6']= $row['hc6'];
        $temp['hc7']= $row['hc7'];
        $temp['hc8']= $row['hc8'];
        $temp['hc9']= $row['hc9'];
        $temp['hc10']= $row['hc10'];
        $temp['hc11']= $row['hc11'];
        $temp['hc12']= $row['hc12'];
        $rows[] = $temp;
    }
 
    $response['success'] = true;
    $response['message'] = "Panchangam Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));

}
else{
    $response['success'] = false;
    $response['message'] = "Data Not Found";
    print_r(json_encode($response));
}


?>