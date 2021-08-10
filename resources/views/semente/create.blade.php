@extends('layouts.app')



@section('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('semente.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nome Popular da Semente</label>
      <input type="text" name="nome_popular" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome Popular">
      <small id="emailHelp" class="form-text text-muted">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nome Científico</label>
      <input type="text" name="nome_cientifico" class="form-control" id="exampleInputPassword1" placeholder="Nome Científico">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Especie</label>
        <input type="text" name="especie"class="form-control" id="exampleInputPassword1" placeholder="Especie">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Genêro</label>
        <input type="text" name="genero" class="form-control" id="exampleInputPassword1" placeholder="Genêro">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Quebra de Dormência</label>
        <input type="text" name="quebra_dormencia" class="form-control" id="exampleInputPassword1" placeholder="Quebra Dormência">
      </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
  <iframe id="form_target" name="form_target" style="display:none"></iframe>
  <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
          enctype="multipart/form-data">
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
