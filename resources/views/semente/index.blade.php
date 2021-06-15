@extends('layouts.app')

@section('content')

@if(Session::has('mensagem'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('mensagem') }}
  </div>
  @endif
	<div class="row" style=" background-color: rgb(248, 255, 248)">





	@foreach($sementes as $key => $semente)
        @if (($key) % 2 == 0 || $key == 0)
        <div class="row" style="margin-top: 3%">
        @endif
        <div class="col-md-6">
            <div class="media">
                 <a href="#" class="pull-left"><img style="width: 200px; height: 200px" alt="Bootstrap Media Preview" src="{{ Voyager::image( $semente->imagem ) }}" class="img-circle media-object" data-toggle="modal" data-target="#{{ $semente->id }}"></a>
                <div class="media-body">
                    <h4 class="media-heading" style="margin-top: 21%;font-style: 30%">
                        {{ $semente->nome_popular }}
                    </h4>
						 {!! $semente->nome_cientifico !!}
                </div>
            </div>
        </div>
        @if (($key + 1) % 2 == 0)
        </div>
        @endif
    @endforeach

	<div class="pagination-style">
	<div class="row" style="margin-top: 2%">
		<div class="col-md-12">
			<?php echo $sementes->render(); ?>
		</div>
	</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
</div>
	@foreach($sementes as $key => $semente)
	  <div class="modal fade" id="{{ $semente->id }}" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">{{ $semente->nome_popular }}</h4>
	        </div>
	        <div class="modal-body">
	          <p>{!! $semente->nome_cientifico!!}</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
    </div>
	  </div>
	@endforeach
    @endsection
