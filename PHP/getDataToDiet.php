<?php
require_once "DataBaseDiet.php";
require_once "dataBase.php";
session_start();

try{
    $db= new DataBaseDiet($host,$db_user,$db_password,$db_name);

    $db_connect = $db->createConnection();

    $result = $db->selectALLDiets($db_connect);

    while($row= $result->fetch_assoc()){
        $day = $row['day'];
        $month = $row['month'];
        $dataDiet[$month][$day]= $row;
    }

    echo json_encode($dataDiet);

} catch (Exception $e){
    echo "Error";
}


?>