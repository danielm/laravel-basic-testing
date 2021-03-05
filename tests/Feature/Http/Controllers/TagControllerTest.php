<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_empty_index()
    {
        //$this->withoutExceptionHandling();

        $response = $this->get('/tags')
            ->assertStatus(200)
            ->assertSee('No tags found');
    }

    public function test_filledup_index()
    {
        $tag = Tag::factory()->create();

        //$this->withoutExceptionHandling();

        $response = $this->get('/tags')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('No tags found');
    }
}
