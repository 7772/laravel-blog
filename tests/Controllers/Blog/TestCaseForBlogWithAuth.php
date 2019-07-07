<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-07-07
 * Time: 19:11
 */

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
        $this->user = MockHelper::mockUser();
        $this->actingAs($this->user);
    }
}