@extends('layouts.app')
@section('content')
<div class="container-fluid bg-light px-4 mt-3">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a href="{{ route('semente.create') }}" class="mt-3 btn btn-primary ">Solicitar permissão gerenciar sementes</a>
          <form class="d-flex" action="{{ route('semente.search') }}" method="get">
            @csrf
          </form>
        </div>
      </nav>
	<hr>
    </div>
@endsection