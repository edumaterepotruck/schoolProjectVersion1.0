@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">AcademicYear Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('academicyear.update', $academicyear->id) }}">
            
            @method('PATCH')
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $academicyear->name) }}" >
                  @if ($errors->has('name'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('name') }}</div>
                  @endif
                </div>


                <div class="form-group">
                  <label for="from">From</label>
                  <input type="date" name="from" class="form-control" id="from" value="{{ old('from', $academicyear->from) }}">
                  @if ($errors->has('from'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('from') }}</div>
                  @endif
                </div>      

                <div class="form-group">
                  <label for="to">Role</label>
                  <input type="date" name="to" class="form-control" id="to" value="{{ old('to', $academicyear->to) }}">
                  @if ($errors->has('to'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('to') }}</div>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="record_status">Active</label>
                  <select required name="record_status" class="form-control" id="record_status">
                <option value="">--Select--</option>
                <option value="active" {{ old('record_status', $academicyear->record_status) == "active" ? 'selected' : '' }} >Active</option>
                <option value="inactive" {{ old('record_status', $academicyear->record_status) == "inactive" ? 'selected' : '' }} >Inactive</option>
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