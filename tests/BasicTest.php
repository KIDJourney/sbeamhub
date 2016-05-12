<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->visit('/')
             ->see('SteamHub');
    }
}

class AuthTest extends TestCase
{
    /**
     * Register functional test.
     *
     * @return void.
     */
    public function testRegister()
    {
        $this->visit('/register')
             ->type('Rokic_is_weirdo', 'name')
             ->type('kingdeadfish@qq.com', 'email')
             ->type('mypassword', 'password')
             ->type('mypassword', 'password_confirmation')
             ->press('注册')
             ->see('Rokic_is_weirdo');
    }
    
}