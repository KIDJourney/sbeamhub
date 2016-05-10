<?php

use App\Model\Donator;
use App\Model\Liar;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DonatorSeeder extends Seeder
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
                'name' => $faker->name,
                'amount' => $faker->randomFloat()
            ];
        }
        Donator::insert($data);
    }
}
