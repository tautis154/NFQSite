<?php
function timeLeft($post_doctor_id,$post_id){
  include "../config.php";
  $served = 0;
  $sql = "SELECT * FROM data WHERE served = ? ORDER BY `reg_date` ASC ";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute([$served]);
  $posts = $stmt->fetchAll();

  $sql = "SELECT * FROM `poggers`";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute();
  $doctors = $stmt->fetchAll();
  //Determines index
  $index = 0;
  for ($i=0; $i <count($posts) ; $i++) {

    if($posts[$i]->id == $post_id && $posts[$i]->doctor_id == $post_doctor_id){
      $index++;
    break;
  }
    else if($posts[$i]->doctor_id == $post_doctor_id){
      $index++;
    }
  }
  foreach ($doctors as $doctor) {
      if($doctor->doctor_id ==  $post_doctor_id){
        date_default_timezone_set('EET');
        $date = strtotime(date('Y/m/d H:i:s'));
        $doctorAvg= strtotime($doctor->avg_time) - strtotime('00:00:00');
    //    echo $date . "<br>";

      //  echo $doctorAvg . "<br>";
        if($index == 1){
          //update kad settintu i nuli
             $firstClient  = strtotime("0");
             $nzn = "You can come in ";
            //  echo $firstClient . "<br>";
          //  $nzn =  gmdate("H:i:s", $firstClient);
        //    $clientID = $posts[$i]->id;
        //Idet kad jis sedi kabi
            return $nzn;
          }
          else{
            $last = strtotime($doctor->end_date);
            $timeleft = $last + $doctorAvg * ($index-1) - $date;


           if($timeleft > 0){
            $result = ltrim( sprintf( '%02dh %02dm %02ds', floor( $timeleft / 3600 ), floor( ( $timeleft / 60 ) % 60 ), ( $timeleft % 60 ) ), '0hm' );
            return $result;
          }
          else{
            $firstClient  = strtotime("0");
            $nzn = "The last client is being longer than expected ";
           //  echo $firstClient . "<br>";
           //$nzn =  gmdate("H:i:s", $firstClient);
           return $nzn;
          //  echo $nzn;
          //  $clientID = $posts[$i]->id;
          //  $sqll = "UPDATE data SET time_left = ? WHERE id = ?";
        //    $stmtt = $pdo->prepare($sqll);
          //  $stmtt -> execute([$nzn,$clientID]);

        }
      }
    }
  }
}
  ?>
