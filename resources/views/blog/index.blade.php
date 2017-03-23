@extends('main')
@section("title", "| blog")
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
              <h4>All Blog Posts</h4>
              @foreach($posts as $post)
                 <h3>{{$post->title}}</h3>
                 <p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
                  {{ Html::image('/uploads/logo/'.$post->photo, $post->title, array( 'class' => 'blogimg')) }}
                 <p>{{substr(strip_tags($post->body), 0, 500)}}{{ strlen(strip_tags($post->body)) > 500 ? "..." : "" }}</p>
                 
                <p><a href="{{ route('blog.single', $post->slug) }}">Read more</a></p>
              @endforeach
              
            </div>
          </div>
@endsection
