<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class CityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_city()
    {
        $response = $this->json('GET', '/api/v1/countries/cities/177');

        $response
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
                    $json
                    ->where('id',51099)
                    ->where('country_id',177)
                    ->where('name','Abakan')
                 )
        );
    }
}
