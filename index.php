<?php

class работник
{
    // Свойства класса
    public $name;
    public $age;
    public $salary;

    // 3. Метод getName()
    public function getName()
    {
        return $this->name;
    }

    // 4. Метод getAge()
    public function getAge()
    {
        return $this->age;
    }

    // 5. Метод getSalary()
    public function getSalary()
    {
        return $this->salary;
    }

    // 6. Статический метод для суммы зарплат
    public static function getTotalSalary($workers)
    {
        $sum = 0;
        foreach ($workers as $worker) {
            $sum += $worker->getSalary();
        }
        return $sum;
    }

    // Статический метод для суммы возрастов
    public static function getTotalAge($workers)
    {
        $sum = 0;
        foreach ($workers as $worker) {
            $sum += $worker->getAge();
        }
        return $sum;
    }
}

// 1. Создание 2 объектов класса работник
$worker1 = new работник();
$worker1->name = "Иван Петров";
$worker1->age = 25;
$worker1->salary = 50000;

$worker2 = new работник();
$worker2->name = "Мария Сидорова";
$worker2->age = 30;
$worker2->salary = 65000;

// 2. Вывод суммы зарплат и суммы возрастов
$workers = [$worker1, $worker2];
echo "Сумма зарплат: " . работник::getTotalSalary($workers) . " руб.\n";
echo "Сумма возрастов: " . работник::getTotalAge($workers) . " лет\n";

// 5. Вывод работы методов getName, getAge, getSalary
echo "\nИнформация о работниках:\n";
echo "Работник 1: " . $worker1->getName() . ", Возраст: " . $worker1->getAge() . ", Зарплата: " . $worker1->getSalary() . " руб.\n";
echo "Работник 2: " . $worker2->getName() . ", Возраст: " . $worker2->getAge() . ", Зарплата: " . $worker2->getSalary() . " руб.\n";

?>
