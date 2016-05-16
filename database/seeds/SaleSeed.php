<?php

use App\Model\Sale;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SaleSeed extends Seeder
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
        foreach (range(1, 100) as $index) {
            $data[] = [
                'app_id' => $faker->name,
                'name' => $faker->name,
                'discount' => rand(10, 100),
                'price' => rand(0, 100)
            ];
        }

        Sale::create($data);
    }
}
