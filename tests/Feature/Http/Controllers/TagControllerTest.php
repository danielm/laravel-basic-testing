<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_empty_index()
    {
        //$this->withoutExceptionHandling();

        $response = $this->get(route('tags.index'))
            ->assertStatus(200)
            ->assertSee('No tags found');
    }

    public function test_filledup_index()
    {
        $tag = Tag::factory()->create();

        //$this->withoutExceptionHandling();

        $response = $this->get(route('tags.index'))
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('No tags found');
    }

    public function test_store()
    {
        //$this->withoutExceptionHandling();

        $tmp_tag_name = $this->faker->word;

        $this->post(route('tags.store'), ['name' => $tmp_tag_name])
            ->assertRedirect(route('tags.index'));

        $this->assertDatabaseHas('tags', ['name' => $tmp_tag_name]);
    }

    public function test_destroy()
    {
        $tag = Tag::factory()->create();

        $this->delete(route('tags.destroy', ['tag' => $tag]))
            ->assertRedirect(route('tags.index'));

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }

    public function test_validation()
    {
        //$this->withoutExceptionHandling();

        $this->post(route('tags.store'), ['name' => ''])
            ->assertSessionHasErrors('name');
    }
}
