@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('sample.store') }}">
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="name">Email address</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  @if ($errors->has('name'))
                  <div class="invalid-feedback"  style="color:Tomato;">{{ $errors->first('name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                  @if ($errors->has('email'))
                  <div class="invalid-feedback" >{{ $errors->first('email') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                  @if ($errors->has('password'))
                  <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="active">Active</label>
                  <input type="text" name="active" class="form-control" id="active" placeholder="active">
                  @if ($errors->has('active'))
                  <div class="invalid-feedback">{{ $errors->first('active') }}</div>
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