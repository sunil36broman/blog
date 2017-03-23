@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section("title", "| $titleTag")
@section('content')
     <div class="jumbotron col-lg-10 col-lg-offset-1">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="{{ url('auth/register') }}" role="button">Sign up today</a></p>
      </div>
    <div class="row marketing">
        <div class="col-lg-4 col-lg-offset-2">
       
        </div>
        <div class="col-lg-4">
       
        </div>
    </div>
          <div class="row marketing">
            <div class="col-lg-6 col-lg-offset-1" style="text-align: justify;">
              <h4>Blog Posts</h4>
              
                 <h3>{{$post->title}}</h3>
                  <p>Posted In: {{ $post->category->name }}</p>
                   {{ Html::image('/uploads/logo/'.$post->photo, $post->title, array( 'class' => 'blogimg' )) }}
                 <p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
                 <p>{{ strip_tags($post->body) }}</p>
                 
              
            </div>
            <div class="col-lg-6 col-lg-offset-1" style="text-align: justify;">
              <h4>Blog comments</h4>
                <hr>
                <p>( {{ $post->comments()->count() }} ) Comments </p>
                <hr>
                @foreach($post->comments as $comment)
                 <h3>{{ $comment->name }}</h3>
                 <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" alt="">
                  <p> {{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }} </p>
                  <p>{{ $comment->comment }}</p>
                @endforeach
            </div>
             <div class="col-lg-6 col-lg-offset-1" style="text-align: justify;">
                {{ Form::open(['route'=>['comments.store', $post->id], 'method' => 'POST']) }}

                      {{ Form::label('name', "Name:") }}
                      {{ Form::text('name', null, ['class' => 'form-control']) }}

                      {{ Form::label('email', "Email:") }}
                      {{ Form::text('email', null, ['class' => 'form-control']) }}

                      {{ Form::label('comment', "Comment:") }}
                      {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

                       {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block']) }} 
                {{ Form::close() }}
            </div>
          </div>
@endsection
