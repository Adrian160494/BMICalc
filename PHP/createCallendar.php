<?PHP
$numberOfDays = $_GET['numberOfDays'];
$month = $_GET['month'];
$firstDayOfMonth = $_GET['firstDayOfMonth'];

$arraysDays = ['Sun','Mon','Thue','Wed',"Thur","Fri","Sat"];

$firstDay = null;

$counter = $firstDayOfMonth;

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

$callendar = "<div class='col-md-12'><div class='col-xs-12 col-md-12 col-sm-10'>";
for($k=0;$k<7;$k++){
    if ($k==0 || $k==6){
        $callendar .= "<div class='col-xs-12 col-sm-12 col-md-1 daysText red' style='width: 12%; height: 15%;' >".$arraysDays[$k]."</div>";
    }else{
        $callendar .= "<div class='col-xs-12 col-sm-12 col-md-1 daysText' style='width: 12%; height: 15%;' >".$arraysDays[$k]."</div>";

    }
}
for($n=0;$n<$firstDayOfMonth;$n++){
    $callendar .= "<div  class='col-xs-12 col-sm-12 col-md-1' style='width: 12%; height: 15%; background-color: rgba(250,250,250,0.1); margin: 5px;'></div>";
}
for($i=0;$i<$numberOfDays;$i++){

    $id= $i+1;
    if($firstDayOfMonth>6){
        $firstDayOfMonth=0;
    }
    if($counter>6){
        $counter =0;
    }
    if($counter==0 || $counter==6){
        $callendar .= "<div class='col-xs-12 col-sm-12 col-md-1 daysS' style='width: 12%; height: 15%;' ><span id='' onclick='addNewTrening($id,$month)'><p class='red'>".$id."</p><p id='".$id."-".$month."'></p></span></div>";
    } else{
        $callendar .= "<div class='col-xs-12 col-sm-2 col-md-2 daysR' style='width: 12%; height: 15%;' ><span onclick='addNewTrening($id,$month)'><p>".$id."</p><p id='".$id."-".$month."'></p></span></div>";
    }
    $counter++;

    $firstDayOfMonth++;
}
$callendar .="</div></div>";

echo $callendar;

?>