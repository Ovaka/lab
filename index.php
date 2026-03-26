<?php
// ЛАБОРАТОРНАЯ РАБОТА 11

// ЧАСТЬ 1

// 1. Создание и запись в файл
$file = fopen("test.txt", "w");
fwrite($file, "Привет, мир!");
fclose($file);

// 2. Чтение из файла
echo "<h3>Чтение из файла:</h3>";
$file = fopen("test.txt", "r");
while (!feof($file)) {
    echo fgets($file, 1024) . "<br />";
}
fclose($file);

// 3. Переименование
rename("test.txt", "mir.txt");

// 4. Создание папки и перемещение файла
if (!file_exists("folder")) {
    mkdir("folder", 0775, true);
}
rename("mir.txt", "folder/mir.txt");

// 5. Копирование файла
copy("folder/mir.txt", "folder/world.txt");

// 6. Размер файла в разных единицах
$size = filesize("folder/world.txt");
echo "<h3>Размер world.txt:</h3>";
echo "Байты: $size<br>";
echo "МБ: " . round($size / (1024*1024), 2) . "<br>";
echo "ГБ: " . round($size / (1024*1024*1024), 2) . "<br>";

// 7. Удаление файла
unlink("folder/world.txt");

// 8. Проверка существования файлов
echo "<h3>Проверка файлов:</h3>";
echo "world.txt: " . (file_exists("folder/world.txt") ? "существует" : "не существует") . "<br>";
echo "mir.txt: " . (file_exists("folder/mir.txt") ? "существует" : "не существует") . "<br>";

// ЧАСТЬ 2

// 1. Создание папки
mkdir("test", 0775, true);

// 2. Переименование папки
rename("test", "www");

// 3. Удаление папки (если пуста)
if (count(scandir("www")) == 2) {
    rmdir("www");
}

// 4. Создание папок из массива
$dirs = ["docs", "img", "js"];
mkdir("test", 0775, true);
foreach ($dirs as $d) {
    mkdir("test/$d", 0775, true);
}

// 5. Поиск JPG-файлов
echo "<h3>JPG-файлы:</h3>";
foreach (glob("*.jpg") as $jpg) {
    echo basename($jpg) . " (" . filesize($jpg) . " байт)<br>";
}

?>
