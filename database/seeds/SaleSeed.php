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
        foreach (range(1,100) as $index){
            $data[] = [
                'app_id'=>$faker->uuid,
                'name' => $faker->name,
                'discount' => $faker->randomNumber(),
                'price' => $faker->randomNumber()
            ];
        }

        Sale::create($data);
    }
}
