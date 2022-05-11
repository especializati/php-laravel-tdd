<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    protected string $endpoint = '/api/users';

    public function test_example()
    {
        $response = $this->getJson($this->endpoint);
        $response->dump();
        $response->assertStatus(Response::HTTP_OK);
    }
}
