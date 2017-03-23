@extends('main')
@section('title', '| all Categories')
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Subcategory</h3>
       
      </div>
    <div class="row marketing">
        
        <div class="col-lg-4" style="background:#F8F8F8;padding:10px;border-radius:2px;margin-top: 0px;">
           <h3>cateogry and subcategory</h3>
           {!! Form::open(array('url'=>'')) !!}

           <div class="form-group">
              <label for="">Category</label>
              <select class="form-control input-sm" name="category" id="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id}}">{{$category->name}}</option>

                    @endforeach
              </select>
           </div>

           <div class="form-group">
              <label for="">Subcategories</label>
              <select class="form-control input-sm" name="subcategory" id="subcategory">
                <option value=""></option>
              </select>
           </div>

            {{ Form::submit('Sub category', ['class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px']) }}

           {!! Form::close() !!}
         
        </div>
    </div>
     
         

         
    

@endsection


@section('ownjs')



<script type="text/javascript">


     $('#category').on('change', function(e){
        var cat_id=e.target.value;

        $.get('{{ URL::to('ajax-subcat') }}?cat_id=' + cat_id, function(data){
             console.log(data);
              $('#subcategory').empty();
               $.each(data, function(index, subcatObj){
               $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>')

               });



        });
      });




  
 
</script>>

@endsection
