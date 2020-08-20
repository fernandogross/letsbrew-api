<?php

namespace Tests\Unit\Controllers;

use App\Models\Hop;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HopControllerTest extends TestCase
{
    Use RefreshDatabase;

    /**
     * @var string $endpoint
     */
    public $endpoint = '/api/hops';

    /**
     * Index test.
     * @return void
     */
    public function testIndex()
    {
        // Creating Hops
        $hop = factory(Hop::class)->create();
        $hopTwo = factory(Hop::class)->create();

        $response = $this->get($this->endpoint);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'OK',
            'data' => [
                $hop->toArray(),
                $hopTwo->toArray()
            ]
        ]);
    }

    /**
     * Create test.
     * @return void
     */
    public function testCreate()
    {
        $user = factory(User::class)->create();
        $hop = [
            'user_id' => $user->id,
            'name' => 'Hop number 1',
            'origin' => 'United States',
            'type' => 1,
            'form' => 1,
            'alpha' => 46,
            'beta' => 13,
        ];
        $response = $this->post($this->endpoint, $hop);
        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Created',
                'data' => $hop
            ]);
    }
}