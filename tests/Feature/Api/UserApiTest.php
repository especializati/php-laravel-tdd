<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    protected string $endpoint = '/api/users';

    /**
     * @dataProvider dataProviderPagination
     */
    public function test_paginate(
        int $total,
        int $page = 1,
        int $totalPage = 15
    ) {
        User::factory()->count($total)->create();

        $response = $this->getJson("{$this->endpoint}?page={$page}");

        $response->assertOk();
        $response->assertJsonCount($totalPage, 'data');
        $response->assertJsonStructure([
            'meta' => [
                'total',
                'current_page',
                'last_page',
                'first_page',
                'per_page'
            ],
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'email'
                ]
            ]
        ]);
        $response->assertJsonFragment(['total' => $total]);
        $response->assertJsonFragment(['current_page' => $page]);
    }

    public function dataProviderPagination(): array
    {
        return [
            'test total paginate empty' => ['total' => 0, 'page' => 1, 'totalPage' => 0],
            'test total 40 users page one' => ['total' => 40, 'page' => 1, 'totalPage' => 15],
            'test total 20 users page two' => ['total' => 20, 'page' => 2, 'totalPage' => 5],
            'test total 100 users page two' => ['total' => 100, 'page' => 2, 'totalPage' => 15],
        ];
    }

    public function test_create()
    {
        $payload = [
            'name' => 'Carlos',
            'email' => 'carlos@especializati.com.br',
            'password' => '12345678',
        ];

        $response = $this->postJson($this->endpoint, $payload);
        $response->assertCreated();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email'
            ]
        ]);
    }
}
