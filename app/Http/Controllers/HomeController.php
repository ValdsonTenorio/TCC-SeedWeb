<?php

namespace App\Http\Controllers;

use App\Models\Semente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        if($user->role_id == 1){
            return redirect()->route('voyager.dashboard');
        }
        return redirect()->route('semente.index');
    }
    public function sementes()
    {
        $sementes = Semente::all();
        return view('home', compact('sementes'));
    }
    public function solicitarPerfilPesquisador()
    {
        $user = Auth::user();
        
        return view('pesquisadores.solicitar');
    }
    public function storepesquisador(Request $request){
        dd($request);

    }

}


