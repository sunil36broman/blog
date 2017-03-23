@extends('main');

@section('title', '| delete Comment')
@section('content')
     <h1>Delete Comment</h1>
    <p>
     name::{{ $comment->name }}<br>
     email::{{ $comment->email }}<br>
     comment::{{ $comment->comment }}<br>
     </p>
     {{ Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'DELETE']) }}
          {{ Form::submit('Yes delete this comment', ['class' => 'btn btn-lg btn-block btn-danger']) }}
     {{ Form::close() }}
@endsection