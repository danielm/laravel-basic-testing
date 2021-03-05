<?php

namespace Tests\Unit\Models;

//use PHPUnit\Framework\TestCase; //Fix because Sluggable Testing issue
use Illuminate\Foundation\Testing\TestCase; //Fix because Sluggable Testing issue

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\CreatesApplication; //Fix because Sluggable Testing issue

use App\Models\Tag;

class TagTest extends TestCase
{
    use CreatesApplication; //Fix because Sluggable Testing issue
    use RefreshDatabase; //Fix because Sluggable Testing issue

    public function test_sluggable()
    {
        $tag = new Tag;
        $tag->name = 'We are Testing Sluggablé% ';
        $tag->save(); //Fix because Sluggable Testing issue

        $this->assertEquals('we-are-testing-sluggable', $tag->slug);
    }
}
