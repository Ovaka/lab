<?php
// Проверяем, что форма отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Функция для безопасного вывода
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Собираем ошибки
$errors = [];

// Валидация email
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Пожалуйста, введите корректный email адрес.';
}

// Валидация пароля
if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
    $errors[] = 'Пароль должен содержать минимум 6 символов.';
}

// Проверка совпадения паролей
if ($_POST['password'] !== $_POST['confirm_password']) {
    $errors[] = 'Пароли не совпадают.';
}

// Проверка согласия с условиями
if (empty($_POST['agree'])) {
    $errors[] = 'Необходимо согласиться с условиями обработки данных.';
}

// Если есть ошибки — показываем их
if (!empty($errors)) {
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Ошибка регистрации</title>
        <link rel="stylesheet" href="style.css">
        <style>
            .error-box {
                background: #ffebee;
                border-left: 4px solid #f44336;
                padding: 15px;
                margin: 20px 0;
                border-radius: 4px;
            }
            .error-box ul {
                margin: 10px 0 0 20px;
                color: #c62828;
            }
            .back-link {
                display: inline-block;
                margin-top: 20px;
                color: #667eea;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>⚠️ Ошибка регистрации</h2>
            <div class="error-box">
                <strong>Исправьте следующие ошибки:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= sanitize($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="index.php" class="back-link">← Вернуться к форме</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Если всё хорошо — "успешная регистрация"
$name = sanitize($_POST['name']);
$email = sanitize($_POST['email']);
$gender = sanitize($_POST['gender'] ?? 'не указан');

// Здесь обычно: сохранение в БД, отправка письма и т.д.

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Успешная регистрация</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .success-box {
            text-align: center;
            padding: 30px;
        }
        .success-icon {
            font-size: 60px;
            color: #4caf50;
            margin-bottom: 20px;
        }
        .user-info {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-box">
            <div class="success-icon">✓</div>
            <h2>Регистрация успешна!</h2>
            <p>Здравствуйте, <strong><?= $name ?></strong>!</p>
            
            <div class="user-info">
                <p><strong>Email:</strong> <?= $email ?></p>
                <p><strong>Пол:</strong> <?= $gender ?></p>
            </div>
            
            <p>Ваши данные успешно сохранены.</p>
            <a href="index.php" class="back-link">← На главную</a>
        </div>
    </div>
</body>
</html>
<?php
// Важно: после POST-обработки не остаёмся на action.php,
// чтобы при обновлении страницы форма не отправилась повторно
?>
