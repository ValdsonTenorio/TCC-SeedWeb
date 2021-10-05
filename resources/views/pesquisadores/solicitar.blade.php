@extends('layouts.app')



@section('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('pesquisador.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email Institucional</label>
      <input type="email" name="email_institucional" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Institucional">
      <small id="emailHelp" class="form-text text-muted">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Currículo Lattes</label>
      <input type="url" name="curriculo_lattes" class="form-control" id="exampleInputPassword1" placeholder="Currículo Lattes">
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
