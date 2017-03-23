@extends('main')
@section('title', '| create new checkbox')
@section('owncss')


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
          {!! Form::open(array('route' => 'checks.store')) !!}
             <div class="checkbox">
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" name="checkbox[]" value="option1"> 1
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" name="checkbox[]" value="option2"> 2
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" name="checkbox[]" value="option3"> 3
                  </label>
            </div>
              {{ Form::submit('Create chekbox', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px')) }}
          {!! Form::close() !!}
         
        </div>

        <div class="col-lg-2">
          <h4 style="background:#5CB85C;padding:10px;border-radius:2px;color:#fff;text-align:center;">Side bar</h4>
          
        </div>
    </div>

@endsection
@section('ownjs')
<script>

</script>
@endsection