<?php
    session_start();
    session_destroy();
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

<div>ログアウトしています。</div>

<script>
    setTimeout(
        function() {
            location.href = "main.php";
        }, 5000
    );
</script>
