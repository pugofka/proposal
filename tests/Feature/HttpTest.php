<?php

namespace Tests\Feature;

use App\Calculation;
use App\Clients;
use App\Reviews;
use App\Stage;
use App\Task;
use App\Template;
use App\User;
use App\Variant;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class HttpTest extends TestCase
{
    use RefreshDatabase;

    /**
     * setUp test with seeding database
     */
    protected function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    public function testCalculations()
    {
        factory(Calculation::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/calculations');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/calculations/create');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/calculations/' . 1 . '/edit');
        $response->assertStatus(200);
    }

    public function testClients()
    {
        $user = factory(User::class)->create();
        factory(Clients::class)->create();

        $response = $this->actingAs($user)->get('/clients');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/clients/create');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/clients/' . 1 . '/edit');
        $response->assertStatus(200);
    }

    public function testReviews()
    {
        $user = factory(User::class)->create();
        factory(Reviews::class)->create();

        $response = $this->actingAs($user)->get('/reviews');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/reviews/create');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/reviews/' . 1 . '/edit');
        $response->assertStatus(200);
    }

    public function testStages()
    {
        $user = factory(User::class)->create();
        factory(Stage::class)->create();

        $response = $this->actingAs($user)->get('/stages');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/stages/create');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/stages/' . 1 . '/edit');
        $response->assertStatus(200);
    }

    public function testTasks()
    {
        $user = factory(User::class)->create();
        factory(Task::class)->create();

        $response = $this->actingAs($user)->get('/tasks');
        $response->assertStatus(200);

    }

    public function testTemplate()
    {
        $user = factory(User::class)->create();
        factory(Template::class)->create();

        $response = $this->actingAs($user)->get('/templates');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/templates/create');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/templates/' . 1 . '/edit');
        $response->assertStatus(200);
    }
}
