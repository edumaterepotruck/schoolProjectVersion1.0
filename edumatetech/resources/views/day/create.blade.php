@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Day Create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('day.store') }}">
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="dayname">Day</label>
                  <input type="text" name="dayname" class="form-control" id="name" placeholder="Enter Name">
                  @if ($errors->has('dayname'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('dayname') }}</div>
                  @endif
                </div>                

                <div class="form-group">
                  <label for="order">Order</label>
                  <input type="number" name="order" class="form-control" id="order" placeholder="Enter Order">
                  @if ($errors->has('order'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('order') }}</div>
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