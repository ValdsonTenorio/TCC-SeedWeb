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
		@auth
		<div class="acoes">

			</div>
			@endauth
          <form class="d-flex" action="{{ route('pesquisador.search') }}" method="get">
            @csrf
            <input class="form-control me-2" type="search" aria-label="Search" type="text" name="search" placeholder="Filtrar">
            <button class="btn btn-outline-success" type="submit">Filtrar</button>
          </form>
        </div>
      </nav>
	<hr>


	<!-- Three columns of text below the carousel -->
	@foreach($pesquisadores as $key => $pesquisador)
	@if (($key) % 4 == 0 || $key == 0)
	<div class="row w-100">
		@endif
		<div class="col-12 col-md text-center">


			<h2>{{ $pesquisador->email_institucional }}</h2>
			<p>{!! $pesquisador->curriculo_lattes !!}</p>
            <h2> {!! $pesquisador->situacao() !!} </h2>
			<p><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#{{ $pesquisador->id }}" onclick="mostrarmodal({{$pesquisador->id}})">Mais Detalhes »</a></p>
		</div><!-- /.col-lg-4 -->
		@if (($key + 1) % 4 == 0)
	</div>
	@endif
	@endforeach
	<div class="row">
	<div class="pagination-style">

			<div class="col-md-12">
				<?php echo $pesquisadores->render(); ?>
			</div>
		</div>
	</div>

</div>



@endsection

@section('javascript')
<script>
	function mostrarmodal(id) {
		console.log(id);
		$('#modal-' + id).modal('show');
	}
</script>
@endsection
