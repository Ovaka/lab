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
?>
