<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

 class AuthTest extends DuskTestCase
 {
  
    /** 
     * @test 
     */

     public function a_user_can_register_correctly()
     {
          $this->browse(function (Browser $browser) {
             $browser->visit('/register')
             ->type('name', 'UserMoo')
             ->type('email', 'user2@tcrmbo.nl')
             ->type('password', 'password')
             ->type('password_confirmation', 'password')
             ->click('button[type="submit"]')
             ->assertSee('My Admin')
             ->clickLink('Logout')
             ->assertSee('Hello Guest');
          });
         }
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
         ->assertSee('Hello Admin');
      
   });
   }
}


  
      

    