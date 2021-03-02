<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;

use App\Models\Post;

class PostTest extends TestCase
{
    public function test_set_name_in_lowercase()
    {
        $post = new Post;
        $post->name = 'Hello Worldwide World';

        $this->assertEquals('hello worldwide world', $post->name);
    }

    public function test_set_slug()
    {
        $post = new Post;
        $post->name = 'Hello Worldwide World';

        $this->assertEquals('hello-worldwide-world', $post->slug);
    }
}
