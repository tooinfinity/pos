@extends('layouts.main')

@section('page')
  Create Moderators 
@stop 

@section('content')

          <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header with-border">
                  <h3 class="card-title">Create a new Moderator</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  
                      
                      <form action="{{ route('moderator.store') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="row">
                          <div class="col-md-6">
                              @include('partials._errors')
                            <div class="form-group">
                              <label>first name</label>
                              <input type="text" name="first_name" id="" class="form-control" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="form-group">
                              <label>last name</label>
                              <input type="text" name="last_name" id="" class="form-control" value="{{ old('last_name') }}" required>
                            </div>
                              <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" id="" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label>Password Confirmation</label>
                              <input type="password" name="password_confirmation" id="" class="form-control" required>
                            </div>
                          </div>
                         </div>
                          <div class="modal-footer form-group">
                            <button type="submit" class="btn btn-success" href="{{ route('moderator.store') }}"><i class="fas fa-user-plus"></i>  Add new moderator</button>
                          </div>
                      </form>
                    
                </div>
                <!-- /.card-body -->
      
            </div>
          </div>


@stop