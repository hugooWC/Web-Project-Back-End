<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: *");

header("Access-Control-Allow-Headers: *");

$servername = "localhost";
$username = "root";
$password = "";

$url='https://www.lcsd.gov.hk/datagovhk/facility/facility-bkbc.json';
$json = file_get_contents($url);
$data = json_decode($json, true);

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {   
    $result = array();
    $result["status"] = "Error";
    $result["errcode"] = "300";
    $result["errmsg"] = "Connect database failed!";
	echo json_encode($result);
}
?>







