<?php

namespace Tests\Unit;

use App\News;
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
        $this->assertTrue(true);
        $this->assertIsArray(News::getNews());
        $this->assertIsArray(News::getNewsByCategoryName('sport'));
    }
}
