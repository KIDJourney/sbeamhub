<?php

use App\Model\Liar;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LiarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $data = [];

        for ($i = 0 ; $i < 100 ; $i++){
            $data[] = [
                'tiebaid' => $faker->name,
                'steamnick' => $faker->userName,
                'steamid' => $faker->uuid,
                'taobaoid' => $faker->userName,
                'alipayaccount' => $faker->email,
                'editor' => 1,
                'reason' => $faker->sentence()
            ];
        }

        Liar::insert($data);
    }
}
