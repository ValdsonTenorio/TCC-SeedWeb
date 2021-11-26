<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSemente;
use  Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Semente;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use League\Flysystem\Util;
class SementeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sementes = Semente::paginate();
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
            $semente = new Semente();
            return view('semente.create', compact('user', 'semente'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSemente $request)
    {

        if (Auth::check() === true and Auth::user()->can('add', new Semente)) {
            $semente = new Semente();
            $semente->nome_popular = $request->nome_popular;
            $semente->nome_cientifico = $request->nome_cientifico;
            $semente->especie = $request->especie;
            $semente->genero = $request->genero;
            $semente->causa = $request->causa;
            $semente->quebra_de_dormencia = $request->quebra_de_dormencia;
            $semente->imagem = $this->upload($request->file('image'));
           $semente->save();
            return redirect()->route('semente.index');
        } else {
            $request->session()->flash('mensagem', 'Você não possui permissão para isso');
            return redirect()->route('semente.index');
        }
        Semente::create($request->all());
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
        $semente = Semente::where('id', $id)->first();
        return view('semente.edit', compact('semente'));
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

        if (Auth::check() === true and Auth::user()->can('edit', new Semente)) {
            $user = Auth()->User();
            $semente = Semente::where('id', $id)->first();
            if (!$semente)
                return redirect()->back();
            $semente->nome_popular = $request->nome_popular;
            $semente->nome_cientifico = $request->nome_cientifico;
            $semente->especie = $request->especie;
            $semente->genero = $request->genero;
            $semente->causa = $request->causa;
            $semente->quebra_de_dormencia = $request->quebra_de_dormencia;
            $semente->imagem = $this->upload($request->file('image'));
            $semente->save();
            return redirect()->route('semente.index');
        } else {
        $request->session()->flash('mensagem', 'Você não possui permissão para isso');
        return redirect()->route('semente.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check() === true) {
            $semente = Semente::where('id', $id)->first();
            $semente->delete();
            return redirect()->route('semente.index');
        }
    }
    public function upload($file)
    {
        $fullFilename = null;
        $resizeWidth = 1800;
        $resizeHeight = null;
        $slug = "sementes";

        if(isset($file)){
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->firstOrFail();

        $path = $slug.'/'.date('F').date('Y').'/';

        $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
        $filename_counter = 1;

        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
            $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
        }

        $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

        $ext = $file->guessClientExtension();

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            $image = Image::make($file)
                ->resize($resizeWidth, $resizeHeight, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            if ($ext !== 'gif') {
                $image->orientate();
            }
            $image->encode($file->getClientOriginalExtension(), 75);

            // move uploaded file from temp to uploads directory
            if (Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public')) {
                $status = __('voyager::media.success_uploading');
                $fullFilename = $fullPath;
            } else {
                $status = __('voyager::media.error_uploading');
            }
        } else {
            $status = __('voyager::media.uploading_wrong_type');
        }

        // echo out script that TinyMCE can handle and update the image in the editor
        return $fullFilename;
        }
        return '';
    }

    public function search(Request $request)
    {
        if (empty($request->search)){
          $sementes = Semente::paginate();
          return view('semente.index', compact('sementes'));
        } else {
        $sementes = Semente::where('nome_popular', $request->search)->paginate();
        return view('semente.index', compact('sementes'));
        }

    }
}
