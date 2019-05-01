@extends('layouts.main')

@section('page')
List Of Purchases
@stop

@section('content')

@include('sweet::alert')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">

            <form action="{{ route('purchase.index') }}" method="get">

                <div class="row no-gutters">
                    <div class="col-12 col-sm-6 col-md-8">
                        <h3 class="card-title">List Purchases</h3>
                    </div>
                    <div class="col-6 col-md-4">
                        @if (auth()->user()->hasPermission('create_purchases'))
                        <a type="" class="btn btn-success btn float-right" style=""
                            href="{{ route('purchase.create') }}"><i class="fas fa-user-plus"></i>
                            Make new Purchase</a>
                        @else
                        <a type="" class="btn btn-success disabled btn float-right" href="#"><i
                                class="fas fa-user-plus"></i>
                            Make new Purchase
                        </a>
                        @endif
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
                                        style="width: 359px;">Number Purchase</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Total</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Discount</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Total Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Paid</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">due(credit)</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending"
                                        style="width: 243px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($purchases as $index => $purchase)

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $purchase->number_purchase }}</td>
                                    <td>{{ $purchase->total }}</td>
                                    <td>{{ $purchase->discount }}</td>
                                    @if ($purchase->status == "paid")
                                    <td><span class="badge bg-success">{{ $purchase->total_amount }}</span></td>
                                    @endif
                                    @if ($purchase->status == "nopaid")
                                    <td><span class="badge bg-warning">{{ $purchase->total_amount }}</span></td>
                                    @endif
                                    @if ($purchase->status == "debt")
                                    <td><span class="badge bg-danger">{{ $purchase->total_amount }}</span></td>
                                    @endif
                                    <td>{{ $purchase->paid }}</td>
                                    <td>{{ $purchase->due }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_purchases'))
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('purchase.edit', $purchase->id) }}"><i
                                                class="fas fa-edit"></i>
                                            update</a>
                                        @else
                                        <a class="btn btn-warning btn-sm disabled"
                                            href="{{ route('purchase.edit', $purchase->id) }}"><i
                                                class="fas fa-edit"></i>
                                            update</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_categories'))
                                        <button id="delete" onclick="deletemoderator({{ $purchase->id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                            delete</button>
                                        <form id="form-delete-{{ $purchase->id }}"
                                            action="{{ route('purchase.destroy', $purchase->id) }}" method="post"
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
                                    <th rowspan="1" colspan="1">Number Purchase</th>
                                    <th rowspan="1" colspan="1">Total</th>
                                    <th rowspan="1" colspan="1">Discount</th>
                                    <th rowspan="1" colspan="1">Total Amount</th>
                                    <th rowspan="1" colspan="1">Paid</th>
                                    <th rowspan="1" colspan="1">due(credit)</th>
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
