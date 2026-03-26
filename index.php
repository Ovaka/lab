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
?>
