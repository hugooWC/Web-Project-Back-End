<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: *");

header("Access-Control-Allow-Headers: *");
class SearchService {
    function restGet($params) {
       $type = array_shift($params);

        if ($type==='Name') {
            $name = array_shift($params);
            require_once 'db.php';
            $resultArray = array();
            $sql = "SELECT * FROM resources.basketball WHERE Name_en like '%$name%'";
            if ($dbresult = $conn->query($sql)) {
                while ($row = $dbresult->fetch_array()) {
                $record= array();
                $record['bkId']= $row['bkId'];
                $record['District_en'] = $row['District_en'];
                $record['Name_en'] = $row['Name_en'];
                $record['Address_en'] = $row['Address_en'];
                $record['GIHS'] = $row['GIHS'];
                $record['Court_no_en'] = $row['Court_no_en'];
                $record['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
                $record['Opening_hours_en'] = $row['Opening_hours_en'];
                $record['Phone'] = $row['Phone'];
                $record['Remarks_en'] = $row['Remarks_en'];
                $record['Longitude'] = $row['Longitude'];
                $record['Latitude'] = $row['Latitude'];
                $resultArray[] = $record;
                }

                if ($resultArray == null){
                    $result= array();
                    $result["status"] = "Error";
                    $result["errcode"] = "207";
                    $result["errmsg"] = "Not similar record in the database!";
                    $error[] = $result;
                    echo json_encode(array($result));
                    exit; 
                }else{
                    echo json_encode($resultArray);
                }
            }

            
            
            if ($name == null){
                $result= array();
                $result["status"] = "Error";
                $result["errcode"] = "206";
                $result["errmsg"] = "Record is not in the database!";
                $error[] = $result;
                echo json_encode(array($result));
                exit; 
            }
           
        }


        if ($type==='Address') {
            $address = array_shift($params);
            require_once 'db.php';
            $resultArray = array();
            $sql = "SELECT * FROM resources.basketball WHERE Address_en like '%$address%'";
            if ($dbresult = $conn->query($sql)) {
                while ($row = $dbresult->fetch_array()) {
                $record= array();
                $record['bkId']= $row['bkId'];
                $record['District_en'] = $row['District_en'];
                $record['Name_en'] = $row['Name_en'];
                $record['Address_en'] = $row['Address_en'];
                $record['GIHS'] = $row['GIHS'];
                $record['Court_no_en'] = $row['Court_no_en'];
                $record['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
                $record['Opening_hours_en'] = $row['Opening_hours_en'];
                $record['Phone'] = $row['Phone'];
                $record['Remarks_en'] = $row['Remarks_en'];
                $record['Longitude'] = $row['Longitude'];
                $record['Latitude'] = $row['Latitude'];
                $resultArray[] = $record;
                }

                if ($resultArray == null){
                    $result= array();
                    $result["status"] = "Error";
                    $result["errcode"] = "207";
                    $result["errmsg"] = "Not similar record in the database!";
                    $error[] = $result;
                    echo json_encode(array($result));
                    exit; 
                }else{
                    echo json_encode($resultArray);
                }  
            } 
            
            if ($address == null){
                $result= array();
                $result["status"] = "Error";
                $result["errcode"] = "206";
                $result["errmsg"] = "Record is not in the database!";
                $error[] = $result;
                echo json_encode(array($result));
                exit; 
            }
           
        }

        if ($type==='Openhrs') {
            $openhrs = array_shift($params);
            require_once 'db.php';
            $resultArray = array();
            $sql = "SELECT * FROM resources.basketball WHERE Opening_hours_en like '%$openhrs%'";
            if ($dbresult = $conn->query($sql)) {
                while ($row = $dbresult->fetch_array()) {
                $record= array();
                $record['bkId']= $row['bkId'];
                $record['District_en'] = $row['District_en'];
                $record['Name_en'] = $row['Name_en'];
                $record['Address_en'] = $row['Address_en'];
                $record['GIHS'] = $row['GIHS'];
                $record['Court_no_en'] = $row['Court_no_en'];
                $record['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
                $record['Opening_hours_en'] = $row['Opening_hours_en'];
                $record['Phone'] = $row['Phone'];
                $record['Remarks_en'] = $row['Remarks_en'];
                $record['Longitude'] = $row['Longitude'];
                $record['Latitude'] = $row['Latitude'];
                $resultArray[] = $record;
                }
                if ($resultArray == null){
                    $result= array();
                    $result["status"] = "Error";
                    $result["errcode"] = "207";
                    $result["errmsg"] = "Not similar record in the database!";
                    $error[] = $result;
                    echo json_encode(array($result));
                    exit; 
                }else{
                    echo json_encode($resultArray);
                }   
            }
            
            if ($openhrs == null){
                $result= array();
                $result["status"] = "Error";
                $result["errcode"] = "206";
                $result["errmsg"] = "Record is not in the database!";
                $error[] = $result;
                echo json_encode(array($result));
                exit; 
            }
           
        }


        if ($type==='District') {
            $district = array_shift($params);
            $distarray = array('Kowloon City','Tai Po','Central & Western','Yuen Long','Tuen Mun','North','Sai Kung','Sha Tin','Eastern','Wan Chai','Yau Tsim Mong','Southern','Tsuen Wan','Sham Shui Po','Wong Tai Sin','Kwai Tsing','Islands','Kwun Tong');
            $checkdist = false;
           
            if (in_array($district, $distarray)) {
                $checkdist = true;
            }
            if ($district == null){
                $result= array();
                $result["status"] = "Error";
                $result["errcode"] = "206";
                $result["errmsg"] = "Record is not in the database!";
                $error[] = $result;
                echo json_encode(array($result));
                exit; 
            }

            if ($checkdist) {
                require_once 'db.php';
                $resultArray = array();
                $sql = "SELECT * FROM resources.basketball WHERE District_en like '%$district%'";
                if ($dbresult = $conn->query($sql)) {
                    while ($row = $dbresult->fetch_array()) {
                    $record= array();
                    $record['bkId']= $row['bkId'];
                    $record['District_en'] = $row['District_en'];
                    $record['Name_en'] = $row['Name_en'];
                    $record['Address_en'] = $row['Address_en'];
                    $record['GIHS'] = $row['GIHS'];
                    $record['Court_no_en'] = $row['Court_no_en'];
                    $record['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
                    $record['Opening_hours_en'] = $row['Opening_hours_en'];
                    $record['Phone'] = $row['Phone'];
                    $record['Remarks_en'] = $row['Remarks_en'];
                    $record['Longitude'] = $row['Longitude'];
                    $record['Latitude'] = $row['Latitude'];
                    $resultArray[] = $record;
                } 
                    echo json_encode($resultArray); 
                } else {
                    $result= array();
                    $result["status"] = "Error";
                    $result["errcode"] = "201";
                    $result["errmsg"] = "SQL failed in retrieving the basketball record of basketball_Id!";
                    echo json_encode(array($result));
                    exit;
                }
            }else {
                $result= array();
                $result["status"] = "Error";
                $result["errcode"] = "200";
                $result["errmsg"] = "District not found!";
                echo json_encode(array($result));
                exit;
            }                 
        }
        

    }

    function restPost($params) {
        $type = array_shift($params);
        if ($type==='add') {
            $District_en = array_shift($params);
            $Name_en = array_shift($params);
            $Address_en = array_shift($params);
            $GIHS = array_shift($params);
            $Court_no_en = array_shift($params);
            $Ancillary_facilities_en = array_shift($params);
            $Opening_hours_en = array_shift($params);
            $Phone = array_shift($params);
            $Remarks_en = array_shift($params);
            $Longitude = array_shift($params);
            $Latitude = array_shift($params);

            require_once 'db.php';
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
            VALUES (
            '$District_en',
            '$Name_en',
            '$Address_en',
            '$GIHS',
            '$Court_no_en',
            '$Ancillary_facilities_en',
            '$Opening_hours_en',
            '$Phone',
            '$Remarks_en',
            '$Longitude',
            '$Latitude')";
            if ($dbresult = $conn->query($sql)) {
                $result = array();
                $result["status"] = "success";
                $result["msg"] = "Record create successfully.";
                echo json_encode(array($result));
                exit;
            }else {
                $result= array();
				$result["status"] = "Error";
				$result["errcode"] = "202";
				$result["errmsg"] = "SQL failed to create the record!";
				echo json_encode(array($result));
				exit;  
            }
        }
    }


    function restPut($params) {
        $type = array_shift($params);
        if ($type === 'update') {
            $bkId = array_shift($params);
            $District_en = array_shift($params);
            $Name_en = array_shift($params);
            $Address_en = array_shift($params);
            $GIHS = array_shift($params);
            $Court_no_en = array_shift($params);
            $Ancillary_facilities_en = array_shift($params);
            $Opening_hours_en = array_shift($params);
            $Phone = array_shift($params);
            $Remarks_en = array_shift($params);
            $Longitude = array_shift($params);
            $Latitude = array_shift($params); 

            require_once 'db.php';

            $sql = "UPDATE resources.basketball SET 
            District_en ='$District_en',
            Name_en ='$Name_en',
            Address_en ='$Address_en',
            GIHS ='$GIHS',
            Court_no_en ='$Court_no_en',
            Ancillary_facilities_en ='$Ancillary_facilities_en',
            Opening_hours_en ='$Opening_hours_en',
            Phone ='$Phone',
            Remarks_en ='$Remarks_en',
            Longitude ='$Longitude',
            Latitude ='$Latitude'
            WHERE bkId ='$bkId'";

            if ($dbresult = $conn->query($sql)) {
                $result = array();
                $result["status"] = "success";
                $result["msg"] = "Record update successfully.";
                echo json_encode(array($result));
                exit;
            }else {
                $result = array();
                $result["status"] = "Error";
                $result["errcode"] = "203";
                $result["errmsg"] = "SQL failed to update the record!";
                echo json_encode(array($result));
                exit;  
            }
        }
    }

    function restDelete($params) {
        $type = array_shift($params);
        if ($type === 'delete') {
            require_once 'db.php';
            $bkId = array_shift($params);
             
            $sql = "DELETE FROM resources.basketball WHERE bkId='$bkId'";
            if ($dbresult = $conn->query($sql)) {
                $result = array();
                $result["status"] = "success";
                $result["msg"] = "Record delete successfully.";
                echo json_encode(array($result));
                exit;
            }else {
                $result= array();
                $result["status"] = "Error";
                $result["errcode"] = "204";
                $result["errmsg"] = "SQL failed to delete the record!";
                echo json_encode(array($result));
                exit;  
            }
       
        }
           
    } 
}
?>