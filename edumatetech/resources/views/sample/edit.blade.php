@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('sample.update', $sample->id) }}">
            
            @method('PATCH')
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="name">Email address</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $sample->name) }}" >
                  @if ($errors->has('name'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="text" name="email" class="form-control" id="email" value="{{ old('email', $sample->email) }}" >
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" name="password" class="form-control" id="password" value="{{ old('password', $sample->password) }}" >
                </div>

                <div class="form-group">
                  <label for="active">Active</label>
                  <input type="text" name="active" class="form-control" id="active" value="{{ old('active', $sample->active) }}">
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