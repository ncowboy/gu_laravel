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

    /**
     * @return array
     */

    private function getData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 24)),
                'author_id' => \App\User::all()->random()->id,
                'category_id' => $faker->numberBetween(10, 20),
                'text_short' => $faker->realText(rand(128, 1024)),
                'text_full' => $faker->realText(rand(2048, 5120)),
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d'),
            ];
        }
        return $data;

    }
}
