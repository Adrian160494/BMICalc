<?PHP
$numberOfDays = $_GET['numberOfDays'];
$month = $_GET['month'];
$firstDayOfMonth = $_GET['firstDayOfMonth'];

$arraysDays = ['Sunday','Monday','Thuesday','Wednesday',"Thursday","Friday","Saturday"];
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

$firstDay = null;

$counter = $firstDayOfMonth;
$counter2 =0;


$callendar = "<div class='col-xs-6 col-xs-offset-3 row text-center'>";

for($i=0;$i<$numberOfDays;$i++){

    $id= $i+1;
    if($firstDayOfMonth>6){
        $firstDayOfMonth=0;
    }
    if($counter>6){
        $counter =0;
    }
    if($counter==0 || $counter==6){
        $callendar .= "<div class='row well' style='width: 100%;' content='$id,$month'><div id='".$id."-".$month."'></div><span style='color: red'>$arraysDays[$counter]  $id</span><button class='btn btn-default  pull-right' ng-click='showDiet(".$id.",".$month.")'><span class='glyphicon glyphicon-calendar'></span></button></div>";
    } else{
        $callendar .= "<div class='row well' style='width: 100%;' content='$id,$month'><div id='".$id."-".$month."'></div><span style='color: black'>$arraysDays[$counter]  $id</span><button class='btn btn-default  pull-right' ng-click='showDiet(".$id.",".$month.")'><span class='glyphicon glyphicon-calendar'></span></button></div>";
    }
    $counter++;

    $firstDayOfMonth++;
}
$callendar .="</div>";

echo $callendar;

?>