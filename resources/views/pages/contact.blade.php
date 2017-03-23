@extends('main')
@section('title', '| contact')
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Jumbotron heading</h3>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6 col-lg-offset-2">
          <h4>Contact Us</h4>
            <form action="{{ url('contact') }}" method="POST">
               {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Subject</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="subject" name="subject">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Message</label>
               <textarea class="form-control" rows="3" name="message"></textarea>
              </div>
              
              <input type="submit" value="Send Message" class="btn btn-primary btn-lg btn-block">
            </form>
        </div>

        <div class="col-lg-2">
          <h4 style="background:#5CB85C;padding:10px;border-radius:2px;color:#fff;text-align:center;">Side bar</h4>
          
        </div>
      </div>
      


  @endsection
