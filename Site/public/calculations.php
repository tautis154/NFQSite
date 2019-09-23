<?php

function timeLeft($client_doctor_id,$client_id){
include "../resources/config.php";
$served = 0;
$sql = "SELECT * FROM clients WHERE served = ? ORDER BY `reg_date` ASC ";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$served]);
$clients = $stmt->fetchAll();

$sql = "SELECT * FROM `doctors`";
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$doctors = $stmt->fetchAll();

$index = 0;
for ($i=0; $i <count($clients) ; $i++) {
  if($clients[$i]->id == $client_id && $clients[$i]->doctor_id == $client_doctor_id){
    $index++;
    break;
  } elseif($clients[$i]->doctor_id == $client_doctor_id){
    $index++;
  }
}
foreach ($doctors as $doctor) {
  if($doctor->doctor_id ==  $client_doctor_id){
    date_default_timezone_set('EET');
    $date = strtotime(date('Y/m/d H:i:s'));
    $doctorAvg= strtotime($doctor->avg_time) - strtotime('00:00:00');
    if($index == 1){
      $firstClient  = strtotime("0");
      $nzn = "You can come in ";
      return $nzn;
    } else{
      $last = strtotime($doctor->end_date);
      $timeleft = $last + $doctorAvg * ($index-1) - $date;
      if($timeleft > 0){
        $result = ltrim( sprintf( '%02dh %02dm %02ds', floor( $timeleft / 3600 ), floor( ( $timeleft / 60 ) % 60 ), ( $timeleft % 60 ) ), '0hm' );
        return $result;
      } else{
        $firstClient  = strtotime("0");
        $nzn = "The last client is being longer than expected ";
        return $nzn;
      }
    }
  }
  }
}

  ?>
