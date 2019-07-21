@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Time-Table </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('timeTable.store') }}">
            @csrf
              <div class="box-body">
              
              
                  <div class="form-group">
                    <label for="class_mappings_id">Batch Name</label>
                    <select required name="class_mappings_id" class="form-control" id="class_mappings_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($classMappings as $classMapping)
                    <option value="{{$classMapping->id}}">{{$classMapping->batchname}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('class_mappings_id'))
                    <div class="invalid-feedback">{{ $errors->first('class_mappings_id') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="days_id">Day</label>
                    <select required name="days_id" class="form-control" id="days_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($days as $day)
                    <option value="{{$day->id}}">{{$day->dayname}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('days_id'))
                    <div class="invalid-feedback">{{ $errors->first('days_id') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="periods_id">Period</label>
                    <select required name="periods_id" class="form-control" id="periods_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($periods as $period)
                    <option value="{{$period->id}}">{{$period->periodname}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('periods_id'))
                    <div class="invalid-feedback">{{ $errors->first('periods_id') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="subjects_id">Subject</label>
                    <select required name="subjects_id" class="form-control" id="subjects_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('subjects_id'))
                    <div class="invalid-feedback">{{ $errors->first('subjects_id') }}</div>
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