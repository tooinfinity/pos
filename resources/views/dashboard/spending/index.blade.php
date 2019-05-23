@extends('layouts.main')

@section('page')
Spendings page
@endsection


@section('content')
@include('sweet::alert')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">
            <div class="row">
                <h3 class="card-title">Spendings</h3>
                <button class="btn btn-primary ml-auto">create new category spending</button>
            </div>

            <form action="{{ route('spending.store') }}">
                <div class="col-md-6">
                    <h4 class="card-title">create new Spendings :</h4>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label"> : </label>
                        <select id="select" class="form-control col-sm-6" name="status">
                            <option value="paid">paid</option>
                            <option value="nopaid">nopaid</option>
                            <option value="debt">debt</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Total Amount : </label>
                        <input type="number" id="total-amount" name="total_amount"
                            class="form-control col-sm-6 total-amount" readonly min="0" value="0">
                    </div>
                </div>
            </form>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="category_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="category_table" class="table table-bordered table-striped table-hover  dataTable"
                            role="grid" aria-describedby="category_table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 283px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 359px;">Spending
                                        name</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Spending price</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending"
                                        style="width: 243px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($spendings as $index => $spending)
                                dd($spending)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $spending->spending_name }}</td>
                                    <td>{{ $spending->brand_name }}</td>
                                    <td><a href="{{ route('product.index', ['spending_id'=>$spending->id]) }}"
                                            class="btn btn-info text-white"><i class="fas fa-link"></i>
                                            {{
                                            $spending->
                                            products->count() }} Related
                                            Product</a></td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_categories'))
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('spending.edit', $spending->id) }}"><i
                                                class="fas fa-edit"></i>
                                            update</a>
                                        @else
                                        <a class="btn btn-warning btn-sm disabled"
                                            href="{{ route('spending.edit', $spending->id) }}"><i
                                                class="fas fa-edit"></i>
                                            update</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_categories'))
                                        <button id="delete" onclick="deletemoderator({{ $spending->id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                            delete</button>
                                        <form id="form-delete-{{ $spending->id }}"
                                            action="{{ route('spending.destroy', $spending->id) }}" method="post"
                                            style="display:inline-block;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>
                                        @else
                                        <button type="submit" class="btn btn-danger btn-sm disabled"><i
                                                class="fas fa-trash"></i>
                                            delete</button>
                                        @endif

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No</th>
                                    <th rowspan="1" colspan="1">Spending name</th>
                                    <th rowspan="1" colspan="1">Description</th>
                                    <th rowspan="1" colspan="1">Spending price</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->


    </div>
</div>


@stop
