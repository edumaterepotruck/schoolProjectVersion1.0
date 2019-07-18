@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Day Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('day.update', $day->id) }}">
            
            @method('PATCH')
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="dayname">Name</label>
                  <input type="text" name="dayname" class="form-control" id="dayname" value="{{ old('dayname', $day->dayname) }}" >
                  @if ($errors->has('dayname'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('dayname') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="order">order</label>
                  <input type="text" name="order" class="form-control" id="order" value="{{ old('order', $day->order) }}" >
                  @if ($errors->has('order'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('order') }}</div>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="record_status">Active</label>
                  <select required name="record_status" class="form-control" id="record_status">
                <option value="">--Select--</option>
                <option value="active" {{ old('record_status', $day->record_status) == "active" ? 'selected' : '' }} >Active</option>
                <option value="inactive" {{ old('record_status', $day->record_status) == "inactive" ? 'selected' : '' }} >Inactive</option>
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