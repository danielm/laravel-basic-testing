<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileTest extends TestCase
{
    public function test_upload_photo()
    {
        //$this->withoutExceptionHandling();

        Storage::fake('local');

        $photo = UploadedFile::fake()->image('photo.png', 100, 100);

        $response = $this->post('profile', [
            'photo' => $photo
        ]);

        Storage::disk('local')->assertExists("profiles/{$photo->hashName()}");

        $response->assertRedirect('profile');
    }

    public function test_photo_required()
    {
        $response = $this->post('profile');// ['photo' => 'photo']

        $response->assertSessionHasErrors('photo');
    }
}
