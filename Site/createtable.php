<?php
//Idet foreign key, index php butu dropdownlist pasirinkti daktara is database.
//If vardas pasirinktas vardas = tas foreign key vardui tada
include "config.php";
//class padaryt add cleitn delete cleitn querry
$sql = "CREATE TABLE IF NOT EXISTS data(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  client VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  served BOOLEAN DEFAULT 0,
  time_left TIME,
  uniqid VARCHAR(250) UNIQUE,
  doctor_id INT(6) NOT NULL REFERENCES  poggers(doctor_id)
)";
$result = $pdo->prepare($sql);
$whatever = $result->execute();

 ?>
