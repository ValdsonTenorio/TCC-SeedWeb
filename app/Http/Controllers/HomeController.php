<?php

namespace App\Http\Controllers;

use App\Models\Semente;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('voyager.dashboard');
        //return view('home');
    }
    public function sementes()
    {
        $sementes = Semente::all();
        return view('home', compact('sementes'));
    }
}


