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
            ->insert($this->generateData());
    }

    protected function generateData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->realText(rand(10, 16)),
                'description' => $faker->realText(1000),
                'active' => $faker->boolean(),
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d'),
            ];
        }
        return $data;
    }
}
