<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')
            ->insert($this->getData());
    }

    protected function getData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        return [
            0 => [
                'name' => 'Главные новости',
                'description' => $faker->realText(64),
                'active' => true,
                'main' => true,
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d')
            ],
            1 => [
                'name' => 'Политика',
                'description' => $faker->realText(64),
                'active' => true,
                'main' => false,
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d')
            ],
            2 => [
                'name' => 'Спорт',
                'description' => $faker->realText(64),
                'active' => true,
                'main' => false,
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d')
            ],
            3 => [
                'name' => 'Культура',
                'description' => $faker->realText(64),
                'active' => true,
                'main' => false,
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d')
            ],

        ];
    }
}
