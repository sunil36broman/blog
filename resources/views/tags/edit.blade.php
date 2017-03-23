@extends('main')
@section('title', "| tag edit")

@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-8 col-lg-offset-2" style="text-align:justify;">
          <h3 style="color:#5CB85C">Details</h3>
			{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method'=>'PUT']) !!}
       		{{ Form::label('name', 'Name') }}
          {{ Form::text('name', null, ['class'=>'form-control input-lg']) }}
          {{ Form::submit('Save tag', ['class'=>'btn btn-success btn-block']) }}
          {!! Form::close() !!}
        </div>
      </div>

@endsection