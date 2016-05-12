<?php

use App\Model\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{

    use DatabaseTransactions;

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
             ->type('kingfish@qq.com', 'email')
             ->type('mypassword', 'password')
             ->type('mypassword', 'password_confirmation')
             ->press('注册')
             ->seePageIs('/register')
             ->see('昵称不能超过16个字');
    }
    
    public function testOccupiedEmailAddress()
    {
        User::insert([
            'name' => 'TempUser',
            'email'=> 'rokic@weirdo.com',
            'password' => 'test'
        ]);
        $this->visit('/register')
             ->type('Rokic_the_weirdo', 'name')
             ->type('rokic@weirdo.com', 'email')
             ->type('mypassword', 'password')
             ->type('mypassword', 'password_confirmation')
             ->press('注册')
             ->seePageIs('/register')
             ->see('邮箱已经被人使用了');
    }

    public function testSameNickName()
    {
        User::insert([
            'name' => 'Rokic_is_weirdo',
            'email'=> 'TestMail@mail.com',
            'password' => 'test'
        ]);
        $this->visit('/register')
            ->type('Rokic_is_weirdo', 'name')
            ->type('rokic_is_rich@weirdo.com', 'email')
            ->type('mypassword', 'password')
            ->type('mypassword', 'password_confirmation')
            ->press('注册')
            ->seePageIs('/register')
            ->see('昵称已经被别人使用了');
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