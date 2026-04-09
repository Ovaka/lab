<?php
/**
 * Базовый класс страницы в мире CyberPunk 2077
 */
class Page
{
    private string $name = "home";
    private string $template = '
    <div class="choice-container">
        <h2 class="glitch" data-text="ВЫБЕРИ СВОЙ ПУТЬ, ЧУМБА">ВЫБЕРИ СВОЙ ПУТЬ, ЧУМБА</h2>
        <p class="subtitle">Найт-Сити не прощает ошибок. Твой выбор определит всё.</p>
        
        <div class="paths">
            <a href="?path=netrunner" class="path-btn netrunner">
                <span class="icon">🧬</span>
                <strong>ВЗЛОМАТЬ СЕТЬ</strong>
                <em>Путь Нетраннера</em>
                <small>Проникни в систему, стань призраком</small>
            </a>
            
            <a href="?path=solo" class="path-btn solo">
                <span class="icon">🔫</span>
                <strong>ПРОЛОЖИТЬ СИЛОЙ</strong>
                <em>Путь Соло</em>
                <small>Оружие, адреналин, чистая мощь</small>
            </a>
        </div>
    </div>';

    public function render(): void
    {
        echo $this->template;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
