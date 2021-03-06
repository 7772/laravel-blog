<?php

namespace Tests\Controllers\Blog;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        config(['app.url' => 'http://test-7772.blog.io']);
    }

    public function test()
    {
        // Given

        // When
        $response = $this->get('/');

        // Then
        $response->assertStatus(200);
    }
}