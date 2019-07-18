@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Religion Create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('subject.store') }}">
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="name">Religion</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  @if ($errors->has('name'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('name') }}</div>
                  @endif
                </div>                

                <div class="form-group">
                  <label for="subtype">Active</label>
                  <select required name="subtype" class="form-control" id="subtype">
                <option value="">--Select--</option>
                <option value="secondary">Secondary</option>
                <option value="highersecondary">Higher Secondary</option>
                </select>
                  @if ($errors->has('subtype'))
                  <div class="invalid-feedback">{{ $errors->first('subtype') }}</div>
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