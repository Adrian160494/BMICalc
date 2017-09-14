<?php
session_start();
require_once "DataBaseHistory.php";
require_once "dataBase.php";

$bmr = $_GET['bmr'];
$dayBMR = $_GET["dayBMR"];
$userId = $_SESSION["id"];

try{
    $db = new DataBaseHistory($host,$db_user,$db_password,$db_name);
    $db_connect = $db->connect();
    $result = $db->addNewOne($db_connect,$userId,$bmr,$dayBMR);
    echo $result;
}catch (mysqli_sql_exception $e){
    echo $e;
}



