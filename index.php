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
?>
