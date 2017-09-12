<?php

$sex = $_GET['sex'];
$weight = $_GET['weight'];
$height = $_GET['height'];
$age = $_GET['age'];
$activity = $_GET['activity'];

if($sex === "Female"){
    $calculate = (66+[13.7*$weight]+[5*$height] -[6,76*$age]);
    $CPM = $calculate*$activity;
} else
{
    $calculate = 655+[9.6*$weight]+[1.8*$height]-[4.7*$age];
    $CPM = $calculate*$activity;
}

echo '
<div class="panel panel-info">
    <div class="panel-heading">
    <h2>Your result is: </h2>
</div>
<div class="panel-body">
    <p></p>
    <p></p>
    <p>Your basic caloric need: '.$calculate.'!</p>
    
    <p>You need:'.$CPM.' to maintain your weight!</p>
</div>
</div>
<div class="panel-footer">

</div>';

?>