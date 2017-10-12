<?PHP
$numberOfDays = $_GET['numberOfDays'];
$month = $_GET['month'];
$firstDayOfMonth = $_GET['firstDayOfMonth'];

$arraysDays = ['Su','Mo','Th','We',"Th","Fr","Sa"];

$firstDay = null;

$counter = $firstDayOfMonth;
$counter2 =0;

switch($firstDayOfMonth){
    case 0:
        $firstDay= $arraysDays[0];
        break;
    case 1:
        $firstDay= $arraysDays[1];
        break;
    case 2:
        $firstDay= $arraysDays[2];
        break;
    case 3:
        $firstDay= $arraysDays[3];
        break;
    case 4:
        $firstDay= $arraysDays[4];
        break;
    case 5:
        $firstDay= $arraysDays[5];
        break;
    case 6:
        $firstDay= $arraysDays[6];
        break;
}

$callendar = "<div class='col-xs-12' style='margin:0 auto'><div class='row'>";
for($k=0;$k<7;$k++){
    if ($k==0 || $k==6){
        $callendar .= "<div class=' col-md-1 col-sm-1 daysText red daysDesc'  >".$arraysDays[$k]."</div>";
    }else{
        $callendar .= "<div class=' col-md-1 col-sm-1 daysText daysDesc'  >".$arraysDays[$k]."</div>";
    }
}
$callendar .= "</div>";
$callendar .= "<div class='row'>";
for($n=0;$n<$firstDayOfMonth;$n++){
    $callendar .= "<div class=' col-md-1 col-sm-1 daysText adding' style='width: 10%;background-color: rgba(250,250,250,0.1);'></div>";
}
for($i=0;$i<$numberOfDays;$i++){

    $id= $i+1;
    if($firstDayOfMonth>6){
        $firstDayOfMonth=0;
        $callendar .="</div><div class='row'>";
    }
    if($counter>6){
        $counter =0;
    }
    if($counter==0 || $counter==6){
        $callendar .= "<div class='daysS col-md-1 col-sm-1 ' content='$id,$month'><a id='$id-$month' href='addTraining.php?day=".$id."&month=".$month."' style='color: red' >".$id."<span class='dayHide' style='color: red'>".$arraysDays[$counter]."</span></a><p id='".$id."-".$month."'></p></div>";
    } else{
        $callendar .= "<div class='daysR col-md-1 col-sm-1 ' content='$id,$month'><a id='$id-$month' href='addTraining.php?day=".$id."&month=".$month."'>".$id."<span class='dayHide'>".$arraysDays[$counter]."</span></a><p id='".$id."-".$month."'></p></div>";
    }
    $counter++;

    $firstDayOfMonth++;
}
$callendar .="</div><div class='descriptionTraining col-md-5 col-sm-5 ' ><p>Choose the day in the callendar and specify the training for that day!</p></div>";

echo $callendar;

?>

