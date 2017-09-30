<?php
require_once "DataBaseTraining.php";
require_once "dataBase.php";
session_start();

$id = $_GET['id'];

try {
    $db = new DataBaseTraining($host, $db_user, $db_password, $db_name);

    $db_connect = $db->createConnection();

    $result = $db->deleteElement($db_connect,$id);

    if($result){
        echo true;
    } else{
        echo false;
    }
} catch(Exception $e){
    echo "Error";
}

?>