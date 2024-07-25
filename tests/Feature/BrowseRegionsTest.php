<?php

use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Spatie\PestPluginTestTime\testTime;

uses(Tests\TestCase::class, RefreshDatabase::class);

testTime()->freeze('2024-07-08 14:25:50');

it('can fetch all regions', function() {

    $data = [
        'success' => true,
        'message' => 'regions retrieved successfully.',
        'data' => [
            [
                'id' => 1,
                'name' => 'World Region 1',
                'created_at' => '2024-07-08T14:25:50.000000Z',
                'updated_at' => '2024-07-08T14:25:50.000000Z',
            ],
            [
                'id' => 2,
                'name' => 'World Region 2',
                'created_at' => '2024-07-08T14:25:50.000000Z',
                'updated_at' => '2024-07-08T14:25:50.000000Z',
            ],
        ],
    ];

    foreach($data['data'] as $datum) {
        Region::create($datum);
    }

    $response = $this->getJson('/api/v1/regions');
    $response->assertStatus(200)->assertJson($data);
});
