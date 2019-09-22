<?php
       include "config.php";
      session_start();

       if(isset($_GET['insert'])){

         $client = $_GET['client'];
         $doctor = $_GET['doctor'];
         echo $doctor;


         $sql = "SELECT * FROM `poggers` WHERE doctor_id = ?";
         $stmt = $pdo->prepare($sql);
         $stmt -> execute([$doctor]);
         $posts = $stmt->fetchAll();

         if($doctor!=""){
        $uniqueid = uniqid('id',true);
         $_SESSION["newsession"]= "clientsite.php?token=".$uniqueid;
         $_SESSION["registered"] = "Registered succesfully";
         $_SESSION["clientSite"] = $uniqueid;
}
else{
  $_SESSION["notRegistered"] = "Registered unsuccesfully. Call someone";
}

//Sukurti time left cia

         if($client!="" && $doctor!=""){
           //Make time left
           //Calculate how much time was spent visiting the doctor
//Calculate how much time spent with how many clients
         // be cherkmark is current -
         //Idedi random id
      $pdoQuery = "INSERT INTO `data`(`client`,`uniqid`,`doctor_id`) VALUES (:client,:uniqid,:doctor_id)";
         $pdoResult = $pdo->prepare($pdoQuery);
         $pdoExec = $pdoResult->execute(array(":client"=>$client,":uniqid"=>$uniqueid,":doctor_id"=>$doctor));
         if($pdoExec && $client!="")
         {
             echo 'Data Inserted';
       }
       //Fetchint
      }else
          echo 'Data Not Inserted';
      }


//Calculates how much time was spent at the doctor
      header("location:public/index.php");
      ?>
