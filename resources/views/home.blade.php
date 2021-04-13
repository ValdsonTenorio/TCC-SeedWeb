@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title> SeedWeb</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>
  <body class="body-background" style="background-color: #759D00">

    <div class="container-fluid" style="width: 90%; background-color:white; margin-top: 1%; margin-bottom: 1%; border-radius: 10px;">

	<div class="row banner" >
		<div class="col-md-3" style="padding-top: 60px; padding-left: 40px">
			<img alt="Bootstrap Image Preview" src="images/logoif.png" class="img-rounded">
		</div>
		<div class="col-md-9">
				<img src="images/logo.png">
		</div>
	</div>

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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>


  </body>
</html>

