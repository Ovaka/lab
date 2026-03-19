<?php
// Получаем переменные из action.php, если они были переданы при ошибке
$error_msg = $registration_error_message ?? null;
$force_show_calculator = $show_calculator_instead ?? false;
$old = $old_input ?? []; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Формы и Калькулятор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        
        <!-- СЕКЦИЯ РЕГИСТРАЦИИ -->
        <!-- Если есть ошибка и флаг установлен, скрываем эту секцию через CSS класс или JS, 
             но проще сделать условие PHP, чтобы не рендерить форму, либо показать ошибку над калькулятором -->
        
        <?php if (!$force_show_calculator): ?>
            <section class="form-section">
                <h2>Регистрация пользователя</h2>
                
                <?php if ($error_msg): ?>
                    <div class="error-banner">
                        ⚠️ <?= $error_msg ?>
                    </div>
                <?php endif; ?>

                <form action="action.php" method="post" class="registration-form">
                    <label for="name">Имя *</label>
                    <input type="text" id="name" name="name" value="<?= $old['name'] ?? '' ?>" required>
                    
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="<?= $old['email'] ?? '' ?>" required>
                    
                    <label for="password">Пароль *</label>
                    <input type="password" id="password" name="password" required>
                    
                    <label for="confirm_password">Подтвердите пароль *</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    
                    <label for="phone">Телефон</label>
                    <input type="tel" id="phone" name="phone" value="<?= $old['phone'] ?? '' ?>">
                    
                    <label>Пол *</label>
                    <select name="gender" required>
                        <option value="" disabled <?= empty($old['gender']) ? 'selected' : '' ?>>Выберите пол</option>
                        <option value="male" <?= ($old['gender'] ?? '') == 'male' ? 'selected' : '' ?>>Мужской</option>
                        <option value="female" <?= ($old['gender'] ?? '') == 'female' ? 'selected' : '' ?>>Женский</option>
                        <option value="other" <?= ($old['gender'] ?? '') == 'other' ? 'selected' : '' ?>>Другой</option>
                    </select>
                    
                    <label class="checkbox-label">
                        <input type="checkbox" name="agree" <?= !empty($old['agree']) ? 'checked' : '' ?>>
                        Я согласен с условиями *
                    </label>
                    
                    <button type="submit" class="btn-submit">Зарегистрироваться</button>
                </form>
            </section>
        <?php else: ?>
            <!-- Если произошла ошибка, показываем сообщение и кнопку перехода к калькулятору -->
            <section class="error-redirect-section">
                <div class="error-banner-large">
                    <h3>⛔ Ошибка регистрации</h3>
                    <p><?= $error_msg ?></p>
                    <p style="margin-top:15px; font-size: 0.9em; color: #666;">
                        Пока вы исправляете данные, попробуйте решить задачу на калькуляторе:
                    </p>
                    <button onclick="document.getElementById('calculator-block').scrollIntoView({behavior: 'smooth'})" class="btn-op" style="margin-top:10px; width:auto; display:inline-block;">
                        Перейти к калькулятору ↓
                    </button>
                    <br>
                    <a href="index.php" style="display:block; margin-top:10px; font-size:14px;">Вернуться к форме регистрации</a>
                </div>
            </section>
        <?php endif; ?>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">

        <!-- СЕКЦИЯ КАЛЬКУЛЯТОРА (ID для скролла) -->
        <section id="calculator-block" class="calculator-section">
            <h2>🧮 Калькулятор</h2>
            
            <?php
            // Логика калькулятора (остается внутри index.php, так как форма ведет на себя)
            $calc_result = null;
            $calc_error = null;

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operation'])) {
                $n1 = floatval($_POST['num1'] ?? 0);
                $n2 = floatval($_POST['num2'] ?? 0);
                $op = $_POST['operation'];

                switch ($op) {
                    case 'add': $calc_result = $n1 + $n2; break;
                    case 'subtract': $calc_result = $n1 - $n2; break;
                    case 'multiply': $calc_result = $n1 * $n2; break;
                    case 'divide':
                        if ($n2 == 0) {
                            $calc_error = '❌ Деление на ноль невозможно!';
                        } else {
                            $calc_result = $n1 / $n2;
                        }
                        break;
                }
            }
            ?>

            <form action="index.php" method="post" class="calculator-form">
                <label for="num1">Первое число</label>
                <input type="number" id="num1" name="num1" step="any" value="<?= $calc_result !== null || $calc_error ? ($_POST['num1']??'') : '' ?>" required>
                
                <label for="num2">Второе число</label>
                <input type="number" id="num2" name="num2" step="any" value="<?= $calc_result !== null || $calc_error ? ($_POST['num2']??'') : '' ?>" required>
                
                <div class="buttons">
                    <button type="submit" name="operation" value="add" class="btn-op">+</button>
                    <button type="submit" name="operation" value="subtract" class="btn-op">−</button>
                    <button type="submit" name="operation" value="multiply" class="btn-op">×</button>
                    <button type="submit" name="operation" value="divide" class="btn-op">÷</button>
                </div>
            </form>

            <?php if ($calc_error): ?>
                <div class="result error"><?= $calc_error ?></div>
            <?php elseif ($calc_result !== null): ?>
                <div class="result success">
                    <strong>Результат:</strong> <?= $calc_result ?>
                </div>
            <?php endif; ?>
        </section>

    </div>
</body>
</html>
