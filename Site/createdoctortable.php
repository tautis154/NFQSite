<?php
//Idet foreign key, index php butu dropdownlist pasirinkti daktara is database.
//If vardas pasirinktas vardas = tas foreign key vardui tada
include "config.php";
//class padaryt add cleitn delete cleitn querry
$sql = "CREATE TABLE IF NOT EXISTS poggers(
  doctor_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  avg_time TIME NOT NULL,
  doctor_name VARCHAR(30) NOT NULL,
  end_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$result = $pdo->prepare($sql);
$whatever = $result->execute();

 ?>
