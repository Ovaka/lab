<?php

class работник
{
    public $name;
    private $age;
    public $salary;

    // Конструктор для удобства
    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    // 10. Приватный метод checkAge
    private function checkAge($newAge)
    {
        if ($newAge >= 18) {
            $this->age = $newAge;
            return true;
        } else {
            echo "Вам работать в нашей компании еще рано.\n";
            return false;
        }
    }

    // 10. Публичный метод setAge, использующий checkAge
    public function setAge($newAge)
    {
        return $this->checkAge($newAge);
    }

    // 9. Публичный метод checkAge для внешней проверки (отдельный метод)
    public function isAdult()
    {
        return $this->age >= 18;
    }
}

// Тестирование
echo "\nТестирование финальной версии класса \n";

$worker1 = new работник("Дмитрий", 22, 55000);
$worker2 = new работник("Ольга", 17, 40000);

// 9. Проверка метода isAdult (checkAge для внешнего использования)
echo "\nПроверка совершеннолетия:\n";
echo $worker1->getName() . ": " . ($worker1->isAdult() ? "Совершеннолетний ✓" : "Несовершеннолетний ✗") . "\n";
echo $worker2->getName() . ": " . ($worker2->isAdult() ? "Совершеннолетний ✓" : "Несовершеннолетний ✗") . "\n";

// 10. Тест setAge с приватной проверкой
echo "\nТест setAge с проверкой:\n";
echo "Попытка установить возраст 16 для " . $worker2->getName() . ":\n";
$worker2->setAge(16);

echo "Попытка установить возраст 19 для " . $worker2->getName() . ":\n";
$worker2->setAge(19);
echo "Новый возраст: " . $worker2->getAge() . " лет\n";

// Подсчёт сумм
$workers = [$worker1, $worker2];
$totalSalary = array_sum(array_map(fn($w) => $w->getSalary(), $workers));
$totalAge = array_sum(array_map(fn($w) => $w->getAge(), $workers));

echo "\nИтоговая информация:\n";
echo "Сумма зарплат: $totalSalary руб.\n";
echo "Сумма возрастов: $totalAge лет\n";

?>
