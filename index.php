<?php

class работник
{
    public $name;
    private $age;  // 7. Свойство age делаем скрытым (private)
    public $salary;

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

    // 7-8. Метод setAge с проверкой возраста
    public function setAge($newAge)
    {
        if ($newAge >= 18) {
            $this->age = $newAge;
            echo "Возраст успешно изменён на $newAge лет.\n";
        } else {
            echo "Вам работать в нашей компании еще рано.\n";
        }
    }
}

// Тестирование setAge
$worker = new работник();
$worker->name = "Алексей";
$worker->salary = 45000;

echo "\nТест setAge:\n";
$worker->setAge(17);  // Должно вывести сообщение о раннем возрасте
$worker->setAge(20);  // Должно успешно изменить возраст
echo "Текущий возраст: " . $worker->getAge() . " лет\n";

?>
