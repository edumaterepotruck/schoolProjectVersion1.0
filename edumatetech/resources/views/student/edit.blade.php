@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <form method="post" action="{{ route('student.update', $data->id) }}">
            
            @method('PATCH')
            @csrf

            <div class="form-group">
                  <div class="col-sm-6">
                      <label for="firstname"> First Name</label>                            
                      <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $data->firstname) }}" required autocomplete="firstname" autofocus>
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
                      <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $data->lastname) }}" required autocomplete="name" autofocus>
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
                  <option value="male" {{ old('gender', $data->gender) == "male" ? 'selected' : '' }}>Male</option>
                  <option value="female" {{ old('gender', $data->gender) == "female" ? 'selected' : '' }}>Female</option>
                  <option value="others" {{ old('gender', $data->gender) == "others" ? 'selected' : '' }}>Others</option>
                  </select>
                  @if ($errors->has('gender'))
                  <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                  @endif
                </div>
                </div> 


                <div class="form-group">
                <div class="col-sm-6">
                  <label for="dob">D.O.B</label>
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter D.O.B " value="{{ old('lastname', $data->dob) }}">
                  @if ($errors->has('dob'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('dob') }}</div>
                  @endif
                </div> 
                </div>   



                <div class="form-group">
                <div class="col-sm-6">
                      <label for="identification"> Identification</label>                            
                      <input id="identification" type="text" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('lastname', $data->identification) }}" required autocomplete="identification" autofocus>
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
                  <input type="text" name="bloodGroup" class="form-control" id="bloodGroup" placeholder="Blood Group" value="{{ old('lastname', $data->bloodGroup) }}">
                  @if ($errors->has('bloodGroup'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('bloodGroup') }}</div>
                  @endif
                </div> 
                </div>  

                
                <div class="form-group">                
                 <div class="col-sm-6">
                  <label for="admission_date">Admission Date</label>
                  <input type="date" name="admission_date" class="form-control" id="admission_date" placeholder="Enter Admission Date " value="{{ old('lastname', $data->admission_date) }}">
                  @if ($errors->has('admission_date'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('admission_date') }}</div>
                  @endif
                </div>   
                </div>

                <div class="form-group">                 
                <div class="col-sm-6">
                  <label for="admissionno">Admission No</label>
                  <input type="number" name="admission_no" class="form-control" id="admission_no" placeholder="Enter Admission No " value="{{ old('lastname', $data->admission_no) }}">
                  @if ($errors->has('admission_date'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('admission_date') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">                 
                <div class="col-sm-6">
                  <label for="rollno">Roll No</label>
                  <input type="number" name="rollno" class="form-control" id="rollno" placeholder="Enter Roll No " value="{{ old('lastname', $data->rollno) }}">
                  @if ($errors->has('rollno'))
            <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('rollno') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">                 
                <div class="col-sm-6">
                  <label for="registration_no">Registration No</label>
                  <input type="number" name="registration_no" class="form-control" id="registration_no" placeholder="Enter Registration No " value="{{ old('lastname', $data->registration_no) }}">
                  @if ($errors->has('registration_no'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('registration_no') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">   
                  <div class="col-sm-6">
                  <label for="gaurdianName">Gaurdian Name</label>
                  <input type="text" name="gaurdianName" class="form-control" id="gaurdianName" placeholder="Gaurdian Name" value="{{ old('lastname', $data->gaurdianName) }}">
                  @if ($errors->has('gaurdianName'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('gaurdianName') }}</div>
                  @endif
                </div>  
                </div>


                <div class="form-group"> 
                <div class="col-sm-6">
                  <label for="gaurdianRelation">Gaurdian Relation</label>
                  <input type="text" name="gaurdianRelation" class="form-control" id="gaurdianRelation" placeholder="Gaurdian Relation" value="{{ old('lastname', $data->gaurdianRelation) }}">
                  @if ($errors->has('gaurdianRelation'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('gaurdianRelation') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="mobile">Mobile No</label>
                  <input type="tel" name="mobile" class="form-control" id="mobile" pattern="[0-9]{10}" placeholder="Enter Mobile No " value="{{ old('lastname', $data->mobile) }}">
                  @if ($errors->has('mobile'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('mobile') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="alt_mobile">Alternate Mobile No</label>
                  <input type="tel" name="alt_mobile" class="form-control" id="alt_mobile" pattern="[0-9]{10}" placeholder="Enter Mobile No " value="{{ old('lastname', $data->alt_mobile) }}">
                  @if ($errors->has('alt_mobile'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('alt_mobile') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                  <label for="telephone">Telephone No</label>
                  <input type="number" name="telephone" class="form-control" id="telephone" placeholder="Enter telephone No " value="{{ old('lastname', $data->telephone) }}">
                  @if ($errors->has('telephone'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('telephone') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">  
                <div class="col-sm-6">
                  <label for="email" >{{ ('E-Mail Address') }}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('lastname', $data->email) }}" required autocomplete="email">
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
                  <textarea id="address1" name="address1" class="form-control" >{{ old('lastname', $data->address1) }}</textarea>
                  @if ($errors->has('address1'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('address1') }}</div>
                  @endif
                </div>  
                </div>

                <div class="form-group">
                  <div class="col-sm-6">
                  <label for="address2">Address 2</label>
                  <textarea id="address2" name="address2" class="form-control" >{{ old('lastname', $data->address2) }}</textarea>
                  @if ($errors->has('address2'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('address2') }}</div>
                  @endif
                </div>  
                </div>

               

                <div class="form-group"> 
                 <div class="col-sm-6">
                  <label for="country">Country</label>
                  <input type="text" name="country" class="form-control" id="country" placeholder="Country" value="{{ old('lastname', $data->country) }}">
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
                  <input type="text" name="state" class="form-control" id="state" placeholder="State" value="{{ old('lastname', $data->state) }}">
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
                  <input type="text" name="district" class="form-control" id="district" placeholder="District" value="{{ old('lastname', $data->district) }}">
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
                  <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ old('lastname', $data->city) }}">
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
                    <option value="{{$religion->id}}" {{ old('religion_id', $data->religion_id) == $religion->id ? 'selected' : ''  }} >{{$religion->name}}</option>
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
                    <!-- @foreach($castes as $caste) -->
                    <!-- <option value="{{$caste->id}}"{{ old('caste_id', $data->caste_id) == $caste->id ? 'selected' : ''  }} >{{$caste->name}}</option> -->
                    <!-- @endforeach -->
                    </select>
                    @if ($errors->has('caste_id'))
                    <div class="invalid-feedback">{{ $errors->first('caste_id') }}</div>
                    @endif
                  </div>
                  </div>

                  <div class="form-group">
                  <div class="col-sm-12">
                  <label for="pincode">Pincode</label>
                  <input type="number" name="pincode" class="form-control" id="pincode" placeholder="pincode" value="{{ old('pincode', $data->pincode) }}">
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
                <option value="active" {{ old('record_status', $data->record_status) == "active" ? 'selected' : '' }} >Active</option>
                <option value="inactive" {{ old('record_status', $data->record_status) == "inactive" ? 'selected' : '' }} >Inactive</option>
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
   
          if('{{$data->caste_id}}' == responseValue.id){
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