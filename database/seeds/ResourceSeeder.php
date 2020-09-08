<?php

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [
            ['title' => 'https://lenta.ru/rss/news'],
            ['title' => 'https://news.yandex.ru/auto.rss'],
            ['title' => 'https://news.yandex.ru/auto_racing.rss'],
            ['title' => 'https://news.yandex.ru/army.rss'],
            ['title' => 'https://news.yandex.ru/gadgets.rss'],
            ['title' => 'https://news.yandex.ru/index.rss'],
            ['title' => 'https://news.yandex.ru/martial_arts.rss'],
            ['title' => 'https://news.yandex.ru/communal.rss'],
            ['title' => 'https://news.yandex.ru/health.rss'],
            ['title' => 'https://news.yandex.ru/games.rss'],
            ['title' => 'https://news.yandex.ru/internet.rss'],
            ['title' => 'https://news.yandex.ru/cyber_sport.rss'],
            ['title' => 'https://news.yandex.ru/movies.rss'],
            ['title' => 'https://news.yandex.ru/cosmos.rss'],
            ['title' => 'https://news.yandex.ru/culture.rss'],
            ['title' => 'https://news.yandex.ru/championsleague.rss'],
            ['title' => 'https://news.yandex.ru/music.rss'],
            ['title' => 'https://news.yandex.ru/nhl.rss'],

        ];
        return $data;
    }
}
