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


if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['mobile'])) {
    $response['success'] = false;
    $response['message'] = "Mobile Number is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['description'])) {
    $response['success'] = false;
    $response['message'] = "Description is Empty";
    print_r(json_encode($response));
    return false;
}

$email = $db->escapeString($_POST['email']);
$mobile = $db->escapeString($_POST['mobile']);
$description = $db->escapeString($_POST['description']);
{
    $sql = "INSERT INTO feedback (description, email,  mobile) VALUES ('$description', '$email', '$mobile')";
    $db->sql($sql);
    $sql = "SELECT id,email,mobile,description FROM feedback WHERE mobile = '$mobile'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "feedback added successfully";
    $response['data'] = $res;
    print_r(json_encode($response));
}
?>