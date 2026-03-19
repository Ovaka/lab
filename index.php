<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Регистрация пользователя</h2>
        <form action="action.php" method="post" class="registration-form">
            
            <label for="name">Имя *</label>
            <input type="text" id="name" name="name" placeholder="Введите ваше имя" required>
            
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="example@mail.com" required>
            
            <label for="password">Пароль *</label>
            <input type="password" id="password" name="password" placeholder="Минимум 6 символов" required minlength="6">
            
            <label for="confirm_password">Подтвердите пароль *</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Повторите пароль" required>
            
            
            
            <label>Пол *</label>
            <select name="gender" id="gender" required>
                <option value="" disabled selected>Выберите пол</option>
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
                <option value="other">Другой</option>
                <option value="prefer_not_to_say">Предпочитаю не указывать</option>
            </select>
            
            <label class="checkbox-label">
                <input type="checkbox" name="agree" required>
                Я согласен с <a href="#">условиями обработки данных</a> *
            </label>
            
            <button type="submit" class="btn-submit">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>
