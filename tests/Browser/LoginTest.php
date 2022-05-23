<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    public function test_login_functionality()
    {
        $user = User::factory()->create([
            'email' => 'taylor@laravel.com',
        ]);
 
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/students')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('login')
                    ->assertPathIs('/students');
        });
    }
}
