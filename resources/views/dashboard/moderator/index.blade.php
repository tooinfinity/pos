@extends('layouts.main')

@section('page')
  Moderators
@stop 

@section('content')

  <div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header" >
            <h3 class="card-title">List Moderators</h3>
            <div class="btn btn-primary" style="position: absolute;
            right: 1rem;
            top: .5rem;">add new moderator</div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <tbody><tr>
                <th>#</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
              <tr>
                <td>1.</td>
                <td>Update software</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                  </div>
                </td>
                <td><span class="badge bg-danger">55%</span></td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Clean database</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                  </div>
                </td>
                <td><span class="badge bg-warning">70%</span></td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Cron job running</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-primary" style="width: 30%"></div>
                  </div>
                </td>
                <td><span class="badge bg-primary">30%</span></td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Fix and squish bugs</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-success" style="width: 90%"></div>
                  </div>
                </td>
                <td><span class="badge bg-success">90%</span></td>
              </tr>
            </tbody></table>
          </div>
          <!-- /.card-body -->
      </div>
  </div>

      
 

@stop