<?php
// Подключение классов
require_once 'classes/Page.php';
require_once 'classes/BlogPage.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CyberPunk 2077 • Lab 14</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1> CYBERPUNK 2077 • LAB 14</h1>
    
    <!-- Навигация с GET-параметрами -->
    <nav>
        <a href="?page=page"> Главная</a>
        <a href="?page=blog"> Блог</a>
        <a href="?"> О проекте</a>
    </nav>

    <hr style="border-color: #00f3ff;">

    <?php
    /**
     * Маршрутизация на основе $_GET['page']
     * С проверкой существования параметра через isset()
     */
    $currentPageName = isset($_GET['page']) ? $_GET['page'] : 'page';

    // Фабрика страниц
    if ($currentPageName === 'blog') {
        $currentPage = new BlogPage();
    } else {
        $currentPage = new Page();
    }

    // Рендеринг выбранной страницы
    $currentPage->render();
    ?>

    <footer style="margin-top: 30px; font-size: 0.9em; opacity: 0.7;">
        <p>Lab 14: GET-запросы • Модификаторы доступа • Типизация в PHP</p>
    </footer>
</body>
</html>
