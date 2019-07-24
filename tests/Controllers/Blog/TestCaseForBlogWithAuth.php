<?php

namespace Tests\Controllers\Blog;

use App\User;
use Tests\MockHelper;
use Tests\TestCase;

class TestCaseForBlogWithAuth extends TestCase
{
    /** @var User */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        config(['app.url' => 'http://test-7772.blog.io']);
        $this->artisan('passport:install');

        $this->user = MockHelper::mockUser();
        $this->actingAs($this->user, 'api');
    }
}