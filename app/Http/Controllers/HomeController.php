<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;

class HomeController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('home.index', compact('user'));
    }

    public function edit() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('home.edit', compact('user'));
    }

    public function update(Request $request) {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        if ( $request->input('display_name') != null ) {
            $user->display_name = $request->input('display_name');
            $user->save();
        }
        if ( $request->account_message != null ) {
            $user->account_message = $request->account_message;
            $user->save();
        }
        if ( $request->image != null && $request->validate(['image'=>'required|mimes:jpg,jpeg,png,gif']) ) {
            $filepath = $request->image->store('images', 'public');
            $user->icon_filepath = $filepath;
            $user->save();
        }
        return redirect('/home');
    }
}
