@extends('layouts.main')

@section('page')
Moderators
@stop

@section('content')
@include('sweet::alert')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">
            <h3 class="card-title">List Moderators</h3>
            <form action="{{ route('moderator.index') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                            placeholder="Search">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_users'))
                        <a type="" class="btn btn-success" href="{{ route('moderator.create') }}"><i
                                class="fas fa-user-plus"></i> add new moderator</a>
                        @else
                        <a type="" class="btn btn-success disabled" href="#"><i class="fas fa-user-plus"></i> add new
                            moderator</a>
                        @endif
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
                        <th>Image</th>
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
                        <td><img src="{{ $moderators -> image_path }}" style="width:50px;" class="img-circle img-thumbnail" alt="" srcset=""></td>
                        <td>
                            @if (auth()->user()->hasPermission('update_users'))
                            <a class="btn btn-warning btn-sm" href="{{ route('moderator.edit', $moderators->id) }}"><i
                                    class="fas fa-user-edit"></i> update</a>
                            @else
                            <a class="btn btn-warning btn-sm disabled"
                                href="{{ route('moderator.edit', $moderators->id) }}"><i class="fas fa-user-edit"></i>
                                update</a>
                            @endif
                            @if (auth()->user()->hasPermission('delete_users'))
                            <button id="delete" onclick="deletemoderator({{ $moderators->id }})" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i>
                                delete</button>
                            <form id="form-delete-{{ $moderators->id }}" action="{{ route('moderator.destroy', $moderators->id) }}" method="post"
                                style="display:inline-block;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                            </form>
                            @else
                            <button type="submit" class="btn btn-danger btn-sm disabled"><i
                                    class="fas fa-user-times"></i> delete</button>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $moderator->appends(request()->query())->links() }}
            @else
            <h2 class="text-center">no data saved</h2>
            @endif
        </div>
        <!-- /.card-body -->

    </div>
</div>


@stop