<head>
    <meta charset="UTF-8">
    <title>商品検索アプリ</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="menu.css">
</head>

<nav class="menu_bar">
    <!-- <img class="left_item author_image" src="" alt=""> -->
    <ul class="menu_list">

    </ul>
</nav>

<?php
$config = require __DIR__ . '/databse.php';
$pdo = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
    $config['user'],
    $config['password']
);

$stmt = $pdo->prepare("SELECT * FROM `job` where name =" . "'" . $_POST['searchWord'] . "'");
$stmt->execute();

$jobs = $stmt->fetchAll();

if (count($jobs) == 0) {
    echo "空です。";
    echo "<br>";
}
else {
    foreach ($jobs as $job) {
        echo $job['name'];
        echo "<br>";
    }
}


?>
