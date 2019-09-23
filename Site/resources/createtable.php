<?php
include "config.php";

$sql = "CREATE TABLE IF NOT EXISTS clients(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  client VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  served BOOLEAN DEFAULT 0,
  uniqid VARCHAR(250) UNIQUE,
  doctor_id INT(6) NOT NULL REFERENCES  doctors(doctor_id)
)";

$result = $pdo->prepare($sql);
$stmt = $result->execute();

?>
