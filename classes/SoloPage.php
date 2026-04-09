<?php
require_once 'Page.php';

/**
 * Страница пути Соло — бой, оружие, адреналин
 */
class SoloPage extends Page
{
    private string $name = "solo";
    
    private string $template = '
    <div class="path-page solo-theme">
        <div class="header-glow">
            <h2>🔫 ТЫ ВЫБРАЛ ПУТЬ СОЛО</h2>
            <p class="flavor-text">"Пули говорят громче слов. Действуй."</p>
        </div>
        
        <div class="cards-grid">
            <div class="cyber-card">
                <h3>💥 Штурмовой режим</h3>
                <p>Активируй импланты "Berserk" и сокруши врагов в ближнем бою.</p>
                <span class="stat">Урон: +200%</span>
            </div>
            <div class="cyber-card">
                <h3>🎯 Точный выстрел</h3>
                <p>Замедли время и нанеси критический удар с расстояния.</p>
                <span class="stat">Точность: 98.7%</span>
            </div>
            <div class="cyber-card">
                <h3>🛡️ Тактический щит</h3>
                <p>Разверни энергощит и выдерживай шквальный огонь противника.</p>
                <span class="stat">Защита: █████░░░░░ 50%</span>
            </div>
        </div>
        
        <div class="ammo-counter">
            <p>🔋 Заряд имплантов: <strong>87%</strong></p>
            <p>🩸 Здоровье: <strong>████████░░ 80%</strong></p>
            <p>💀 Устранено целей: <strong>12</strong></p>
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
