<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        return view('index', [
            'tags' => Tag::all()
        ]);
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        return redirect(route('tags.index'))->with('status', 'Tag Created!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect(route('tags.index'))->with('status', 'Tag Deleted!');
    }
}
