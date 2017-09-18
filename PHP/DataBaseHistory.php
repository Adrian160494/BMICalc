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

    function addNewOne(mysqli $db,$userId,$bmr,$dayBMR,$date){
        $sql = "INSERT INTO usershistory(userId,bmr,dayBMR,Data) VALUES('$userId','$bmr','$dayBMR','$date')";
        $db->query($sql);
        return true;
    }

    function allHistory(mysqli $db,$id){
        $sql = "SELECT * FROM usershistory WHERE userId='".$id."'";
        $result = $db->query($sql);
        $array =[];
        while($row =$result->fetch_assoc()){
            array_push($array,$row);
        }
       echo json_encode($array);
    }

    function deleteOne(mysqli $db,$id){
        $sql = "DELETE FROM usershistory WHERE id='".$id."'";
        $result = $db->query($sql);
        return true;
    }
}
?>