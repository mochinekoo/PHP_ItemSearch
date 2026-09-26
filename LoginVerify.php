<?php

session_start();

$config = require __DIR__ . '/databse.php';

$pdo = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
    $config['user'],
    $config['password']
);

$mail = $_POST['LoginMail'];
$pass = $_POST['LoginPass'];

$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `email` = :mail");
$stmt->execute([':mail' => $mail]);
$user = $stmt->fetch();
var_dump($user);

if ($user && password_verify($pass, $user['password'])) {
    $_SESSION['UserMail'] = $user['email'];
    $_SESSION['UserName'] = $user['name'];
    header('Location: main.php');
    exit;
}
else {
    echo "メールアドレスもしくはパスワードが違います。";
}
