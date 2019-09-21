<?php
include "../config.php";
$served = 0;

if(isset($_POST['filter']) && $_POST['limit']!="" && is_numeric($_POST['limit']))
{
  $limit = $_POST['limit'];
  $sql = "SELECT * FROM data WHERE served = ? ORDER BY `reg_date` ASC LIMIT ?";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute([$served,$limit]);
  $posts = $stmt->fetchAll();
}
else{
$sql = "SELECT * FROM data WHERE served = ? ORDER BY `reg_date` ASC ";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$served]);
$posts = $stmt->fetchAll();
}

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
    // code...





      if($doctor->doctor_id ==  $post_doctor_id){
        date_default_timezone_set('EET');
        $date = strtotime(date('Y/m/d H:i:s'));
        $doctorAvg= strtotime($doctor->avg_time) - strtotime('00:00:00');
    //    echo $date . "<br>";

      //  echo $doctorAvg . "<br>";
        if($index == 1){
          //update kad settintu i nuli
             $firstClient  = strtotime("0");
            //  echo $firstClient . "<br>";
            $nzn =  gmdate("H:i:s", $firstClient);
        //    $clientID = $posts[$i]->id;
        //Idet kad jis sedi kabi
            return $nzn;
          }
          else{
            $last = strtotime($doctor->end_date);
            $timeleft = $last + $doctorAvg * ($index-1) - $date;
           if($timeleft > 0){
            $nzn =  gmdate("H:i:s", $timeleft);
            return $nzn;
          }
          else{
            $firstClient  = strtotime("0");
           //  echo $firstClient . "<br>";
           $nzn =  gmdate("H:i:s", $firstClient);
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

      //   $clientID = $posts[$i]->id;
    //     $sqll = "UPDATE data SET time_left = ? WHERE id = ?";
      //   $stmtt = $pdo->prepare($sqll);
      //   $stmtt -> execute([$nzn,$clientID]);

      //  UPDATE SET WHERE id = ? // tas id tai post id






?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>




    <nav id="navbar">
      <div class ="container">
        <ul>
          <li><a href="index.php" >Home Page</a></li>
          <li><a href="clientsite.php" >Client Page</a></li>
        </ul>
      </div>
    </nav>
    <form class="" action="scoreboard.php" method="post">
      <div class="container">

      <label >Enter how many clients you want to see</label>
      <br>
      <input type="text" name="limit" value="">
      <input type="submit" name="filter" value="Filter">
    </div>
    </form>



    <table style="margin-top: 20px" class="table" id="table1">

              <tr>
                <th>Client</th>
                <th>Number</th>
                <th>Date</th>
                <th>Time left</th>

              </tr>


              <?php




               foreach($posts as $post) {
                 echo "<tr>";
                         echo "<td>" . $post->client . "</td>";
                         echo "<td>" . $post->id . "</td>";
                         echo "<td>" . $post->reg_date . "</td>";
                         echo "<td>" . timeLeft($post->doctor_id,$post->id) . "</td>";
                         echo "</tr>";
           }


               ?>

  </body>
</html>
