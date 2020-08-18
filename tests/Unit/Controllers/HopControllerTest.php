<?php

namespace Tests\Unit\Controllers;

use App\Models\Hop;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class HopControllerTest extends TestCase
{
    /**
     * @var string $endpoint
     */
    public $endpoint = '/api/hops';

    /**
     * Index test
     *
     * @return void
     */
    public function testIndex()
    {
        $hop = new Hop([
            'id' => 1,
            'user_id' => 1,
            'name' => 'Hop number 1',
            'origin' => 'United States',
            'type' => 'Aroma',
            'form' => 'Pellet',
            'alpha' => 46,
            'beta' => 13,
        ]);

        $response = $this->get($this->endpoint);
        $response->assertStatus(200);
    }
}