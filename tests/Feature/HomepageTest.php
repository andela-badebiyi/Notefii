<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTest extends TestCase
{
    use DatabaseTransactions;

    private $john;

    public function setUp()
    {
        parent::setUp();
        $this->setUpTestData();
    }
    public function testIndexPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testLoginPage() 
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function testDashboardPage()
    {
        // should redirect user because of auth middleware
        $response = $this->get('/dashboard');
        $response->assertStatus(302);

        // should go to dashbooard
        $response = $this->actingAs($this->john)
            ->get('/dashboard');
        $response->assertStatus(200);
    }

    public function testLoginWithoutCSRFToken()
    {
        $response = $this->post('/login', [
            'email' => 'johndoe@gmail.com',
            'password' => 'test123'
        ]);

        $response->assertStatus(500);
    }

    public function testLoginWithCSRFToken()
    {
        \Session::start();
        $response = $this->post('/login', [
            'email' => 'johndoe@gmail.com',
            'password' => 'test123',
            '_token' => csrf_token()
        ]);
        $response->assertRedirect('/dashboard');
    }

   public function testRegisterWithoutCSRFToken()
    {
        Mail::fake();
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => 'test123',
            'password_confirmation' => 'test123'
        ]);

        $response->assertStatus(500);
    }

    public function testRegisterWithCSRFToken()
    {
        \Session::start();
        Mail::fake();

        $response = $this->post('/register', [
            'name' => 'Jane Doe',
            'email' => 'jandoe@gmail.com',
            'password' => 'test123',
            'password_confirmation' => 'test123',
            '_token' => csrf_token()
        ]);
        $response->assertRedirect('/dashboard');
    }

    public function testNonExistentPage()
    {
        $response = $this->get('/labalaba');
        $response->assertStatus(404);
    }

    private function setUpTestData()
    {
        $john = [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('test123')
        ];
        $this->john = factory(\App\User::class)->create($john);
    }
}
