@extends('layouts.main')

@section('page')
  Moderators
@stop 

@section('content')

  <div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header with-border">
            <h3 class="card-title">List Moderators</h3>
            <form action="">
              <div class="row">
                <div class="col-md-4">
                    <input type="text" value="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-success"><i class="fas fa-search"></i>    Search</button>
                  <a type="" data-toggle="modal" data-target="#create" class="btn btn-success" href="{{ route('moderator.create') }}"><i class="fas fa-user-plus"></i>   add new moderator</a>
                  <!-- Modal -->
                  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createTitle" aria-hidden="true">
                      <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-dark" id="createTitle">Create a new moderator</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-dark">
                            <form action="" method="post">

                                <div class="form-group">
                                  <label>first name</label>
                                  <input type="text" name="first_name" id="" class="form-control" value="{{ old('first_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>last name</label>
                                    <input type="text" name="last_name" id="" class="form-control" value="{{ old('last_name') }}">
                                  </div>
                                  <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="email" id="" class="form-control" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>first name</label>
                                        <input type="text" name="first_name" id="" class="form-control" value="{{ old('first_name') }}">
                                      </div>


                            </form>


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </form>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            @if ($moderator->count() > 0)
            <table class="table table-hover">

              <thead>
                <tr>
                  <th>#</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($moderator as $index => $moderators)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $moderators -> first_name }}</td>
                        <td>{{ $moderators -> last_name }}</td>
                        <td>{{ $moderators -> email }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('moderator.edit', $moderators->id) }}"><i class="fas fa-user-edit"></i>  update</a>
                            <form action="{{ route('moderator.destroy', $moderators->id) }}" method="post" style="display:inline-block;">
                               {{ csrf_field() }}
                               {{ method_field('delete') }}
                               <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-user-times"></i>  delete</button>
                            </form>
                        </td>
                    </tr>  
                 @endforeach
              </tbody>
            </table>
            @else 
                <h2>no data saved</h2>
            @endif
          </div>
          <!-- /.card-body -->

      </div>
  </div>

      
 

@stop