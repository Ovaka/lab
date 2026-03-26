<?php
$file = fopen("test.txt", "w");
fwrite($file, "Привет, мир!");
fclose($file);
echo "Файл test.txt создан и записан.<br>";
$file = fopen("test.txt", "r");
while (!feof($file)) {
    echo fgets($file, 1024) . "<br />";
}
fclose($file);
rename("test.txt", "mir.txt") or die("Ошибка переименования файла");
echo "Файл переименован в mir.txt<br>";
// Создаём папку
if (!file_exists("folder")) {
    mkdir("folder", 0775, true);
    echo "Папка 'folder' создана.<br>";
}

// Перемещаем файл
rename("mir.txt", "folder/mir.txt") or die("Ошибка перемещения файла");
echo "Файл mir.txt перемещён в папку folder/<br>";
$file = "folder/mir.txt";
$newfile = "folder/world.txt";

if (!copy($file, $newfile)) {
    echo "Не удалось скопировать $file...<br>";
} else {
    echo "Содержимое mir.txt скопировано в файл world.txt<br>";
}
$file = "folder/world.txt";

if (file_exists($file)) {
    $size_bytes = filesize($file);
    $size_kb = round($size_bytes / 1024, 2);
    $size_mb = round($size_bytes / (1024 * 1024), 2);
    $size_gb = round($size_bytes / (1024 * 1024 * 1024), 2);
    
    echo "Размер файла world.txt:<br>";
    echo "• В байтах: $size_bytes байт<br>";
    echo "• В килобайтах: $size_kb КБ<br>";
    echo "• В мегабайтах: $size_mb МБ<br>";
    echo "• В гигабайтах: $size_gb ГБ<br>";
} else {
    echo "Файл не найден.<br>";
}
$file = "folder/world.txt";

if (file_exists($file)) {
    unlink($file);
    echo "Файл world.txt удалён.<br>";
} else {
    echo "Файл не найден.<br>";
}
$files = ["folder/world.txt", "folder/mir.txt"];

foreach ($files as $filename) {
    if (file_exists($filename)) {
        echo "Файл $filename существует.<br>";
    } else {
        echo "Файл $filename НЕ существует.<br>";
    }
}
?>
