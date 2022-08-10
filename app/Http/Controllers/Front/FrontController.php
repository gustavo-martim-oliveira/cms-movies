<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index() {
        return view('front.pages.index');
    }

    public function login() {
        if(Auth::check()) return redirect()->route('front.index');
        return view('front.pages.login');
    }

    public function register() {
        if(Auth::check()) return redirect()->route('front.index');
        return view('front.pages.register');
    }
}
