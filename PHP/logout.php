<?php
session_start();

session_unset();

header("Location: /BMICalc/index.php");

?>