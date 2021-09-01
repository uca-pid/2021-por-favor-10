<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * The registration form can be displayed.
     *
     * @return void
     */
    public function testRegisterFormDisplayed()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * A valid user can be registered.
     *
     * @return void
     */
    public function testRegistersAValidUser()
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(302);
    }

    /**
     * An invalid user is not registered.
     *
     * @return void
    */
    public function testDoesNotRegisterAnInvalidUser()
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();

        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'invalid'
        ]);

        $response->assertSessionHasErrors();

        $this->assertGuest();
    }
    /**
     * The login form can be displayed.
     *
     * @return void
     */
    public function testLoginFormDisplayed()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * A valid user can be logged in.
     *
     * @return void
     */
    public function testLoginAValidUser()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * An invalid user cannot be logged in.
     *
     * @return void
     */
    public function testDoesNotLoginAnInvalidUser()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'invalid'
        ]);

        $response->assertSessionHasErrors();

        $this->assertGuest();
    }

    /**
     * A logged in user can be logged out.
     *
     * @return void
     */
    public function testLogoutAnAuthenticatedUser()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertStatus(302);

        $this->assertGuest();
    }

}
