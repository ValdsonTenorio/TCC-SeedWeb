@extends('layouts.app')

@section('content')



	<div class="row" style="height: 20px; background-color: green">
	</div>


	@foreach($posts as $key => $post)
        @if (($key) % 2 == 0 || $key == 0)
        <div class="row" style="margin-top: 3%">
        @endif
        <div class="col-md-6">
            <div class="media">
                 <a href="#" class="pull-left"><img style="width: 200px; height: 200px" alt="Bootstrap Media Preview" src="{{ Voyager::image( $post->image ) }}" class="img-circle media-object" data-toggle="modal" data-target="#{{ $post->slug }}"></a>
                <div class="media-body">
                    <h4 class="media-heading" style="margin-top: 21%;font-style: 30%">
                        {{ $post->title }}
                    </h4>
						 {!! $post->excerpt !!}
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
			<?php echo $posts->render(); ?>
		</div>
	</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
</div>
	@foreach($posts as $key => $post)
	  <div class="modal fade" id="{{ $post->slug }}" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">{{ $post->title }}</h4>
	        </div>
	        <div class="modal-body">
	          <p>{!! $post->body !!}</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	  </div>
	@endforeach
    @endsection
