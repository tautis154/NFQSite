<?php
include "config.php";

$sql = "CREATE TABLE IF NOT EXISTS times(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  duration TIME ,
  doctor_id INT(6) NOT NULL REFERENCES  doctors(doctor_id)
)";

$result = $pdo->prepare($sql);
$stmt = $result->execute();

?>
