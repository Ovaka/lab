<?php
$filename = 'nonexistent_file.txt';

try {
    // Подавляем стандартное предупреждение fopen с помощью @
    $handle = @fopen($filename, 'r');
    
    if ($handle === false) {
        throw new Exception("Не удалось открыть файл: $filename");
    }
    
    fclose($handle);
} catch (Exception $ex) {
    echo 'Исключение: ' . $ex->getMessage();
}
$a = 100;
$b = 0;

try {
    if ($b == 0) {
        throw new Exception("Ошибка: деление на ноль!");
    }
    $result = $a / $b;
    echo "Результат: $result";
} catch (Exception $ex) {
    $message = date('Y-m-d H:i:s') . " - " . $ex->getMessage() . "\n";
    file_put_contents('log.txt', $message, FILE_APPEND);
    echo '<br>Исключение: ' . $ex->getMessage();
}
$countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
$searchKey = 'Germany';

try {
    if (!array_key_exists($searchKey, $countries)) {
        throw new Exception("Ключ '$searchKey' не найден в массиве");
    }
    echo "Столица: " . $countries[$searchKey];
} catch (Exception $ex) {
    echo '<br>Исключение: ' . $ex->getMessage();
}
$p = mktime(10, 25, 0, 3, 15, 2025);
echo "<br> $p";
$past = mktime(8, 5, 59, 10, 2, 1990);
$now = time();
$difference = $now - $past;
echo "<br>Разница в секундах: $difference";
echo "<p>" . date('Y.m.d H:i:s') . "</p>";
echo "<p>" . date('Y.m.d', mktime(0, 0, 0, 9, 1)) . "</p>";
$daysOfWeek = [
            0 => 'Воскресенье',
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота'
        ];
        $dayNum = date('w', mktime(0, 0, 0, 2, 2, 2000));
        echo "<p>2 февраля 2000 года был: " . $daysOfWeek[$dayNum] . "</p>";
$week = [
            0 => 'Воскресенье',
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота'
        ];
        $today = date('w');
        $birthday = date('w', mktime(0, 0, 0, 6, 12, 2016));
        echo "<p>Сегодня: " . $week[$today] . "</p>";
        echo "<p>12.06.2016 был: " . $week[$birthday] . "</p>";

?>
   <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date1 = $_POST['date1'] ?? '';
            $date2 = $_POST['date2'] ?? '';
            
            if (!empty($date1) && !empty($date2)) {
                $ts1 = strtotime($date1);
                $ts2 = strtotime($date2);
                
                echo '<p class="success">';
                if ($ts1 > $ts2) {
                    echo "Более поздняя дата: $date1";
                } elseif ($ts2 > $ts1) {
                    echo "Более поздняя дата: $date2";
                } else {
                    echo "Даты равны";
                }
                echo '</p>';
            }
        }
        ?>
        <form method="POST">
            <label>Дата 1 (ГГГГ-ММ-ДД): <input type="date" name="date1" required></label><br><br>
            <label>Дата 2 (ГГГГ-ММ-ДД): <input type="date" name="date2" required></label><br><br>
            <input type="submit" value="Сравнить">
        </form>
 <?php
        $inputDate = '2025-12-31';
        $timestamp = strtotime($inputDate);
        $outputDate = date('d-m-Y', $timestamp);
        echo "<p>Исходная: $inputDate <br> Результат: $outputDate</p>";
$dateStr = '2000.02.03';
        // date_create требует формат год-месяц-день (через дефис), заменяем точки
        $normalizedDate = str_replace('.', '-', $dateStr);
        
        $date = date_create($normalizedDate);
        echo "<p>Исходная дата: " . date_format($date, 'd.m.Y') . "</p>";
        
        // Прибавляем: 2 дня + 1 месяц + 3 дня + 1 год = 1 год, 1 месяц, 5 дней
        date_modify($date, '+1 year +1 month +5 days');
        echo "<p>После добавления (1 год, 1 месяц, 5 дней): " . date_format($date, 'd.m.Y') . "</p>";
        
        // Отнимаем 3 дня
        date_modify($date, '-3 days');
        echo "<p>После вычитания 3 дней: " . date_format($date, 'd.m.Y') . "</p>";        
?>
