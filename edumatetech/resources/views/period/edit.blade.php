@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Period Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('period.update', $period->id) }}">
            
            @method('PATCH')
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="periodname">Name</label>
                  <input type="text" name="periodname" class="form-control" id="periodname" value="{{ old('periodname', $period->periodname) }}" >
                  @if ($errors->has('periodname'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('periodname') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="order">order</label>
                  <input type="text" name="order" class="form-control" id="order" value="{{ old('order', $period->order) }}" >
                  @if ($errors->has('order'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('order') }}</div>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="record_status">Active</label>
                  <select required name="record_status" class="form-control" id="record_status">
                <option value="">--Select--</option>
                <option value="active" {{ old('record_status', $period->record_status) == "active" ? 'selected' : '' }} >Active</option>
                <option value="inactive" {{ old('record_status', $period->record_status) == "inactive" ? 'selected' : '' }} >Inactive</option>
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