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
        for($i = 0 ; $i < 100 ; $i ++){
            $liar = new Liar();
            $liar->steamid = $faker->uuid;
            $liar->tiebaid = $faker->name;
            $liar->steamnick = $faker->userName;
            $liar->taobaoid = $faker->userName;
            $liar->alipayaccount = $faker->email;
            $liar->editor = 1;
            $liar->reason = $faker->sentence;
            $liar->save();
        }
    }
}
