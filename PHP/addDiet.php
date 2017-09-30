<?php
require_once "DataBaseDiet.php";
require_once "dataBase.php";
session_start();

$day = $_SESSION['day2'];
$month = $_SESSION['month2'];
$breakfast= $_GET['breakfast'];
$lunch =$_GET['lunch'];
$dinner = $_GET['dinner'];
$dinner2 = $_GET['dinner2'];
$supper = $_GET['supper'];

$array2=[];

try{
    $db= new DataBaseDiet($host,$db_user,$db_password,$db_name);

    $db_connect = $db->createConnection();

    $result = $db->addDiet($db_connect,$day,$month,$breakfast,$lunch,$dinner,$dinner2,$supper);

    if($result == "Done"){
        $array2=[$day,$month];
        echo json_encode($array2);
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
