@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($sementes as $key => $semente)
        @if (($key) % 2 == 0 || $key == 0)
        <div class="row" style="margin-top: 3%">
        @endif
        <div class="col-md-6">
            <div class="media">
                 <a href="#" class="pull-left"><img style="width: 200px; height: 200px" alt="imagem do {{$semente->nome_popular}}" src="{{ Voyager::image( $semente->imagem ) }}" class="img-circle media-object" data-toggle="modal" data-target="#{{ $semente->slug }}"></a>
                <div class="media-body">
                    <h4 class="media-heading" style="margin-top: 21%;font-style: 30%">
                        {{ $semente->nome_popular }}
                    </h4>
						 {!! $semente->descricao !!}
                </div>
            </div>
        </div>
        @if (($key + 1) % 2 == 0)
        </div>
        @endif
    @endforeach
    </div>
</div>
@endsection

