<?php
function timeDiff($firstTime,$lastTime){
$firstTime=$firstTime;
$lastTime=$lastTime;
$timeDiff=$lastTime-$firstTime;
return $timeDiff;
}

  include "../resources/config.php";
  if(isset($_POST['confirmMultipleBtn'])){
    $numberOfCheckbox = count($_POST['records']);
    $keyToDelete = $_POST['records'][0];
    $notServedd = 0;
    $sql = "SELECT * FROM `clients` WHERE served = ? AND id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([$notServedd,$keyToDelete]);
    $client = $stmt->fetch();

    $doctor_id = $client->doctor_id;
    $sql = "SELECT * FROM `doctors`";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    $doctors = $stmt->fetchAll();

    date_default_timezone_set('EET');
    $currentDate = date('Y-m-d H:i:s');
    foreach ($doctors as $doctor) {
      $sqll = "UPDATE doctors SET end_date = ? WHERE doctor_id = ?";
      $stmtt = $pdo->prepare($sqll);
      $stmtt -> execute([$currentDate,$doctor_id]);

      if($doctor->doctor_id == $doctor_id){
        $date = strtotime(date('Y/m/d H:i:s'));
        $dates = strtotime(date("Y/m/d H:i:s", strtotime($doctor->end_date)));
        $timeDiff =   timeDiff($dates,$date);
        $convertedTime =  gmdate("H:i:s", $timeDiff);
        $pdoQuery = "INSERT INTO `times`(`duration`,`doctor_id`) VALUES (:duration,:doctor_id)";
        $stmttt = $pdo->prepare($pdoQuery);
        $stmttt -> execute([$convertedTime,$doctor_id]);
      }
      $sql = "SELECT * FROM `times`";
      $stmt = $pdo->prepare($sql);
      $stmt -> execute();
      $times = $stmt->fetchAll();

      foreach ($doctors as $doctor) {
        $avg = 0;
        $howmanytimes = 0;
        foreach ($times as $time) {
          if($doctor->doctor_id == $time->doctor_id){
            $dates= strtotime($time->duration) - strtotime('00:00:00');
            $avg = $avg + $dates;
            $howmanytimes++;
          }
        }
        if($howmanytimes == 0){
          $howmanytimes = 1;
        }
        $docctor_id = $doctor->doctor_id;
        $avg = $avg / $howmanytimes;
        $convertedTime =  gmdate("H:i:s", $avg);
        $sqll = "UPDATE doctors SET avg_time = ? WHERE doctor_id = ?";
        $stmtt = $pdo->prepare($sqll);
        $stmtt -> execute([$convertedTime,$docctor_id]);
      }
    }
    //Uptading clients status to checked-out
    $i = 0;
    while($i<$numberOfCheckbox){
      $keyToDelete = $_POST['records'][$i];
      $served = 1;
      $sql = "UPDATE clients SET served = 1 WHERE id = :id ";
      $stmt = $pdo->prepare($sql);
      $stmt -> execute(["id" => $keyToDelete]);

      $i++;
    }
    header("location:doctor.php");
}
?>
