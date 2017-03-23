@extends('main')
@section('title', '| edit post')
@section('owncss')
{!!Html::style('css/select2.min.css')!!}
@endsection
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
    
      <div class="row marketing">
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'files' => true, 'method'=>'PUT']) !!}
        <div class="col-lg-4 col-lg-offset-2">
          <h3 style="color:#5CB85C">Edit Post</h3>
          
          {{ Form::label('title', 'Title') }}
          {{ Form::text('title', null, ['class'=>'form-control input-lg']) }}

          {{ Form::label('slug', 'Slug') }}
          {{ Form::text('slug', null, ['class'=>'form-control input-lg']) }}

          {{ Html::image('/uploads/logo/'.$post->photo, $post->title, array( 'width' => 70, 'height' => 70 )) }}
          {{ Form::label('photo', 'Photo:') }}
          {{ Form::file('photo', null, array('class'=>'form-control')) }}

          {{ Form::label('category_id', 'Category:') }}
          {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}

          {{ Form::label('tags', 'Tags:') }}
          {{ Form::select('tags[]', $tags, null, ['class'=>'form-control multi-select', 'multiple'=>'multiple']) }}

          {{ Form::label('body', 'Body:', ['class'=>'form-spacing-top']) }}
          {{ Form::textarea('body', null, ['class'=>'form-control input-lg', 'id'=>'mytextarea']) }}
         
        </div>

        <div class="col-lg-4">
          <div style="background:#E7E7E7;border-radius:2px;text-align:center;padding-bottom:10px;overflow: hidden;">
            <h4 style="background:#5CB85C;padding:10px;border-radius:2px;color:#fff;text-align:center;margin-top: 0px;">Deatils Controll</h4>
              
              <dl class="dl-horizontal">
                <dt>Created Date:</dt>
                <dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
                <dt>Updated Date:</dt>
                 <dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
              </dl>
             
              <div clas="row">
                  <div class="col-lg-6">

                     {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
                   
                  </div>
                  <div class="col-lg-6">
                   
                   {{ Form::submit('Save Change', ['class'=>'btn btn-success btn-block']) }}
                  </div>
              </div>
              
          </div>
        </div>
        {!! Form::close() !!}
      </div>

@endsection
@section('ownjs')
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript">
    $(".multi-select").select2();
    $(".multi-select").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger("change");
</script>

<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
    plugin: 'link code',
     menubar: false
  });
</script>

@endsection