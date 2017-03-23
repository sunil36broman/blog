@extends('main')
@section('title', '| all post')
@section('owncss')
{!!Html::style('css/parsley.css')!!}
@endsection
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
    <div class="row marketing">
        <div class="col-lg-4 col-lg-offset-2">
       
        </div>
        <div class="col-lg-4">
       
        </div>
    </div>
      <div class="row marketing">
         <div class="col-lg-6 col-lg-offset-2">
         <h4>All Posts</h4>
         <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                 <th>Photo</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{substr(strip_tags($post->body), 0, 10)}}{{ strlen(strip_tags($post->body)) > 10 ? "..." : "" }}</td>
                <td>
                  {{ Html::image('/uploads/logo/'.$post->photo, $post->title, array( 'width' => 70, 'height' => 70 )) }}

                </td>
                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                <td>
                  <a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-sm">Show</a>
                  <a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
          <div class="center">
          {!! $posts->links(); !!}
          </div>
         </div>

         <div class="col-lg-2">
           <a href="{{route('posts.create')}}" class="btn btn-success btn-block">Create New Post</a>
         </div>
    </div>

@endsection
@section('ownjs')
{!!Html::script('js/parsley.min.js')!!}
@endsection