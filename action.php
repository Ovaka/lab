<?php
// action.php

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Функция для безопасного вывода
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

$errors = [];
$old_input = $_POST; // Сохраняем введенные данные, чтобы вернуть их в форму

// --- ВАЛИДАЦИЯ ---

// 1. Проверка Email
if (empty($old_input['email']) || !filter_var($old_input['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Пожалуйста, введите корректный email адрес.';
}

// 2. Проверка Пароля (самое важное для вашего задания)
if (empty($old_input['password'])) {
    $errors[] = 'Пароль не может быть пустым.';
} elseif (strlen($old_input['password']) < 6) {
    $errors[] = 'Пароль должен содержать минимум 6 символов.';
}

// 3. Совпадение паролей
if (!empty($old_input['password']) && !empty($old_input['confirm_password'])) {
    if ($old_input['password'] !== $old_input['confirm_password']) {
        $errors[] = 'Пароли не совпадают.';
    }
}

// 4. Согласие
if (empty($old_input['agree'])) {
    $errors[] = 'Необходимо согласиться с условиями.';
}

// --- ЛОГИКА ОТОВРАЖЕНИЯ ---

if (!empty($errors)) {
    // Если есть ошибки, мы НЕ показываем страницу успеха.
    // Мы передаем ошибки и старые данные в index.php через переменные.
    // Для этого просто подключаем index.php в конце этого скрипта.
    
    $registration_error_message = implode("<br>", $errors);
    $show_calculator_instead = true; // Флаг, чтобы показать калькулятор вместо формы регистрации
    
    // Подключаем index.php, передавая ему контекст ошибок
    include 'index.php';
    exit; // Завершаем скрипт после подключения
}

// --- ЕСЛИ ВСЕ ХОРОШО ---
// Здесь код успешной регистрации (как было раньше)
$name = sanitize($old_input['name']);
$email = sanitize($old_input['email']);
$gender = sanitize($old_input['gender'] ?? 'не указан');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Успех</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .success-box { text-align: center; padding: 30px; }
        .success-icon { font-size: 60px; color: #4caf50; margin-bottom: 20px; }
        .back-link { display: inline-block; margin-top: 20px; color: #667eea; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-box">
            <div class="success-icon">✓</div>
            <h2>Регистрация успешна!</h2>
            <p>Здравствуйте, <strong><?= $name ?></strong>!</p>
            <p>Email: <?= $email ?></p>
            <a href="index.php" class="back-link">← На главную</a>
        </div>
    </div>
</body>
</html>
