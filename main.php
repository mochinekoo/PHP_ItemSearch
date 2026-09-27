<?php

session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>商品検索アプリ</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="menu.css">
</head>

<nav class="menu_bar">
    <!-- <img class="left_item author_image" src="" alt=""> -->
    <ul class="menu_list">
        <li class="menu_item"><a href="Login.php">ログイン</a></li>
    </ul>
</nav>

<div>
    <?php
    if (!isset($_SESSION['TYPE'])) {
        echo "ログインすることで、商品を検索することができます!";
        exit;
    }

    if (isset($_SESSION['GitHubUserName'])) {
        echo $_SESSION['GitHubUserName'] . "さん（Github）ようこそ。";
        echo "<br>";
    }

    if (isset($_SESSION['DiscordUserName'])) {
        echo $_SESSION['DiscordUserName'] . "さん（Discord）ようこそ。";
    }
    ?>
</div>

<form class="form" method="post" action="RunDatabse.php">
    <input class="input" type="text" name="searchWord">
    <button class="button" name="buttonWord">実行</button>
</form>