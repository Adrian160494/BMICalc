<?php
require_once "DataBaseTraining.php";
require_once "dataBase.php";
session_start();

$day = $_SESSION['day'];
$month = $_SESSION['month'];
$part = $_GET['part'];
$description = $_GET['description'];

$array = [];

try{
    $db= new DataBaseTraining($host,$db_user,$db_password,$db_name);

    $db_connect = $db->createConnection();

    $result = $db->addTraining($db_connect,$day,$month,$part,$description);

    if($result == "Done"){
        $array=[$day,$month];
        echo json_encode($array);
        unset($_SESSION['day']);
        unset($_SESSION['month']);
    } else{
        echo "Error";
    }
    $db_connect->close();
} catch (Exception $e){
    echo $e->getMessage();
}
?>


