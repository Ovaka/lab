<?php
/**
 * Базовый класс страницы в стиле CyberPunk 2077
 */
class Page
{
    private string $name = "page";
    private string $template = "<div class='default-page'><p>Добро пожаловать в Найт-Сити, чоомба!</p></div>";

    /**
     * Выводит содержимое шаблона страницы
     */
    public function render(): void
    {
        echo $this->template;
    }

    /**
     * Геттер для имени страницы (для отладки/расширения)
     */
    public function getName(): string
    {
        return $this->name;
    }
}
