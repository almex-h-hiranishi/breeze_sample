<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Account;

class AccountController extends Controller
{
    public function index() {
        if ( auth()->check() ) {
            $user = auth()->user();
            return view('account.index', compact('user'));
        }
        return redirect('/home');
    }

    public function account($id) {
        if ( Str::length($id) > 0 )  {
            $user = User::findOrFail($id);
            return view('account.index', compact('user'));
        }
        return redirect('/home');
    }

    // ↓動いてない
    public function account_name($name) {
        if ( Str::length($name) > 0 )  {
            $user = User::where('display_name', $name)->get();
            return view('account.index', compact('user'));
        }
        return redirect('/home');
    }

}
