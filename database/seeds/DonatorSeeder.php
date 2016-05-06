<?php

use App\Model\Donator;
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
        foreach (range(1, 100) as $index) {
            Donator::create([
                'name' => $faker->name,
                'amount' => $faker->randomFloat()
            ]);
        }
    }
}
