@extends('layouts.app')

@section('content')

<form action="{{route('semente.update', $semente->id)}}" method="post">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <div class="form-group">
      <label for="exampleInputEmail1">Nome Popular da Semente</label>
      <input value="{{$semente->nome_popular}}" type="text" name="nome_popular" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome Popular">
      <small id="emailHelp" class="form-text text-muted">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nome Científico</label>
      <input value="{{$semente->nome_cientifico}}" type="text" name="nome_cientifico" class="form-control" id="exampleInputPassword1" placeholder="Nome Científico">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Especie</label>
        <input value="{{$semente->especie}}" type="text" name="especie"class="form-control" id="exampleInputPassword1" placeholder="Especie">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Genêro</label>
        <input value="{{$semente->genero}}" type="text" name="genero" class="form-control" id="exampleInputPassword1" placeholder="Genêro">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Quebra de Dormência</label>
        <input value="{{$semente->quebra_de_dormencia}}" type="text" name="quebra_de_dormencia" class="form-control" id="exampleInputPassword1" placeholder="Quebra Dormência">
      </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
  <iframe id="form_target" name="form_target" style="display:none"></iframe>
  <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
      <input name="image" id="upload_file" type="file"
               onchange="$('#my_form').submit();this.value='';">
      <input type="hidden" name="type_slug" id="type_slug" value="{{ $semente->image }}">
      {{ csrf_field() }}
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