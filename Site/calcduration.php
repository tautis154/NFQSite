<?php
function timeDiff($firstTime,$lastTime)
{

// convert to unix timestamps
$firstTime=$firstTime;
$lastTime=$lastTime;

// perform subtraction to get the difference (in seconds) between times
$timeDiff=$lastTime-$firstTime;

// return the difference
return $timeDiff;
}
       include "config.php";

       if(isset($_POST['confirmMultipleBtn'])){

         $numberOfCheckbox = count($_POST['records']);

         //Padaryt dabar kad update ta boolean
             $keyToDelete = $_POST['records'][0];
             $notServedd = 0;
             $sql = "SELECT * FROM `data` WHERE served = ? AND id = ?";
             $stmt = $pdo->prepare($sql);
             $stmt -> execute([$notServedd,$keyToDelete]);
             $others = $stmt->fetch();
           // code...
        $doctor_id = $others->doctor_id;
         $sql = "SELECT * FROM `poggers`";
         $stmt = $pdo->prepare($sql);
         $stmt -> execute();
         $doctors = $stmt->fetchAll();
          date_default_timezone_set('EET');
          $currentDate = date('Y-m-d H:i:s');

         foreach ($doctors as $doctor) {
             $sqll = "UPDATE poggers SET end_date = ? WHERE doctor_id = ?";
             $stmtt = $pdo->prepare($sqll);
             $stmtt -> execute([$currentDate,$doctor_id]);
             //Insert duration
             if($doctor->doctor_id == $doctor_id){
             $date = strtotime(date('Y/m/d H:i:s'));
             $dates = strtotime(date("Y/m/d H:i:s", strtotime($doctor->end_date)));
             $save =   timeDiff($dates,$date);
             $opa =  gmdate("H:i:s", $save);
             $pdoQuery = "INSERT INTO `timeinclude`(`duration`,`doctor_id`) VALUES (:duration,:doctor_id)";
             $stmttt = $pdo->prepare($pdoQuery);
             $stmttt -> execute([$opa,$doctor_id]);
           }
           //Get all times so calculate id time for each fetch doctors and fetch timeinclude
           //Fetch doctors table1$sql = "SELECT * FROM `data` WHERE served = ? AND id = ?";
           $sql = "SELECT * FROM `timeinclude`";
           $stmt = $pdo->prepare($sql);
           $stmt -> execute();
           $times = $stmt->fetchAll();
           foreach ($doctors as $doctor) {
               $avg = 0;
               $howmanytimes = 0;
               foreach ($times as $time) {
                 if($doctor->doctor_id == $time->doctor_id){
                   $dates= strtotime($time->duration) - strtotime('00:00:00');

                   echo $dates . "<br>";
                   $avg = $avg + $dates;
                   $howmanytimes++;
                 }
               // code...
               }
               if($howmanytimes == 0){
                 $howmanytimes = 1;
               }
               $docctor_id = $doctor->doctor_id;
               $avg = $avg / $howmanytimes;
               $saving =  gmdate("H:i:s", $avg);

               $sqll = "UPDATE poggers SET avg_time = ? WHERE doctor_id = ?";
               $stmtt = $pdo->prepare($sqll);
               $stmtt -> execute([$saving,$docctor_id]);

             // code...
           }

         }


//Make client bool = 1 - Came out of the doctor
         $i = 0;
         while($i<$numberOfCheckbox){

      //Padaryt dabar kad update ta boolean
             $keyToDelete = $_POST['records'][$i];
             $served = 1;
             $sql = "UPDATE data SET served = 1 WHERE id = :id ";
             $stmt = $pdo->prepare($sql);
             $stmt -> execute(["id" => $keyToDelete]);
             $i++;

         }
         header("location:doctor.php");


// uptade current date


}





      ?>
