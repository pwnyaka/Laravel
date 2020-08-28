<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Приветствуем Вас на нашем новостном портале');
        });
    }
    public function testCreateNews() {
        $this->browse(function (Browser $browser) {
           $browser->visit('/admin/news/create')
               ->press('Добавить новость')
               ->assertSee('Поле Заголовок новости обязательно для заполнения.');
        });
    }

    public function testCreateCategory() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->press('Добавить категорию')
                ->assertSee('Поле Название категории обязательно для заполнения.');
        });
    }
}
