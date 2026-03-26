<?php

echo "<h1>Кулаков Денис 9ПО-33к</h1><hr>";

// Задание 1:
echo "<h3>1. array_map: преобразование в верхний регистр</h3>";
$arr1 = ['a', 'b', 'c', 'd', 'e'];
$result1 = array_map('strtoupper', $arr1);
echo "Исходный: " . implode(', ', $arr1) . "<br>";
echo "Результат: " . implode(', ', $result1) . "<br><br>";

// Задание 2: 
echo "<h3>2. count: вывод последнего элемента</h3>";
$arr2 = ['a', 'b', 'c', 'd', 'e'];
$lastElement = $arr2[count($arr2) - 1];
echo "Последний элемент: <b>$lastElement</b><br><br>";

// Задание 3:
echo "<h3>3. array_search: поиск элемента со значением 3</h3>";
$arr3 = [1, 5, 3, 8, 2];
$key = array_search(3, $arr3);
if ($key !== false) {
    echo "Элемент 3 найден: <b>$key</b><br>";
} else {
    echo "Элемент 3 не найден<br>";
}
echo "Массив: [" . implode(', ', $arr3) . "]<br><br>";

// Задание 4:
echo "<h3>4. array_merge: объединение массивов</h3>";
$arr4a = [1, 2, 3];
$arr4b = ['a', 'b', 'c'];
$result4 = array_merge($arr4a, $arr4b);
echo "Массив 1: [" . implode(', ', $arr4a) . "]<br>";
echo "Массив 2: [" . implode(', ', $arr4b) . "]<br>";
echo "Результат: [" . implode(', ', $result4) . "]<br><br>";

// Задание 5:
echo "<h3>5. array_slice: срез массива [2, 3, 4]</h3>";
$arr5 = [1, 2, 3, 4, 5];
$result5 = array_slice($arr5, 1, 3); // индекс 1, длина 3
echo "Исходный: [" . implode(', ', $arr5) . "]<br>";
echo "Результат: [" . implode(', ', $result5) . "]<br><br>";

// Задание 6:
echo "<h3>6. array_keys / array_values: разделение ключей и значений</h3>";
$arr6 = ['a' => 1, 'b' => 2, 'c' => 3];
$keys = array_keys($arr6);
$values = array_values($arr6);
echo "Исходный: [";
foreach($arr6 as $k => $v) echo "'$k'=>$v, ";
echo "]<br>";
echo "Ключи (\$keys): [" . implode(', ', $keys) . "]<br>";
echo "Значения (\$values): [" . implode(', ', $values) . "]<br><br>";

// Задание 7:
echo "<h3>7. array_combine: создание ассоциативного массива</h3>";
$keys7 = ['a', 'b', 'c'];
$values7 = [1, 2, 3];
$result7 = array_combine($keys7, $values7);
echo "Ключи: [" . implode(', ', $keys7) . "]<br>";
echo "Значения: [" . implode(', ', $values7) . "]<br>";
echo "Результат: [";
foreach($result7 as $k => $v) echo "'$k'=>$v, ";
echo "]<br><br>";

// Задание 8:
echo "<h3>8. array_search: поиск первого элемента '-'</h3>";
$arr8 = ['a', '-', 'b', '-', 'c', '-', 'd'];
$position = array_search('-', $arr8);
echo "Массив: ['" . implode("', '", $arr8) . "']<br>";
echo "Позиция первого '-': <b>$position</b><br><br>";

// Задание 9:
echo "<h3>9. Сортировки массива</h3>";
$arr9 = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];

echo "Исходный: [";
foreach($arr9 as $k => $v) echo "'$k'=>'$v', ";
echo "]<br>";

$arr_asort = $arr9;
asort($arr_asort);
echo "asort (по значениям): [";
foreach($arr_asort as $k => $v) echo "'$k'=>'$v', ";
echo "]<br>";

$arr_ksort = $arr9;
ksort($arr_ksort);
echo "ksort (по ключам): [";
foreach($arr_ksort as $k => $v) echo "'$k'=>'$v', ";
echo "]<br>";

$arr_arsort = $arr9;
arsort($arr_arsort);
echo "arsort (обратно по значениям): [";
foreach($arr_arsort as $k => $v) echo "'$k'=>'$v', ";
echo "]<br><br>";

// Задание 10:
echo "<h3>10. array_sum + str_split: сумма цифр строки</h3>";
$str10 = '1234567890';
$arr10 = str_split($str10);
$sum10 = array_sum($arr10);
echo "Строка: '$str10'<br>";
echo "Массив цифр: [" . implode(', ', $arr10) . "]<br>";
echo "Сумма: <b>$sum10</b><br><br>";

// Задание 11:
echo "<h3>11. array_fill: 10 букв 'x'</h3>";
$arr11 = array_fill(0, 10, 'x');
echo "Результат: [" . implode(', ', $arr11) . "]<br><br>";

// Задание 12:
echo "<h3>12. array_intersect: общие элементы двух массивов</h3>";
$arr12a = [1, 2, 3, 4, 5];
$arr12b = [3, 4, 5, 6, 7];
$result12 = array_values(array_intersect($arr12a, $arr12b));
echo "Массив 1: [" . implode(', ', $arr12a) . "]<br>";
echo "Массив 2: [" . implode(', ', $arr12b) . "]<br>";
echo "Общие элементы: [" . implode(', ', $result12) . "]<br><br>";

?>
