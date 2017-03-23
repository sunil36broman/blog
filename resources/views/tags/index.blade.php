@extends('main')
@section('title', '| all tags')
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
    <div class="row marketing">
        <div class="col-lg-4 col-lg-offset-2">
          <h4>All tags</h4>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach($tags as $tag)
              <tr>
                
                <td>{{$tag->id}}</td>
                <td><a href="{{ route('tags.show', $tag->id) }}">{{$tag->name}}</a></td>
               
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-lg-4" style="background:#F8F8F8;padding:10px;border-radius:2px;margin-top: 0px;">
           <h3>Create New Tag</h3>
           {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

           {{ Form::label('name', 'Name:') }}
           {{ Form::text('name', null, ['class'=>'form-control']) }}

            {{ Form::submit('Create New Tag', ['class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px']) }}

           {!! Form::close() !!}
         
        </div>
    </div>
     
         

         
    

@endsection
