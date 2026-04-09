<?php
// Автозагрузка классов
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Санитизация входного параметра
function getSafePath(): string
{
    $allowed = ['netrunner', 'solo'];
    $input = $_GET['path'] ?? '';
    return in_array($input, $allowed, true) ? $input : '';
}

$currentPath = getSafePath();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberPunk 2077 • Выбор Пути</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="<?= $currentPath ? $currentPath . '-active' : 'home' ?>">
    
    <header class="main-header">
        <h1> CYBERPUNK 2077</h1>
        <p class="tagline">Лабораторная работа №14 • Метод GET • ООП в PHP</p>
    </header>

    <main class="content">
        <?php
        // Фабрика страниц на основе $_GET['path']
        if ($currentPath === 'netrunner') {
            $page = new NetrunnerPage();
        } elseif ($currentPath === 'solo') {
            $page = new SoloPage();
        } else {
            $page = new Page();
        }
        
        $page->render();
        ?>
    </main>

    <footer>
        <p>🔐 <code>$_GET['path'] = "<?= htmlspecialchars($currentPath ?: 'empty') ?>"</code> • 
           Класс: <code><?= get_class($page) ?></code></p>
        <p style="opacity: 0.6; font-size: 0.9em;">Wake up, Samurai. We have code to write.</p>
    </footer>

</body>
</html>
