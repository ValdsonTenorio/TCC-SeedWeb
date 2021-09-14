@extends('layouts.app')

@section('content')

@if(Session::has('mensagem'))
<div class="alert alert-danger" role="alert">
	{{ Session::get('mensagem') }}
</div>
@endif

<div class="container-fluid bg-light px-4 mt-3">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a href="{{ route('semente.create') }}" class="mt-3 btn btn-primary ">Cadastrar Semente</a>
          <form class="d-flex" action="{{ route('semente.search') }}" method="get">
            @csrf
            <input class="form-control me-2" type="search" aria-label="Search" type="text" name="search" placeholder="Filtrar">
            <button class="btn btn-outline-success" type="submit">Filtrar</button>
          </form>
        </div>
      </nav>
	<hr>


	<!-- Three columns of text below the carousel -->
	@foreach($sementes as $key => $semente)
	@if (($key) % 4 == 0 || $key == 0)
	<div class="row w-100">
		@endif
		<div class="col-12 col-md text-center">
			<img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{ Voyager::image( $semente->imagem ) }}">

			<h2>{{ $semente->nome_popular }}</h2>
			<p>{!! $semente->nome_cientifico !!}</p>
			<p><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#{{ $semente->id }}" onclick="mostrarmodal({{$semente->id}})">Mais Detalhes »</a></p>
		</div><!-- /.col-lg-4 -->
		@if (($key + 1) % 4 == 0)
	</div>
	@endif
	@endforeach
	<div class="row">
	<div class="pagination-style">

			<div class="col-md-12">
				<?php echo $sementes->render(); ?>
			</div>
		</div>
	</div>

</div>
@foreach($sementes as $key => $semente)
@include('semente.components.modal-visualizar')
@endforeach


@endsection

@section('javascript')
<script>
	function mostrarmodal(id) {
		console.log(id);
		$('#modal-' + id).modal('show');
	}
</script>
@endsection
