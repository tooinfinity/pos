@extends('layouts.main')

@section('page')
Categories Page
@stop

@section('content')
@include('sweet::alert')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">
            <h3 class="card-title">List Moderators</h3>
            <form action="{{ route('category.index') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                            placeholder="Search">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_categories'))
                        <a type="" class="btn btn-success" href="{{ route('category.create') }}"><i class="fas fa-user-plus"></i>
                            add new category</a>
                        @else
                        <a type="" class="btn btn-success disabled" href="#"><i class="fas fa-user-plus"></i> add new
                            category</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            @if (($categories->count()) > 0)
            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>no</th>
                        <th>Category name</th>
                        <th>Brand name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category -> category_name }}</td>
                        <td>{{ $category -> brand_name }}</td>
                        <td>
                            @if (auth()->user()->hasPermission('update_categories'))
                            <a class="btn btn-warning btn-sm" href="{{ route('category.edit', $category->id) }}"><i
                                    class="fas fa-user-edit"></i>
                                update</a>
                            @else
                            <a class="btn btn-warning btn-sm disabled" href="{{ route('category.edit', $category->id) }}"><i
                                    class="fas fa-user-edit"></i>
                                update</a>
                            @endif
                            @if (auth()->user()->hasPermission('delete_categories'))
                            <button id="delete" onclick="deletemoderator({{ $category->id }})" class="btn btn-danger btn-sm"><i
                                    class="fas fa-user-times"></i>
                                delete</button>
                            <form id="form-delete-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}"
                                method="post" style="display:inline-block;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                            </form>
                            @else
                            <button type="submit" class="btn btn-danger btn-sm disabled"><i class="fas fa-user-times"></i>
                                delete</button>
                            @endif

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h2 class="text-center">no data saved</h2>
            @endif
        </div>
        <!-- /.card-body -->

    </div>
</div>


@stop
