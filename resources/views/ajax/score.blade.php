@extends('main')
@section('title', '| all Categories')
@section('content')
     <div class="jumbotron col-lg-8 col-lg-offset-2">
        <h3>Subcategory</h3>
       
      </div>





    <div class="row marketing">
        
        <div class="col-lg-4" style="background:#F8F8F8;padding:10px;border-radius:2px;margin-top: 0px;">
           <h3>select student</h3>
          

           <div class="form-group">
              <label for="">student</label>
              <select class="form-control input-sm" name="studentid" id="studentid">
                    @foreach($IDs as $id)
                    <option value="{{ $id->id}}">{{$id->id}}</option>

                    @endforeach
              </select>


               <table class="table">
                  <thead>
                    <tr>
                      <th>subid</th>
                      <th>subject</th>
                      <th>Score</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <td>subid</td>
                      <td>subject</td>
                      <td>Score</td>
                    </tr>
                    
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
           </div>

           

         
         
        </div>
    </div>
     
         

         
    

@endsection


@section('ownjs')



<script type="text/javascript">

     //===========================================================
    $(document).ready(function(){
      $('#studentid').on('change', function(){
        var studentid=$(this).val();
        loadScore(studentid);
      });
    });

    //=============================================================  
    function loadScore(studentid) {
        $.ajax({
            type:'get',
            url:"{{url('getDataScore')}}",
            data:{studentid:studentid},
            dataType:'json',
            success:function(data){
                $('tbody').empty();
                //=========================================
                $.each(data.studies, function(i, study){
                      var row=$('<tr/>');
                      row.append($('<td/>',{
                             text:study.subject.id,
                            })).append($('<td/>', {
                              text:study.subject.subject,
                            })).append($('<td/>', {
                               text:study.score
                            }))
                     $('tbody').append(row);
                });

                //========================================= 
                $('tfoot').empty(); 
                $('tfoot').append($('<tr>', {
                          })).append($('<td>', {
                              text:'Total',
                              colspan:2,
                              style:['background-color:#ccc;font-weight:bold;text-align:right']
                              })).append($('<td/>', {
                                text:data.total
                              }))
            }
        })
    }

    //=============================================================



  
 
</script>

@endsection
