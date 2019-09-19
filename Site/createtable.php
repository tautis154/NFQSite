<?php
include "config.php";
//class padaryt add cleitn delete cleitn querry
$sql = "CREATE TABLE IF NOT EXISTS infoss(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  doctor VARCHAR(30) DEFAULT 'Dr.Timmy',
  client VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  served BOOLEAN DEFAULT 0
)";
$pdo->exec($sql);
 ?>
