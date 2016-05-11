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
