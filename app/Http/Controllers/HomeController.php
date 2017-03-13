<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Billboard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()->user_type == 1 ) {

            return view('admin');

        } else {
            $billboards = Billboard::where('user_id', Auth::user()->id)->take(8)->get();
            return view('home', compact('billboards'));
        }
    }
}
