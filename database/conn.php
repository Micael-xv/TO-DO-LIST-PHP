<?php

$hostname = 'localhost';
$database = 'to do php';
$username = 'postgres';
$password = '';

try {
  $pdo = new PDO("pgsql:host=$hostname;dbname=$database", $username, $password);
} catch (PDOException $e) {
  echo "Erro ao conectar no banco: " . $e->getMessage();
}
