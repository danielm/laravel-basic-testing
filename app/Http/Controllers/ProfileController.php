<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function upload(ProfileRequest $request)
    {
        $request->file('photo')->store('profiles');

        return redirect('profile');
    }

    /*public function profile(Request $request){
        return view('profile');
    }*/
}
