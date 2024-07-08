<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index() {
        return view('page.user.index', [
            'userLogin'  =>User::where('id', auth()->user()->id)->first()
        ]);
    }
}
