@extends('main')
@section('title', "| $tag->name")

@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
    
      <div class="row marketing">
        <div class="col-lg-8 col-lg-offset-2" style="text-align:justify;">
          <h3 style="color:#5CB85C">Details</h3>
          <h4>{{$tag->name}} have({{$tag->posts()->count()}})posts</h4>
          <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-success">Edit</a>
          {{ Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'DELETE']) }}
                {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
          {{ Form::close() }}
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Tags</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tag->posts as $post)
               <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>
                  @foreach($post->tags as $tag)
                      {{ $tag->name }}
                  @endforeach
                </td>
                <td><a href="{{ route('posts.show', $post->id) }}">view</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>

@endsection
