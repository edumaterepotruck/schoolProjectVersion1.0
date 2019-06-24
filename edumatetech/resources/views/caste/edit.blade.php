@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Caste</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('caste.update', $data->id) }}">
            
            @method('PATCH')
            @csrf
              <div class="box-body">

              <div class="form-group">
                  <label for="name">Caste</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $data->caste) }}" >
                  @if ($errors->has('name'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('name') }}</div>
                  @endif
                </div>
            
              <div class="form-group">
                    <label for="religion_id">Religion</label>
                    <select required name="religion_id" class="form-control" id="religion_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($religions as $religion)
                    <option value="{{$religion->id}}" {{ old('religions_id', $data->religion) == $religion->id ? 'selected' : ''  }} >{{$religion->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('religion_id'))
                    <div class="invalid-feedback">{{ $errors->first('religion_id') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="caste_categories_id">Caste Category</label>
                    <select required name="caste_categories_id" class="form-control" id="caste_categories_id">
                    <option value="" disabled selected>--Select--</option>
                    @foreach($caste_categories as $caste_categorie)
                    <option value="{{$caste_categorie->id}}" {{ old('caste_categories_id', $data->caste_categorie) == $caste_categorie->id ? 'selected' : ''  }} >{{$caste_categorie->name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('class_division_id'))
                    <div class="invalid-feedback">{{ $errors->first('caste_categories_id') }}</div>
                    @endif
                  </div>

                 
               

                  
                  <div class="form-group">
                  <label for="record_status">Active</label>
                  <select required name="record_status" class="form-control" id="record_status">
                <option value="">--Select--</option>
                <option value="active" {{ old('record_status', $data->record_status) == "active" ? 'selected' : '' }} >Active</option>
                <option value="inactive" {{ old('record_status', $data->record_status) == "inactive" ? 'selected' : '' }} >Inactive</option>
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