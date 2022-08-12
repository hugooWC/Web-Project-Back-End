<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: *");

header("Access-Control-Allow-Headers: *");

require_once('db.php');
$sql = "CREATE DATABASE IF NOT EXISTS resources";
if (!$result=$conn->query($sql)) {
	$result = array();
    $result["status"] = "Error";
    $result["errcode"] = "301";
    $result["errmsg"] = "Create database failed!";
	echo json_encode($result);
}

$sql = "CREATE TABLE IF NOT EXISTS resources.basketball(
    bkId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    District_en text, 
    Name_en text, 
    Address_en text, 
    GIHS text, 
    Court_no_en text, 
    Ancillary_facilities_en text, 
    Opening_hours_en text, 
    Phone text,
    Remarks_en text,
    Longitude text,
    Latitude text)"; 
 
 if (!$result=$conn->query($sql)) {
	$result = array();
    $result["status"] = "Error";
    $result["errcode"] = "302";
    $result["errmsg"] = "Create table failed!";
	echo json_encode($result);
}

foreach($data as $row) {
    $sql = "INSERT INTO resources.basketball(
    District_en, 
    Name_en, 
    Address_en, 
    GIHS,
    Court_no_en, 
    Ancillary_facilities_en, 
    Opening_hours_en, 
    Phone, 
    Remarks_en,
    Longitude, 
    Latitude) 
    VALUES(
    '".$row["District_en"]."',
    '".$row["Name_en"]."',
    '".$row["Address_en"]."',
    '".$row["GIHS"]."',
    '".$row["Court_no_en"]."',
    '".$row["Ancillary_facilities_en"]."',
    '".$row["Opening_hours_en"]."',
    '".$row["Phone"]."',
    '".$row["Remarks_en"]."',
    '".$row["Longitude"]."',
    '".$row["Latitude"]."')";

    
    mysqli_query($conn, $sql);
}   
    if (!$result=$conn->query($sql)) {
        $result = array();
        $result["status"] = "Error";
        $result["errcode"] = "303";
        $result["errmsg"] = "Data insertion failed!";
	    echo json_encode($result);
    } else {
        $result = array();
        $result["msg"] = "Data insertion successfully.";
        echo json_encode($result);
    }

?>