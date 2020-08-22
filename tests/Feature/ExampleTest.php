<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200)->assertSee('Приветствуем Вас');
    }
    public function testNewsTest()
    {
        $response = $this->get('/news');

        $response->assertStatus(200)->assertSee('Новости')->assertViewIs('news.index');
    }

}
