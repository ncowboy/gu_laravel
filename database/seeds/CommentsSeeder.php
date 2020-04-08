<?php

use Illuminate\Database\Seeder;
use App\models\News;
use App\User;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert($this->getData());
    }

    /**
     * @return array
     */

    private function getData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 500; $i++) {
            $data[] = [
                'author_id' => User::all()->random()->id,
                'article_id' => News::all()->random()->id,
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d'),
                'comment' => $faker->realText(rand(1024, 2048))
            ];
        }
        return $data;
    }
}
