<?php

class DataBaseDiet {
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

    function addDiet(mysqli $db, $day, $month, $breakfast, $lunch,$dinner,$dinner2,$supper){
        $sql = "INSERT INTO diet(day,month,breakfast,lunch,dinner,dinner2,supper) VALUES ('$day','$month','$breakfast','$lunch','$dinner','$dinner2','$supper')";
        $result =$db->query($sql);
        return "Done";
    }

    function selectALLDiets(mysqli $db){
        $sql = "SELECT * FROM diet";
        $result = $db->query($sql);

        return $result;
    }

    function checkDiet(mysqli $db,$day,$month){
        $sql = "SELECT * FROM trening WHERE day='".$day."' AND month='".$month."'";
        $result = $db->query($sql);

        return $result;
    }

    function deleteDiet(mysqli $db,$id){
        $sql = "DELETE FROM trening WHERE id='".$id."'";
        $result = $db->query($sql);
        return $result;
    }
}

?>