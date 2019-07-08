@extends('layouts.main')

@section('page')
General Settings
@stop

@section('content')
@include('sweet::alert')
<div class="col-md-12">
    {{--  Start General Settings card  --}}
    <div class="card card-primary">
        <div class="card-header with-border">
            <h2>General Settings</h2>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

            <form id="update_settings" action="{{ route('generalsetting.store') }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('post') }}
                @include('partials._errors')
                <div class="col-md-12">

                    <input id="setting_id" type="hidden" name="id" value="{{ $store_id }}">
                    <div class="form-group">
                        <label>Store Name</label>
                        <input type="text" name="store_name" id="" class="form-control" value="{{ $store_name }}">
                    </div>
                    <div class="form-group">
                        <label>Start Day</label>
                        <input type="date" name="start_day" class="form-control datepicker" data-provide="datepicker"
                            value="{{ $start_day }}">
                    </div>
                    <div class="form-group">
                        <label>Investment Capital</label>
                        <input type="text" name="investment_capital" id="" class="form-control"
                            value="{{ $investment_capital }}">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control image custom-file-input"
                                id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Logo for your Store</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('/uploads/settings/'.$logo) }}" style="width:200px;"
                            class="img-circle img-thumbnail img-preview">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">General Settigs Update</button>
                    </div>

                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    {{-- End General Settings card    --}}

    {{--  Start Print barcode card  --}}
    <div class="card card-primary">
        <div class="card-header with-border">
            <h2>Print Barcode</h2>
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
                                        style="width: 360px;">Product Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 359px;">Barcode</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 359px;">Preview</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($products as $index => $product)
                                <tr>
                                    <input type="hidden" id="id_product" name="id" value="{{ $product->id }}">
                                    <td>{{ $product ->product_name }}</td>
                                    <td>{{ $product->codebar }}</td>
                                    <td>
                                        <div class="barcode_print_label"
                                            style="display:inline-block;vertical-align:middle;line-height:16px !important; text-align: center;">

                                            <b style="display: block !important"
                                                class="text-uppercase">{{ $store_name }}</b>
                                            <dir>
                                                {!! DNS1D::getBarcodeHTML($product->codebar , "EAN13") !!}
                                            </dir>

                                            <b class="text-uppercase">Price:</b>
                                            <span class="display_currency"
                                                data-currency_symbol="true">{{ $product->sale_price }} DZD</span>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-primary barcode_print_button">Print</button>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Product Name</th>
                                    <th rowspan="1" colspan="1">Barcode</th>
                                    <th rowspan="1" colspan="1">Preview</th>
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
    {{-- End Print barcode card    --}}

    {{--  Start  settigs Print card  --}}
    <div class="card card-primary">
        <div class="card-header with-border">
            <h2>Printing Settings</h2>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <h2>Printing Settings</h2>
        </div>
        <!-- /.card-body -->
    </div>
    {{-- End settings Print  card    --}}

</div>


@stop



@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        var codebarnum = $('#barcode_number').val();
        JsBarcode("#ean-13", codebarnum, {
            format: "ean13"
        });
        $('body').on('click', '.barcode_print_button', function (e) {
            e.preventDefault();
            $('#barcode_print').printThis();

        });
    });

</script>
@endsection
