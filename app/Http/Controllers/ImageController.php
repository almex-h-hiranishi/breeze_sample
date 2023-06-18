<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Image;
use App\Models\User;

class ImageController extends Controller
{
    public function index() {
        return redirect('/image/list');
    }

    public function upload() {
        return view('ImageChanel.upload');
    }

    public function confirm(Request $request) {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,gif'
        ]);
        $filepath = $request->image->store('images', 'public');

        $image = new Image();
        $image->filename = $request->image->getClientOriginalName();
        $image->filepath = $filepath;
        $image->user_id = auth()->user()->id;
        $image->save();

        return redirect('/image/list');

    }

    public function list(Request $request) {
        $user_id = $request->input('user_id');
        if ( Str::length($user_id) > 0 ) {
            // $images = UploadImage::where('user_id', $user_id)->get();
            // $images = User::findOrFail($user_id)->images;
            $images = User::findOrFail($user_id)->images;
        } else {
            $images = Image::all();
        }
        return view('ImageChanel.list', compact('images', 'user_id'));
    }

    public function detail($id) {
        $image = Image::findOrFail($id);
        return view('ImageChanel.detail', compact('image'));
    }

    public function edit($id) {
        $image = Image::findOrFail($id);
        return view('ImageChanel.edit', compact('image'));
    }

    public function update(Request $request, $id) {
        $image = Image::findOrFail($id);

        // 編集する内容がない

        return redirect('/image/list');
    }

    public function delete($id) {
        $image = Image::findOrFail($id);
        if ( $image->user_id == auth()->user()->id ) {
            $image->delete();
        }
        return redirect('/image/list');
    }

}
