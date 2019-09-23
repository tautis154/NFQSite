<?php
include "config.php";

$sql = "CREATE TABLE IF NOT EXISTS doctors(
  doctor_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  avg_time TIME NOT NULL,
  doctor_name VARCHAR(30) NOT NULL,
  end_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$result = $pdo->prepare($sql);
$stmt = $result->execute();

?>
