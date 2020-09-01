<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [];

        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 8; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10,30)),
                'text' => $faker->realText(rand(1000, 3000)),
                'isPrivate' => (bool)rand(0, 1),
                'category_id' => random_int(1, 3),
            ];
        }

        return $data;
    }
}
