<?php
       include "config.php";

       if(isset($_GET['insert'])){
         $client = $_GET['client'];
         if($client!=""){
         $pdoQuery = "INSERT INTO `infoss`(`client`) VALUES (:client)";
         $pdoResult = $pdo->prepare($pdoQuery);
         $pdoExec = $pdoResult->execute(array(":client"=>$client));
         if($pdoExec && $client!="")
         {
             echo 'Data Inserted';
       }
      }else
          echo 'Data Not Inserted';
      }
      header("location:public/index.php");
      ?>
