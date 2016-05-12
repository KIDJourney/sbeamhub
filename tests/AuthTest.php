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
    public function visitRegisterPage()
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
    public function tryRegister()
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

class LoginTest extends TestCase
{
    /**
     * visit login page
     *
     * @return void
     */
    public function visitLoginPage()
    {
        $this->visit('/login')
             ->see('登录')
             ->see('邮箱')
             ->see('密码')
             ->see('记住我');
    }
}