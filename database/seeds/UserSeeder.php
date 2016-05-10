<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Admin
        $faker = Faker::create();
        User::create([
            'name' => 'KIDJourney',
            'email' => 'kingdeadfish@qq.com',
            'password' => bcrypt('testpassword'),
            'is_admin' => '1'
        ]);

        $data = [];
        for ($i = 0 ; $i < 100 ; $i ++){
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'is_admin' => '0'
            ];
        }

        User::insert($data);
    }
}
