@extends('main')
@section('title', '| show post')

@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
    
      <div class="row marketing">
        <div class="col-lg-4 col-lg-offset-2" style="text-align:justify;">
          <h3 style="color:#5CB85C">Details</h3>
          <h4>{{$post->title}}</h4>
          <p><strong>Post Date: </strong>{{$post->created_at}}</p>
          <p><strong>Current cat: </strong>{{ $post->category->name }}</p>

          <p>{{strip_tags($post->body)}}</p>
          {{ Html::image('/uploads/logo/'.$post->photo, $post->title, array( 'width' => 70, 'height' => 70 )) }}

          <hr>

          <p>
            Comment number::{{ $post->comments()->count() }}
          </p>
            <table class="table">
                <thead>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Comment</th>
                          <th width="80px"></th>
                      </tr>
                </thead>
                <tbody>
                    @foreach($post->comments as $comment)
                      <tr>
                          <td>{{ $comment->name }}</td>
                          <td>{{ $comment->email }}</td>
                          <td>{{ $comment->comment }}</td>
                          <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                          </td>
                      </tr>
                    @endforeach
                <tbody>
            </table>
          <hr>

          <p>
          @foreach($post->tags as $tag)
              <strong>{{$tag->name}}, </strong>
          @endforeach
          </p>

        </div>
        <hr>
        <div class="col-lg-4">
          <div style="background:#E7E7E7;border-radius:2px;text-align:center;padding-bottom:10px;overflow: hidden;">

            <h4 style="background:#5CB85C;padding:10px;border-radius:2px;color:#fff;text-align:center;margin-top: 0px;">Deatils Controll</h4>
              <p>
            <a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug) }} </a>
              </p>
              <dl class="dl-horizontal">
                <dt>Created Date:</dt>
                <dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
                <dt>Updated Date:</dt>
                 <dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
              </dl>
             
              <div clas="row">
                  <div class="col-lg-6">
                     {!!Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-success btn-block'))!!}
                   
                  </div>
                  <div class="col-lg-6">
                    {!! Form::open(['route'=>['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                    {{ Html::linkRoute('posts.index', '<< See All Posts', array(), ['class'=>'btn btn-block btn-default']) }}
                  </div>
              </div>
              
          </div>
        </div>
      </div>

@endsection
