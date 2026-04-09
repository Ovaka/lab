<?php
require_once 'Page.php';

/**
 * Страница блога с карточками в тематике CyberPunk 2077
 */
class BlogPage extends Page
{
    private string $name = "blog";
    
    private string $template = '
    <div class="cyberpunk-blog">
        <div class="card neon-border">
            <h3> Гайд: Нетраннер для новичков</h3>
            <p>Освой базовые протоколы взлома и стань легендой в сети.</p>
            <span class="tag">HACKING</span>
        </div>
        <div class="card neon-border">
            <h3> Модификации оружия</h3>
            <p>Топ-5 апгрейдов для твоего арсенала от Миля-Теха.</p>
            <span class="tag">COMBAT</span>
        </div>
        <div class="card neon-border">
            <h3> Секреты корпораций</h3>
            <p>Что скрывает Арасака за своими неоновыми фасадами?</p>
            <span class="tag">LORE</span>
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
