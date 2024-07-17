<?php


  
  $week_array = getStartAndEndDate(52,2013);
  print_r($week_array);

  $list=array();
  $week=array();
$month = 9;
$year = 2014;
function getStartAndEndDate($week, $year) {
  $dto = new DateTime();
  $dto->setISODate($year, $week);
  $ret['week_start'] = $dto->format('M d,Y');
  $startdate = $dto->format('M d,Y');
  $dto->modify('+6 days');
  $ret['week_end'] = $dto->format('Y-m-d');
  $enddate = $dto->format('M d,Y');
  $result = $startdate.' - '.$enddate;
  
  return $result;
}
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month){
        $list[]=date('Y-m-d', $time);
        $value = getStartAndEndDate(date("W", strtotime(date('Y-m-d', $time))),2014);
        if(!in_array($value, $week)){
          $week[] = $value;

        }
         

    }      

}

$rw = array();
$rw = array_unique($week);
// for($i=0; $i<=4; $i++)
// {
//     echo "<option value=" . $rw[7] . ">" . $rw[7]. "</option>";

// }


echo "<pre>";
print_r($week);
//print_r(array_unique($week));
echo "</pre>";
?>