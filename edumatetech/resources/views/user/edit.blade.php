@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Role Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('user.update', $user->id) }}">
            
            @method('PATCH')
            @csrf
              <div class="box-body">
            
                <div class="form-group">
                      <label for="name"> Name</label>                            
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror                      
                  </div>


                  <div class="form-group">
                    <label for="role_id">Role</label>
                    <select required name="role_id" class="form-control" id="role_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}"  >{{$role->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('role'))
                    <div class="invalid-feedback">{{ $errors->first('role') }}</div>
                    @endif
                  </div>


                  <div class="form-group">
                    <label for="email" >{{ ('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror                      
                  </div>

                  
                  <div class="form-group">
                  <label for="record_status">Active</label>
                  <select required name="record_status" class="form-control" id="record_status">
                <option value="">--Select--</option>
                <option value="active" {{ old('record_status', $user->record_status) == "active" ? 'selected' : '' }} >Active</option>
                <option value="inactive" {{ old('record_status', $user->record_status) == "inactive" ? 'selected' : '' }} >Inactive</option>
                </select>
                  @if ($errors->has('record_status'))
                  <div class="invalid-feedback">{{ $errors->first('record_status') }}</div>
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
@endsection

@section('scripts')

@endsection