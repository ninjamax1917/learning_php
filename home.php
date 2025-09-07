<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once __DIR__ . '/vite.php'; ?>
    <?php echo vite_tags('src/main.js'); ?>
</head>

<body>
    <h1 class="text-3xl text-gray-300 font-bold">Добро пожаловать на главную страницу!</h1>
    <a style="text-decoration: none" href="about.php">На страницу about.php</a>
    <?php define("TITLE", "Главная страница"); ?>
</body>

</html>