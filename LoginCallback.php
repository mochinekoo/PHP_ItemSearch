<?php

session_start();

$config = require __DIR__ . '/LoginData.php';

$ch = curl_init('https://github.com/login/oauth/access_token');

curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
        'client_id' => $config['github_client_id'],
        'client_secret' => $config['github_client_secret'],
        'code' => $_GET['code'],
    ]),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Accept: application/json',
    ],
]);

$response = curl_exec($ch);

$data = json_decode($response, true);

$accessToken = $data['access_token'];

$ch = curl_init('https://api.github.com/user');

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $accessToken,
        'User-Agent: mochinekoophpTest',
    ],
]);

$response = curl_exec($ch);

$user = json_decode($response, true);

$_SESSION['GitHubUserName'] = $user['login'];

if (!isset($user['login'])) {
    echo "問題が発生したよ";
}
else {
    echo $user['login'];
    echo $_SESSION['GitHubUserName'];

    header('Location: main.php');
    exit;
}

//var_dump($user);