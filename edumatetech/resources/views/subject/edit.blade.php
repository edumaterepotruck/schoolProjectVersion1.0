@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Subject Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('subject.update', $subject->id) }}">
            
            @method('PATCH')
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $subject->name) }}" >
                  @if ($errors->has('name'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('name') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="subtype">Active</label>
                  <select required name="subtype" class="form-control" id="record_status">
                <option value="">--Select--</option>
                <option value="secondary" {{ old('subtype', $subject->subtype) == "secondary" ? 'selected' : '' }} >Secondary</option>
                <option value="highersecondary" {{ old('highersecondary', $subject->subtype) == "inactive" ? 'selected' : '' }} >Higher Secondary</option>
                </select>
                  @if ($errors->has('subtype'))
                  <div class="invalid-feedback">{{ $errors->first('subtype') }}</div>
                  @endif
                </div>
               
       
                
                <div class="form-group">
                  <label for="record_status">Active</label>
                  <select required name="record_status" class="form-control" id="record_status">
                <option value="">--Select--</option>
                <option value="active" {{ old('record_status', $subject->record_status) == "active" ? 'selected' : '' }} >Active</option>
                <option value="inactive" {{ old('record_status', $subject->record_status) == "inactive" ? 'selected' : '' }} >Inactive</option>
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