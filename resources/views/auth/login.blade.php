@extends('main')
@section('title', '| login')
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
    
      <div class="row marketing">
        <div class="col-lg-6 col-lg-offset-2">
          <h4>Login</h4>
          {!! Form::open() !!}
              {{ Form::label('email', 'Email:') }}
              {{ Form::text('email', null, array('class'=>'form-control')) }}

              {{ Form::label('password', 'Password:') }}
              {{ Form::password('password', array('class'=>'form-control')) }}
              <br>
              {{ Form::checkbox('remember') }}
              {{ Form::label('remember', 'Remember Me') }}

              {{ Form::submit('Login', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px')) }}
              <p><a href="{{ url('password/reset') }}">Forgot My Password</a></p>
          {!! Form::close() !!}
         
        </div>

        <div class="col-lg-2">
          <h4 style="background:#5CB85C;padding:10px;border-radius:2px;color:#fff;text-align:center;">Side bar</h4>
          
        </div>
    </div>

@endsection
@section('ownjs')
{!!Html::script('js/parsley.min.js')!!}
@endsection