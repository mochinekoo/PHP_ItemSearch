<?php

session_start();

if (isset($_POST['githubButton'])) {
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

    $_SESSION['TYPE'] = "Github";

    header('Location: ' . $url);

    exit;
}
else if (isset($_POST['discordButton'])) {
    $client_id = '1437428309364445244';
    $redirect_url = 'http://localhost:8000/LoginCallback.php';

    $params = [
        'client_id' => $client_id,
        'response_type' => 'code',
        'redirect_uri' => $redirect_url,
        'scope' => 'identify email'
    ];

    $_SESSION['TYPE'] = "Discord";

    $url = 'https://discord.com/oauth2/authorize?' . http_build_query($params);

    header('Location: ' . $url);

    exit;
}
else {
    echo "未対応のログインです。";
}