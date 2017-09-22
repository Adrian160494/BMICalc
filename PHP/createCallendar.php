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

$callendar = "<div class='col-xs-12' style='margin:auto'><div class='row'>";
for($k=0;$k<7;$k++){
    if ($k==0 || $k==6){
        $callendar .= "<div class='col-xs-12 daysText red' style='width: 10%;' >".$arraysDays[$k]."</div>";
    }else{
        $callendar .= "<div class='col-xs-12 daysText' style='width: 10%;' >".$arraysDays[$k]."</div>";
    }
}
$callendar .= "</div>";
$callendar .= "<div class='row'>";
for($n=0;$n<$firstDayOfMonth;$n++){
    $callendar .= "<div class='col-xs-12 daysText' style='width: 10%;background-color: rgba(250,250,250,0.1);'></div>";
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
        $callendar .= "<div class='col-xs-12 daysS' style='width: 10%;' ><span id='' onclick='addNewTrening($id,$month)'><p class='red' style='font-size: 14px;'>".$id."</p><p id='".$id."-".$month."'></p></span></div>";
    } else{
        $callendar .= "<div class='col-xs-12 daysR' style='width: 10%;' ><span onclick='addNewTrening($id,$month)'><p style='font-size: 14px;'>".$id."</p><p id='".$id."-".$month."'></p></span></div>";
    }
    $counter++;

    $firstDayOfMonth++;
}
$callendar .="</div>";

echo $callendar;

?>