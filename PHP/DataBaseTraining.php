<?php

class DataBaseTraining {
    private $host,$db_name,$db_user,$db_password;

    function __construct($host,$db_user,$db_password,$db_name)
    {
        $this->host= $host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
    }

    function createConnection(){
        return new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
    }

    function addTraining(mysqli $db, $day, $month, $part, $description){
        $sql = "INSERT INTO trening(day,month,part,description) VALUES ('$day','$month','$part','$description')";
        $result =$db->query($sql);

        return "Done";
    }

    function selectALL(mysqli $db){
        $sql = "SELECT * FROM trening";
        $result = $db->query($sql);

        return $result;
    }

    function checkTraining(mysqli $db,$day,$month){
        $sql = "SELECT * FROM trening WHERE day='".$day."' AND month='".$month."'";
        $result = $db->query($sql);

        return $result;
    }
}