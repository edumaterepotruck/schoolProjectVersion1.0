@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Create</h3>
            </div>
            @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <form method="post" action="{{ route('student.store') }}">
            @csrf
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
                  </div>

                  <div class="form-group"> 
                 <div class="col-sm-6">
                    <label for="class_mappings_id">Batch</label>
                    <select required name="class_mappings_id" class="form-control" id="religion_id" autofocus>
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

              
                  <div class="form-group">
                  <div class="col-sm-6">
                      <label for="firstname"> First Name</label>                            
                      <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                      @error('firstname')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror 
                      </div>                     
                  </div>

                  <div class="form-group">
                  <div class="col-sm-6">
                      <label for="lastname"> Second Name</label>                            
                      <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>
                      @error('lastname')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror 
                      </div>                     
                  </div>

                  <div class="form-group">
                  <div class="col-sm-6">
                  <label for="gender">Gender</label>
                  <select required name="gender" class="form-control" id="gender">
                  <option value="">--Select--</option>
                  <option value="male" {{old('gender',request()->get('gender')) == 'male' ? 'selected':''}}>Male</option>
                  <option value="female" {{old('gender',request()->get('gender')) == 'female' ? 'selected':''}}>Female</option>
                  <option value="others" {{old('gender',request()->get('gender')) == 'others' ? 'selected':''}}>Others</option>
                  </select>
                  @if ($errors->has('gender'))
                  <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                  @endif
                </div>
                </div> 


                <div class="form-group">
                <div class="col-sm-6">
                  <label for="dob">D.O.B</label>
                  <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}" placeholder="Enter D.O.B ">
                  @if ($errors->has('dob'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('dob') }}</div>
                  @endif
                </div> 
                </div>   



                <div class="form-group">
                <div class="col-sm-6">
                      <label for="identification"> Identification</label>                            
                      <input id="identification" type="text" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('identification') }}" required autocomplete="identification" autofocus>
                      @error('identification')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror                      
                  </div>
                  </div> 



                <div class="form-group">
                <div class="col-sm-6">
                  <label for="bloodGroup">Blood Group</label>
                  <input type="text" name="bloodGroup" class="form-control" id="bloodGroup" value="{{ old('bloodGroup') }}" placeholder="Blood Group">
                  @if ($errors->has('bloodGroup'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('bloodGroup') }}</div>
                  @endif
                </div> 
                </div>  

                
                <div class="form-group">                
                 <div class="col-sm-6">
                  <label for="admission_date">Admission Date</label>
                  <input type="date" name="admission_date" class="form-control" id="admission_date" value="{{ old('admission_date') }}" placeholder="Enter Admission Date ">
                  @if ($errors->has('admission_date'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('admission_date') }}</div>
                  @endif
                </div>   
                </div>

                <div class="form-group">                 
                <div class="col-sm-6">
                  <label for="admissionno">Admission No</label>
                  <input type="number" name="admission_no" class="form-control" id="admission_date" value="{{ old('admission_date') }}" placeholder="Enter Admission No ">
                  @if ($errors->has('admission_date'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('admission_date') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">                 
                <div class="col-sm-6">
                  <label for="rollno">Roll No</label>
                  <input type="number" name="rollno" class="form-control" id="rollno" value="{{ old('rollno') }}" placeholder="Enter Roll No ">
                  @if ($errors->has('rollno'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('rollno') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">                 
                <div class="col-sm-6">
                  <label for="registration_no">Registration No</label>
                  <input type="number" name="registration_no" class="form-control" id="registration_no" value="{{ old('registration_no') }}" placeholder="Enter Registration No ">
                  @if ($errors->has('registration_no'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('registration_no') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">   
                  <div class="col-sm-6">
                  <label for="gaurdianName">Gaurdian Name</label>
                  <input type="text" name="gaurdianName" class="form-control" id="gaurdianName" value="{{ old('gaurdianName') }}" placeholder="Gaurdian Name">
                  @if ($errors->has('gaurdianName'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('gaurdianName') }}</div>
                  @endif
                </div>  
                </div>


                <div class="form-group"> 
                <div class="col-sm-6">
                  <label for="gaurdianRelation">Gaurdian Relation</label>
                  <input type="text" name="gaurdianRelation" class="form-control" id="gaurdianRelation" value="{{ old('gaurdianRelation') }}" placeholder="Gaurdian Relation">
                  @if ($errors->has('gaurdianRelation'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('gaurdianRelation') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="mobile">Mobile No</label>
                  <input type="tel" name="mobile" class="form-control" id="mobile" pattern="[0-9]{10}" value="{{ old('mobile') }}" placeholder="Enter Mobile No ">
                  @if ($errors->has('mobile'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('mobile') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="alt_mobile">Alternate Mobile No</label>
                  <input type="tel" name="alt_mobile" class="form-control" id="alt_mobile" pattern="[0-9]{10}" value="{{ old('alt_mobilet') }}" placeholder="Enter Mobile No ">
                  @if ($errors->has('alt_mobile'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('alt_mobile') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                  <label for="telephone">Telephone No</label>
                  <input type="number" name="telephone" class="form-control" id="telephone" value="{{ old('telephone') }}" placeholder="Enter telephone No ">
                  @if ($errors->has('telephone'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('telephone') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">  
                <div class="col-sm-6">
                  <label for="email" >{{ ('E-Mail Address') }}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror                      
                </div>
                </div>

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="address1">Address 1</label>
                  <textarea id="address1" name="address1" class="form-control">{{ old('address1') }}</textarea>
                  @if ($errors->has('address1'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('address1') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                  <label for="address2">Address 2</label>
                  <textarea id="address2" name="address2" class="form-control">{{ old('address2') }}</textarea>
                  @if ($errors->has('address2'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('address2') }}</div>
                  @endif
                </div>  
                </div>

               

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="country">Country</label>
                  <input type="text" name="country" class="form-control" id="country" value="{{ old('country') }}" placeholder="Country">
                  <!-- <select required name="country" class="form-control" id="country">
                  <option value="">--Select--</option>
                  <option value="active">India</option>
                  <option value="inactive">China</option>
                  </select> -->
                  @if ($errors->has('country'))
                  <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                  @endif
                </div>
                </div>

                <div class="form-group">  
                <div class="col-sm-6">
                  <label for="state">State</label>
                  <input type="text" name="state" class="form-control" id="state" value="{{ old('state') }}" placeholder="State">
                  <!-- <select required name="state" class="form-control" id="state">
                  <option value="">--Select--</option>
                  <option value="active">Kerala</option>
                  <option value="inactive">Tamil Nadu</option>
                  </select> -->
                  @if ($errors->has('state'))
                  <div class="invalid-feedback">{{ $errors->first('state') }}</div>
                  @endif
                </div>
                </div>

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="district">District</label>
                  <input type="text" name="district" class="form-control" id="district" value="{{ old('district') }}" placeholder="District">
                  <!-- <select required name="district" class="form-control" id="district">
                  <option value="">--Select--</option>
                  <option value="active">Kottayam</option>
                  <option value="inactive">Idukki</option>
                  </select> -->
                  @if ($errors->has('district'))
                  <div class="invalid-feedback">{{ $errors->first('district') }}</div>
                  @endif
                </div>
                </div>

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="city">City</label>
                  <input type="text" name="city" class="form-control" id="city" value="{{ old('city') }}" placeholder="City">
                  @if ($errors->has('city'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('city') }}</div>
                  @endif
                </div>  
                </div>
                

                <div class="form-group"> 
                 <div class="col-sm-6">
                    <label for="religion_id">Religion</label>
                    <select required name="religion_id" class="form-control" id="religion_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($religions as $religion)
                    <option value="{{$religion->id}}"{{ old('religion_id') == $religion->id ? 'selected':''}}>{{$religion->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('religion_id'))
                    <div class="invalid-feedback">{{ $errors->first('religion_id') }}</div>
                    @endif
                  </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                    <label for="caste_id">Caste</label>
                    <select required name="caste_id" class="form-control" id="caste_id">
                    <option value="" disabled selected>--Select--</option>
                    <!-- @foreach($castes as $caste)
                    <option value="{{$caste->id}}">{{$caste->name}}</option>
                    @endforeach -->
                    </select>
                    @if ($errors->has('caste_id'))
                    <div class="invalid-feedback">{{ $errors->first('caste_id') }}</div>
                    @endif
                  </div>
                  </div>

                  <div class="form-group">
                  <div class="col-sm-12">
                  <label for="pincode">Pincode</label>
                  <input type="number" name="pincode" class="form-control" id="pincode" value="{{ old('pincode') }}" placeholder="pincode">
                  @if ($errors->has('pincode'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('pincode') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">  
                <div class="col-sm-12">
                  <label for="record_status">Active</label>
                  <select required name="record_status" class="form-control" id="record_status">
                  <option value="">--Select--</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                  </select>
                  @if ($errors->has('record_status'))
                  <div class="invalid-feedback">{{ $errors->first('record_status') }}</div>
                  @endif
                </div>
                </div>

               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
@endsection
@section('scripts')

<script type="text/javascript">
 $(document).ready(function(){
  $('#religion_id').trigger('change');

});

  $( "form" ).on('change', '#religion_id', function() {
    $.ajax({
      url: "{{ route('caste.getCastebyReligion') }}",
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{religion_id: + $(this).val()},
      success: function(response) {

        $("#caste_id").empty();
        $("#caste_id").append('<option value="" selected disabled>--Select--</option>');
        var selectedval = '';
        $.each( response, function( responseKey, responseValue ) {  
          if('{{old("caste_id",request()->get('caste_id'))}}' == responseValue.id){
           selectedval = 'selected';
         }else{
          selectedval = '';
         }
        $("#caste_id").append('<option value="'+responseValue.id+'" '+selectedval+'>'+responseValue.name+'</option>');                  
      });

      },
      fail: function( jqXHR, textStatus ) {
       $("#caste_id").empty();
     }
   });

  });



  </script>
@endsection
