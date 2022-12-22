<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CrudTest extends DuskTestCase
{
  /** 
     * @test 
     */

    public function can_view_index_of_project()
    {

         $this->browse(function (Browser $browser) use ($post) {
            $browser->loginAs($post->user)
            ->visit('/')
            ->assertSee($post->name);
         });
        }

        // project verwijderen
        //Projects aangemaakt
        //show Project Admin
        //Project geupdate

   /** 
     * @test 
     */

    public function can_view_create_a_project()
    {

         $this->browse(function (Browser $browser) use ($post) {
            $browser->loginAs($post->user)
            ->visit('/')
            ->assertSee('Project aangemaakt')
            ->clickLink('Create')
            ->type('name')
            ->type('description');
         });
        }
}
