@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Mark</h3>
            </div>
            <form method="post" action="{{ route('studentMark.store') }}" >
            @csrf
    <div class="box-body">
    
                
            <div class="form-group"> 
                    <div class="col-sm-6">
                        <label for="academic_years_id">Academic Year</label>
                        <select required name="academic_years_id" class="form-control" id="academic_years_id" autofocus>
                        <option value="" disabled selected>--Select--</option>
                        @foreach($academicyear as $academic)
                        <option value="{{$academic->id}}"{{ old('academic_years_id') == $academic->id ? 'selected':''}}>{{$academic->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('academic_years_id'))
                        <div class="invalid-feedback">{{ $errors->first('academic_years_id') }}</div>
                        @endif
                    </div>
            
               

                 <div class="col-sm-6">
                    <label for="class_mappings_id">Batch</label>
                    <select required name="class_mappings_id" class="form-control" id="class_mappings_id" autofocus>
                    <option value="" disabled selected>--Select--</option>
                    @foreach($class as $classes)
                    <option value="{{$classes->id}}"{{ old('class_mappings_id') == $classes->id ? 'selected':''}}>{{$classes->batchname}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('class_mappings_id'))
                    <div class="invalid-feedback">{{ $errors->first('class_mappings_id') }}</div>
                    @endif
                  </div>
                
            </div>
             

            </div>
            <div class="box-body">
            <button type="button" id="btn"  class="btn btn-primary" >Submit</button> 
                
            </div>
       
            <div class="box-body">
            <div class='form-group'>
                <div class='row'>

                <div class='col-md-4'>
                <label for="rollno">Roll No</label>
                </div>
                
                <div class='col-md-4'>
                <label for="name">Name</label>
                </div>
                
                <div class='col-md-4'>
                <label for="mark">Mark</label>
                </div>

                </div>
            </div>
         
            
          <div class="mark"></div>
          </div>
          <div class="box-body">
          <button type="submit" class="btn btn-primary mr-2">Save</button>
          </div>
          </form>
          




       
</div>


          <!-- /.box -->
@endsection
@section('scripts')
<script type="text/javascript">
var op ="";

$(document).ready(function() {
    $(document).on("click", "#btn", function(event) {  
      
       $.ajax({
        
      url: "{{ route('studentMark.getstudent') }}",
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{accademic_id: $("#academic_years_id").val() ,class_mappings_id:+ $("#class_mappings_id").val()},
      success: function(response) {
var i=1;
        op ="";
//       op+='<table class="table table-striped">';
//       op+='<thead>'
//       op+='<tr><th>Roll No</th><th>Student Name</th><th>Mark</th></tr>';
//       op+='</thead>'
//       op+='<tbody>'
//         $.each( response, function( responseKey, responseValue ) {  
//           op+='<tr><td>'+ responseValue['rollno'] +'</td><td>'+ responseValue['firstname'] +'</td><td>'+ "<input type='text' class='form-control' name='mark[" + i + "]'  required /><div class='invalid-feedback'></div>"+'</td></tr>';
//             i++;    
//       });
//       op+='</tbody>'
// op+='</table>';

$.each( response, function( responseKey, responseValue ) {  
op+="<div class='form-group'>"
                +"<div class='row'>"

                +"<div class='col-md-4'>"
                +"<label for='roll'>"+ responseValue['rollno'] +"</label>"
                +"</div>"
                
                +"<div class='col-md-4'>"
                +"<label for='name'>"+responseValue['firstname']+"</label>"
                +"</div>"
                
                +"<div class='col-md-4'>"
                +"<input type='text' class='form-control' name='marks[" + i + "]'  required /><div class='invalid-feedback'></div>"
                +"</div>"
                
                +"</div>"
            +"</div>";
            i++;    
       });
$('.mark').html(op);   
      },
      fail: function( jqXHR, textStatus ) {
        alert('fail');
     }
     
});

  
    });
  });
function getdetails() 
{

  
alert('hi');
op+='<table class="table table-striped">';

 op+='<tr><th>Roll No</th><th>Student Name</th><th>Mark</th></tr>';
 op+='</table>';
 $('#mark').html(op);    
}

    
  </script>
@endsection
