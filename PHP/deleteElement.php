<?php
require_once "DataBaseHistory.php";
require_once "dataBase.php";

$id  = $_GET['id'];

try{
    $db = new DataBaseHistory($host,$db_user,$db_password,$db_name);

    $db_connect = $db->connect();
    $result = $db->deleteOne($db_connect,$id);

    echo $result;
}catch (mysqli_sql_exception $e) {
    echo $e;
}

?>