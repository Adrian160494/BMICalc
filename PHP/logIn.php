<?php
session_start();
require_once "dataBase.php";

$login = $_GET['userLogin'];
$password = $_GET['userPassword'];

$db = new mysqli($host,$db_user,$db_password,$db_name);

$sql = "SELECT * FROM users WHERE login='".$login."'";

$result = $db->query($sql);

if($result->num_rows>0){
    $data = $result->fetch_assoc();
    if(password_verify($password,$data['password'])){
        $_SESSION['id']=$data['id'];
        $_SESSION['login'] = $data['login'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['email']=$data['email'];
        $json_result = json_encode($data);
        echo $json_result;
    } else{
        echo "The password is incorrect!";
    }
} else{
    echo "There is no one with that login!";
}
?>