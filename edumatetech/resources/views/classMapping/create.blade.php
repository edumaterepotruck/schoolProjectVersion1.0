@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Class Mapping</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('classMapping.store') }}">
            @csrf
              <div class="box-body">
              
             
                  <div class="form-group">
                    <label for="class_detail_id">Class</label>
                    <select required name="class_detail_id" class="form-control" id="class_detail_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($class as $classdiv)
                    <option value="{{$classdiv->id}}">{{$classdiv->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('class_detail_id'))
                    <div class="invalid-feedback">{{ $errors->first('class_detail_id') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="class_division_id">Division</label>
                    <select required name="class_division_id" class="form-control" id="class_division_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($divisions as $division)
                    <option value="{{$division->id}}">{{$division->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('class_division_id'))
                    <div class="invalid-feedback">{{ $errors->first('class_division_id') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="class_branch_id">Branch</label>
                    <select  name="class_branch_id" class="form-control" id="class_branch_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($branchs as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('class_branch_id'))
                    <div class="invalid-feedback">{{ $errors->first('class_branch_id') }}</div>
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