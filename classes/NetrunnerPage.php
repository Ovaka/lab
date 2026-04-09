<?php
require_once 'Page.php';

/**
 * Страница пути Нетраннера — взлом, код, цифровая реальность
 */
class NetrunnerPage extends Page
{
    private string $name = "netrunner";
    
    private string $template = '
    <div class="path-page netrunner-theme">
        <div class="header-glow">
            <h2>🧬 ТЫ ВЫБРАЛ ПУТЬ НЕТРАННЕРА</h2>
            <p class="flavor-text">"Код — это оружие. Сеть — твоё поле боя."</p>
        </div>
        
        <div class="cards-grid">
            <div class="cyber-card">
                <h3>⚡ Быстрый взлом</h3>
                <p>Загрузи вирус "Reaver" в камеру наблюдения и получи доступ к зоне.</p>
                <span class="cooldown">Перезарядка: 8с</span>
            </div>
            <div class="cyber-card">
                <h3>👁️ Сканирование</h3>
                <p>Просканируй врагов: выяви слабые точки в их имплантах.</p>
                <span class="cooldown">Энергия: 35%</span>
            </div>
            <div class="cyber-card">
                <h3>🔐 Взлом протокола</h3>
                <p>Обойди защиту Арасаки и укради зашифрованные данные.</p>
                <span class="cooldown">Сложность: ████████░░ 80%</span>
            </div>
        </div>
        
        <div class="terminal">
            <p><span class="prompt">></span> Подключение к сети... <span class="success">✓</span></p>
            <p><span class="prompt">></span> Обход брандмауэра... <span class="success">✓</span></p>
            <p><span class="prompt">></span> Загрузка модуля... <span class="typing">|</span></p>
        </div>
        
        <a href="?" class="back-link">↩ Вернуться к выбору</a>
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
