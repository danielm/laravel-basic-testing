<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('index', [
            'tags' => Tag::all()
        ]);
    }
}
