@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Exam Create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('examtype.store') }}">
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="examname">Exam</label>
                  <input type="text" name="examname" class="form-control" id="examname" placeholder="Enter Name">
                  @if ($errors->has('examname'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('examname') }}</div>
                  @endif
                </div>                

               

                <div class="form-group">
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

@endsection