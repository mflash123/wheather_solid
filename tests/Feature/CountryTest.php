<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class CountryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_country()
    {
        $response = $this->json('GET', '/api/v1/countries');

        $response
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
                    $json->where('id',1)
                    ->where('name','Afghanistan')
                    ->etc()
                 )
        );

        $response = $this->json('GET', '/api/v1/countries/23');

        $response
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json
                ->where('id',23)
                ->where('name','Bhutan')
                ->where('iso2','BT')
                ->where('iso3','BTN')
        );
    }
}