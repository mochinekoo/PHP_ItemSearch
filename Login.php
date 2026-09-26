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
        <li class="menu_item"><a href="">ログイン</a></li>
    </ul>
</nav>

<form class="form" method="post" action="LoginVerify.php">
    <label>
        メールアドレス：
        <input class="input" type="text" name="LoginMail" required>
    </label>
    <label>
        パスワード：
        <input class="input" type="password" name="LoginPass" required>
    </label>

    <button class="button" name="buttonWord">ログイン</button>
</form>
