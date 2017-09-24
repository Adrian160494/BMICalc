<?php
 require_once "DataBaseTraining.php";
 require_once "dataBase.php";
session_start();

$day = $_SESSION['day'];
$month = $_SESSION['month'];
$part = $_GET['part'];
$description = $_GET['description'];

try{
    $db= new DataBaseTraining($host,$db_user,$db_password,$db_name);

    $db_connect = $db->createConnection();

    $result = $db->addTraining($db_connect,$day,$month,$part,$description);

    if($result == "Done"){
        echo "Done";
    } else{
        echo "Error";
    }

} catch (Exception $e){
    echo $e->getMessage();
}
?>


