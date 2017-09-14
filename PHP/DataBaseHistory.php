<?php

class DataBaseHistory{
    private $host,$db_name,$db_user,$db_password;

    function __construct($host,$db_user,$db_password,$db_name)
    {
        $this->host = $host;
        $this->db_name= $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    function connect(){
        return new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
    }

    function addNewOne(mysqli $db,$userId,$bmr,$dayBMR){
        $sql = "INSERT INTO usershistory(userId,bmr,dayBMR) VALUES($userId,$bmr,$dayBMR)";
        $db->query($sql);
        return true;
    }

    function allHistory(mysqli $db,$id){
        $sql = "SELECT * FROM usershistory WHERE userId='".$id."'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }
}
?>