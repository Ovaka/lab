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
?>
