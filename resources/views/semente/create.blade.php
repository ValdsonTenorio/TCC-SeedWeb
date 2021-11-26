@extends('layouts.app')

@section('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('semente.store')}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nome Popular da Semente</label>
      <input type="text" name="nome_popular" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome Popular" value="{{ old('nome_popular') }}">
      <small id="emailHelp" class="form-text text-muted">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nome Científico</label>
      <input type="text" name="nome_cientifico" class="form-control" id="exampleInputPassword1" placeholder="Nome Científico" value="{{ old('nome_cientifico') }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Especie</label>
        <input type="text" name="especie"class="form-control" id="exampleInputPassword1" placeholder="Especie" value="{{ old('especie') }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Genêro</label>
        <input type="text" name="genero" class="form-control" id="exampleInputPassword1" placeholder="Genêro" value="{{ old('genero') }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tipo de Dormência</label>
        <input type="text" name="tipo_de_dormencia" class="form-control" id="exampleInputPassword1" placeholder="tipo_de_dormencia" value="{{ old('tipo_de_dormencia') }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Quebra de Dormência</label>
        <input type="text" name="quebra_de_dormencia" class="form-control" id="exampleInputPassword1" placeholder="Quebra Dormência" value="{{ old('quebra_de_dormencia') }}">
      </div>
        <!-- ### IMAGE ### -->
      <div class="form-group">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon wb-image"></i> Imagem </h3>
            <div class="panel-actions">
                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
            </div>
        </div>
        <div class="panel-body">
            @if(isset($semente->imagem))
                <img src="{{Voyager::image( $semente->imagem ) }}" height="150" />
                <input type="hidden" name="imagem" value="{{$semente->imagem}}">
            @endif
            <input type="file" id="input-image" name="image">
        </div>
    </div>
      <button type="submit" class="btn btn-primary">Enviar</button>

  </form>


@endsection
@section('head')
    <style>
      form{
        background-color: white;
        padding: 50px;
        margin-top: 50px;
        border-radius: 10px;

      }
      form .form-group{
        color:black;
        text-align: justify;
        font-size: 16px;

      }
    </style>
@endsection
