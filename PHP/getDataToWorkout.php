<?php
require_once "DataBaseTraining.php";
require_once "dataBase.php";
session_start();

try{
    $db= new DataBaseTraining($host,$db_user,$db_password,$db_name);

    $db_connect = $db->createConnection();

    $result = $db->selectALL($db_connect);

    while($row= $result->fetch_assoc()){
        $day = $row['day'];
        $month = $row['month'];
        $data[$month][$day]= $row;
    }

    echo json_encode($data);

} catch (Exception $e){
    echo "Error";
}


?>