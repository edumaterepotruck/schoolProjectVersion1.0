@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <form method="post" action="">
            @csrf
              

            <div class="form-group">
                    <label for="class_mappings_id">Batch Name</label>
                    <select required name="class_mappings_id" class="form-control" id="class_mappings_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($classMappings as $classMapping)
                    <option value="{{$classMapping->id}}">{{$classMapping->batchname}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('class_mappings_id'))
                    <div class="invalid-feedback">{{ $errors->first('class_mappings_id') }}</div>
                    @endif
                  </div>

                  </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
              </div>
            </form>

            <div id="tableview"></div> 

            <!-- <div>
            <table class="table no-margin text-center table-striped">
          <thead>
            <tr>
            <th></th>
              <th>Member ID</th>
              <th>Society Name</th>
              <th>Wing</th>
              <th>Member Name</th>
              <th>Flat Number</th>
            </tr>
          </thead>
          <tbody>
          
            <tr>
              <th>abc</th>
              <td>hhgh</td>
              <td>hhgh</td>
              <td>sdsd</td>
              <td>sds</td> 
              <td>dd</td>
            </tr>
          
          </tbody>
        </table>
        </div> -->
          </div>
          <!-- /.box -->
@endsection
@section('scripts')

<script type="text/javascript">
 $(document).ready(function(){
  $('#religion_id').trigger('change');

});

var op ="";

  $( "form" ).on('change', '#class_mappings_id', function() {
    $.ajax({
      url: "{{ route('timeTable.getTimeTablebyBatch') }}",
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{class_mappings_id: + $(this).val()},
      success: function(response) {
        //alert(JSON.stringify(response));
        op+='<table class="table table-striped">';
        op+='<tr>';
        $.each( response, function( responseKey, responseValue ) {
            alert(JSON.stringify(responseValue));
           // alert(responseValue);
            //op+='<th>'+responseValue['period']+'</th>';
            $.each( responseValue, function( responseKey1, responseValue ) {
            //alert(JSON.stringify(responseValue));
            ///alert(responseValue['period']);
            op+='<th>'+responseValue+'</th>';
          });
          });
          op+='</tr>';
    //------------------------------
    
       // op+='<tr><th>SN</th><th>Date</th><th>Account Type</th><th>Account Code</th><th>Narration</th><th>Amount</th></tr>';
        // for(var i=0;i<response.length;i++){
        //   op+='<tr>';
        //   op+='<td>'+(i+1)+'</td><td>'+data2[i].transdate+'</td><td>'+data2[i].acctype+'</td><td>'+data2[i].accounts_code+'</td><td>'+data2[i].narration+'</td><td>'+data2[i].amount+'</td></tr>';
        // }
         op+='</table>';
         $('#tableview').html(op);
    //-------------------------------

      },
      fail: function( jqXHR, textStatus ) {
      
     }
   });

  });



  </script>
@endsection
