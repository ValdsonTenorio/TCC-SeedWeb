<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Semente;
use Illuminate\Support\Facades\Auth;
class SementeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sementes = Semente::paginate(4);
        return view('semente.index', compact('sementes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if (Auth::check() === true) {
            $user = Auth()->User();
            return view('semente.create', compact('user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::check() === true and Auth::user()->can('add', new Semente)) {
            $semente = new Semente();
            $semente->nome_popular = $request->nome_popular;
            $semente->nome_cientifico = $request->nome_cientifico;
            $semente->especie = $request->especie;
            $semente->genero = $request->genero;
            $semente->quebra_de_dormencia = $request->quebra_de_dormencia;
           $semente->save();
            return redirect()->route('semente.index');
        } else {
            $request->session()->flash('mensagem', 'Você não possui permissão para isso');
            return redirect()->route('semente.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semente = Semente::where('id', $id)->first();
        return view('semente.show', compact('semente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
