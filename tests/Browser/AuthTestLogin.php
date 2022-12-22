<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTestLogin extends DuskTestCase
{

    /** 
     * @test 
     */
    public function a_user_can_login_correctly()
    {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
        ->clickLink('Login')
        ->type('email', 'admin@tcrmbo.nl')
        ->type('password', 'test1234')
        ->click('button[type="submit"]')
        ->assertSee('Hello Admin')
        ->clickLink('Logout')
        ->assertSee('Hello Guest');
 
  });
 }
}
