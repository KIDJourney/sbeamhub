<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * visit register page
     *
     * @return void
     */
    public function testPageAvailability()
    {
        $this->visit('/register')
             ->see('注册')
             ->see('邮箱')
             ->see('密码');
    }

    /**
     * register functional test
     *
     * @return void
     */
    public function testRegister()
    {
        $this->visit('/register')
             ->type('Rokic_is_weirdo', 'name')
             ->type('rokic@weirdo.com', 'email')
             ->type('mypassword', 'password')
             ->type('mypassword', 'password_confirmation')
             ->press('注册')
             ->seePageIs('/')
             ->see('Rokic_is_weirdo');
        
        $this->visit('/logout');
    }
    
    public function testNameTooLong()        
    {
        $this->visit('/register')
             ->type('Rokic_is_not_weirdo', 'name')
             ->type('kingdeadfish@qq.com', 'email')
             ->type('mypassword', 'password')
             ->type('mypassword', 'password_confirmation')
             ->press('注册')
             ->seePageIs('/register')
             ->see('昵称过长');
    }
    
    public function testOccupiedEmailAddress()
    {
        $this->visit('/register')
             ->type('Rokic_is_not_weirdo', 'name')
             ->type('kingdeadfish@qq.com', 'email')
             ->type('mypassword', 'password')
             ->type('mypassword', 'password_confirmation')
             ->press('注册')
             ->seePageIs('/register')
             ->see('该邮箱已被占用');
    }
}

class LoginTest extends TestCase
{
    /**
     * visit login page
     *
     * @return void
     */
    public function testPageAvailability()
    {
        $this->visit('/login')
             ->see('登录')
             ->see('邮箱')
             ->see('密码')
             ->see('记住我');
    }
}