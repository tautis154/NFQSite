<?php
//Idet foreign key, index php butu dropdownlist pasirinkti daktara is database.
//If vardas pasirinktas vardas = tas foreign key vardui tada
include "config.php";
//class padaryt add cleitn delete cleitn querry
$sql = "CREATE TABLE IF NOT EXISTS timeinclude(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  duration TIME ,
  doctor_id INT(6) NOT NULL REFERENCES  nass(doctor_id)
)";
$result = $pdo->prepare($sql);
$whatever = $result->execute();

 ?>
