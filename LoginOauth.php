<?php

session_start();

$config = require __DIR__ . '/LoginData.php';

$client_id = $config['github_client_id'];
$redirect_url = 'http://localhost:8000/LoginCallback.php';

$params = [
    'client_id' => $client_id,
    'redirect_uri' => $redirect_url,
    'scope' => 'read:user user:email',
    'state' => bin2hex(random_bytes(32))
];

$_SESSION['state'] = $params['state'];

$url = 'http://github.com/login/oauth/authorize?' . http_build_query($params);

header('Location: ' . $url);

exit;