<?php
try {
  // $dsn = 'mysql:host=127.0.0.1;dbname=shopGB_l4';
  $dsn = 'mysql:host=localhost;dbname=shopGB_l4';

  $pdo = new PDO($dsn, 'root', '');
  // $pdo = new PDO('mysql:host=localhost;dbname=shopGB_l4', 'root', '');
} catch (PDOException $e) {
  echo "Ошибка!: " . $e->getMessage();
  die();
}