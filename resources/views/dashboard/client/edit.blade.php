@extends('layouts.main')

@section('page')
Update Client
@stop

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">
            <h3 class="card-title">Update a Client</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('client.update', $client->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('put') }}
                @include('partials._errors')
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Client name</label>
                            <input type="text" name="client_name" id="" class="form-control" value="{{ $client->client_name }}">
                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" name="phone" id="" class="form-control" value="{{ $client->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" name="address" id="" class="form-control">{{ $client->address }}</textarea>

                        </div>

                    </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i> Update Client</button>
                </div>
            </form>

        </div>
        <!-- /.card-body -->

    </div>
</div>


@stop
