@extends('main')
@section('title', '| create new post')
@section('owncss')
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/select2.min.css')!!}

@endsection
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
    
      <div class="row marketing">
        <div class="col-lg-6 col-lg-offset-2">
          <h4>Create New Post</h4>
          {!! Form::open(array('route' => 'posts.store', 'files' => true)) !!}
              {{ Form::label('title', 'Title:') }}
              {{ Form::text('title', null, array('class'=>'form-control')) }}

              {{ Form::label('slug', 'Slug:') }}
              {{ Form::text('slug', null, array('class'=>'form-control')) }}
               
               {{Form::label('category_id', 'Category')}}
               <select class="form-control" name="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>

              {{Form::label('tags', 'Tag')}}
               <select class="form-control multi-select" name="tags[]" multiple="multiple">
                  @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
               </select>

              {{ Form::label('photo', 'Photo:') }}
              {{ Form::file('photo', null, array('class'=>'form-control')) }}


              {{ Form::label('body', 'Body:') }}
              {{ Form::textarea('body', null, array('class'=>'form-control', 'id'=>'mytextarea')) }}

              {{ Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px')) }}
          {!! Form::close() !!}
         
        </div>

        <div class="col-lg-2">
          <h4 style="background:#5CB85C;padding:10px;border-radius:2px;color:#fff;text-align:center;">Side bar</h4>
          
        </div>
    </div>

@endsection
@section('ownjs')
{!!Html::script('js/parsley.min.js')!!}
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript">
    $(".multi-select").select2();
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