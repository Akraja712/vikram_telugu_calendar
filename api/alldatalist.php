<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include_once('../includes/crud.php');
$db = new Database();
$db->connect();


$sql = "SELECT * FROM `panchangam`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['date'] = DateTime::createFromFormat('Y-m-d', $row['date'])->format('d-m-Y');
    $temp['text1']= $row['text1'];
    $temp['text2']= $row['text2'];
    $temp['text3']= $row['text3'];
    $temp['text4']= $row['text4'];
    $temp['text5']= $row['text5'];
    $temp['text6']= $row['text6'];
    $temp['sunrise'] = date('h:i a', strtotime($row['sunrise']));
    $temp['sunset'] = date('h:i a', strtotime($row['sunset']));
    $temp['moonrise'] = date('h:i a', strtotime($row['moonrise']));
    $temp['moonset'] = date('h:i a', strtotime($row['moonset']));
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
$response['message'] = "Panchangam Listed Successfullty";
$response['panchangam_list'] = $rows;

unset($temp);
$sql = "SELECT * FROM `panchangam_variant`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['panchangam_id'] = $row['panchangam_id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $rows[] = $temp;
}
$response['panchangam_tab_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `festivals`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['date'] = $row['date'];
    $temp['festival'] = $row['festival'];
    $rows[] = $temp;
}
$response['festivals_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `muhurtham`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['muhurtham'] = $row['muhurtham'];
    $rows[] = $temp;
}
$response['muhurtham_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `muhurtham_tab`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['muhurtham_id'] = $row['muhurtham_id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $rows[] = $temp;
}
$response['muhurtham_tab_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `poojalu`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['name'] = $row['name'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['poojalu_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `poojalu_submenu`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['poojalu_id'] = $row['poojalu_id'];
    $temp['name'] = $row['name'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['poojalu_sub_menu_list'] = $rows;
unset($temp);
$sql = "SELECT *,ptv.id AS id FROM `poojalu_tab` pt,`poojalu_tab_variant` ptv WHERE ptv.poojalu_tab_id = pt.id";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['poojalu_id'] = $row['poojalu_id'];
    $temp['subcategory_id'] = $row['subcategory_id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $temp['sub_title'] = $row['sub_title'];
    $temp['sub_description'] = $row['sub_description'];
    $rows[] = $temp;
}
$response['poojalu_tab_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `grahalu`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['name'] = $row['name'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['grahalu_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `grahalu_submenu`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['grahalu_id'] = $row['grahalu_id'];
    $temp['name'] = $row['name'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['grahalu_sub_menu_list'] = $rows;
unset($temp);
$sql = "SELECT *,gtv.id AS id FROM `grahalu_tab` gt,`grahalu_tab_variant` gtv WHERE gtv.grahalu_tab_id = gt.id";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['grahalu_id'] = $row['grahalu_id'];
    $temp['subcategory_id'] = $row['subcategory_id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $temp['sub_title'] = $row['sub_title'];
    $temp['sub_description'] = $row['sub_description'];
    $rows[] = $temp;
}
$response['grahalu_tab_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `nakshatralu`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['name'] = $row['name'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['nakshatralu_list'] = $rows;
unset($temp);
$sql = "SELECT *,ntv.id AS id FROM `nakshatralu_tab` nt,`nakshatralu_tab_variant` ntv WHERE ntv.nakshatralu_tab_id = nt.id";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['nakshatralu_id'] = $row['nakshatralu_id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $temp['sub_title'] = $row['sub_title'];
    $temp['sub_description'] = $row['sub_description'];
    $rows[] = $temp;
}
$response['nakshatralu_tab_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `video`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['link'] = $row['link'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['video_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `video`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['link'] = $row['link'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['video_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `audios`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $temp['lyrics'] = $row['lyrics'];
    $temp['audio'] = DOMAIN_URL . $row['audio'];
    $rows[] = $temp;
}
$response['audio_list'] = $rows;
unset($temp);
$sql = "SELECT * FROM `other_music`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $temp['lyrics'] = $row['lyrics'];
    $temp['audio'] = DOMAIN_URL . $row['audio'];
    $rows[] = $temp;
}
$response['other_music'] = $rows;
unset($temp);

$sql = "SELECT * FROM `settings` WHERE id=1";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
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
$response['Settings_list'] = $rows;
unset($temp);

$sql = "SELECT * FROM `sakuna_settings` WHERE id=1";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['sakunalu_image'] = DOMAIN_URL . $row['sakunalu_image'];
    $temp['balli_image'] = DOMAIN_URL . $row['balli_image'];
    $temp['kaki_image'] = DOMAIN_URL . $row['kaki_image'];
    $temp['kukuta_image'] = DOMAIN_URL . $row['kukuta_image'];
    $temp['sasthram_image'] = DOMAIN_URL . $row['sasthram_image'];
    $temp['pilli_image'] = DOMAIN_URL . $row['pilli_image'];
    $rows[] = $temp;
}
$response['Sakuna Sasthram _list'] = $rows;
unset($temp);


$sql = "SELECT * FROM `telugu_samkrutham`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] =$row['title'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $rows[] = $temp;
}
$response['Telugu Samkrutham List'] = $rows;
unset($temp);
print_r(json_encode($response));
?>