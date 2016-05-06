<?php

use App\Model\Admin;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
           'name'=>'KIDJourney',
            'email'=>'kingdeadfish@qq.com',
            'password'=>'testpassword'
        ]);
    }
}
