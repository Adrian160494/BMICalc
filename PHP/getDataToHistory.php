<?php

session_start();

require_once "DataBaseHistory.php";
require_once "dataBase.php";

$userId = $_SESSION["id"];

try{
    $db = new DataBaseHistory($host,$db_user,$db_password,$db_name);

    $db_connect = $db->connect();
    $result = $db->allHistory($db_connect,$userId);

    echo $result;
}catch (mysqli_sql_exception $e){
    echo $e;
}