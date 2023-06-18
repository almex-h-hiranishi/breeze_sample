<?php

namespace App\Http\Controllers;

use App\Models\Soliloquy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoliloquyController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        if ( Str::length($keyword) > 0 ) {
            $soliloquies = Soliloquy::where('body', 'like', '%$keyword%')->get();
            return view('soliloquy.index', $soliloquies);
        }
        $soliloquies = Soliloquy::all();
        return view('soliloquy.index', $soliloquies);
    }

    public function detail($id) {
    }

}
