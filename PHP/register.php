<?php

require_once "dataBase.php";

session_start();


$login = $_GET['userLogin'];
$password = $_GET['userPassword'];
$email = $_GET['userEmail'];

try{
    $db = new mysqli($host,$db_user,$db_password,$db_name);
    $sql = "SELECT * FROM users WHERE login='".$login."'";
    $sql2 = "SELECT * FROM users WHERE email='".$email."'";

    $result1 = $db->query($sql);
    $result2 = $db->query($sql2);


    if($result1->num_rows>0){
        echo "There is the user in database with the same login!";
        exit;
    } else{
        if($result2->num_rows>0){
            echo "There is the user in the database with the same email!";
            exit;
        } else{
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
           $sql3 = "INSERT INTO users(login,password,email) VALUES ('$login','$passwordHash','$email')";
           $resultAdd= $db->query($sql3);
           echo "Done";
        }
    }
} catch (mysqli_sql_exception $e){
    echo "MYSQL ERROR";
}

?>

