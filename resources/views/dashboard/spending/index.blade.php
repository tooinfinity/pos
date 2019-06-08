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
                {{--  create new category spending --}}
                <button class="btn btn-success ml-auto" data-toggle="modal" data-target=".catspend">create category
                    spending</button>
                <div class="modal fade catspend" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Create
                                    new Category Spending</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="cat_spend">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                @include('partials._errors')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">Category Spending name</label>
                                                <input type="text" name="category_spending_name"
                                                    id="category_spending_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                {{--  create new spending  --}}
                <button class="btn btn-success ml-5" data-toggle="modal" data-target=".newspend">create
                    spending</button>
                <div class="modal fade newspend" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Create
                                    new Spending</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="new_spend">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                @include('partials._errors')
                                <div class="modal-body">
                                    <div class="col-md-8 text-dark">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"> Category Spending: </label>
                                            <select name="category_spending_id"
                                                class="form-control col-sm-6 select_cat">
                                                @foreach ($categoryspendings as $categoryspending)
                                                <option value="{{ $categoryspending->id }}"
                                                    {{ old('category_spending_id') == $categoryspending->id ? 'selected' : ''}}>{{
                                    $categoryspending->category_spending_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"> Description : </label>
                                            <textarea name="spending_description" id="spending_description"
                                                class="form-control col-sm-6 "></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Total Amount Spending : </label>
                                            <input type="number" id="spending_price" name="spending_price"
                                                class="form-control col-sm-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="spending_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="spending_table" class="table table-bordered table-striped table-hover  dataTable"
                            role="grid" aria-describedby="spending_table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 283px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 359px;">Spending
                                        Type</th>
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
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $spending->CategorySpending->category_spending_name }}</td>
                                    <td>{{ $spending->spending_description }}</td>
                                    <td>{{ $spending->spending_price }}</td>
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
                                    <th rowspan="1" colspan="1">Spending Type</th>
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
    <div class="card card-primary">
        <div class="card-header with-border">
            <div class="row">
                <h3 class="card-title">Total Amount Spendings</h3>
                <div class="ml-auto">
                    <input type="number" readonly class="form-control text-center" value="{{ $totalspendings }}">
                </div>
            </div>
        </div>
    </div>
</div>


@stop
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        jQuery.noConflict();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // add new category spending ajax request
        $('#cat_spend').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "/catspend",
                data: formData,
                contentType: false,
                processData: false,
                success: function (reponse) {
                    console.log(reponse)
                    $('#catspend').modal('hide')
                    location.reload();

                },
                error: function (error) {
                    const errors = error.responseJSON.errors
                    const firstitem = Object.keys(errors)[0]
                    const firstitemDOM = document.getElementById(firstitem)
                    const firstErrorMessage = errors[firstitem][0]
                    firstitemDOM.scrollIntoView({})

                    const errorMessages = document.querySelectorAll('.text-danger')
                    errorMessages.forEach((element) => element.textContent = '')

                    firstitemDOM.insertAdjacentHTML('afterend',
                        `<div class="text-danger">${firstErrorMessage}</div>`)

                    const formControls = document.querySelectorAll('.form-control')
                    formControls.forEach((element) => element.classList.remove('border',
                        'border-danger'))

                    firstitemDOM.classList.add('border', 'border-danger')
                }
            });
        });

        // add new spending ajax request
        $('#new_spend').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "/newspend",
                data: formData,
                contentType: false,
                processData: false,
                success: function (reponse) {
                    console.log(reponse)
                    $('.newspend').modal('hide')
                    location.reload();

                },
                error: function (error) {
                    console.log(error)
                    const errors = error.responseJSON.errors
                    const firstitem = Object.keys(errors)[0]
                    const firstitemDOM = document.getElementById(firstitem)
                    const firstErrorMessage = errors[firstitem][0]
                    firstitemDOM.scrollIntoView({})

                    const errorMessages = document.querySelectorAll('.text-danger')
                    errorMessages.forEach((element) => element.textContent = '')

                    firstitemDOM.insertAdjacentHTML('afterend',
                        `<div class="text-danger">${firstErrorMessage}</div>`)

                    const formControls = document.querySelectorAll('.form-control')
                    formControls.forEach((element) => element.classList.remove('border',
                        'border-danger'))

                    firstitemDOM.classList.add('border', 'border-danger')
                }
            });
        });
    });

</script>


@endsection
