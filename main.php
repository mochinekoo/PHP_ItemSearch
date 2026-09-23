<?php
$config = require __DIR__ . '/databse.php';

$pdo = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
    $config['user'],
    $config['password']
);

$stmt = $pdo->prepare("SELECT * FROM `job`");
$stmt->execute();

$jobs = $stmt->fetchAll();
foreach ($jobs as $job) {
    echo $job['name'];
    echo "<br>";
}