@extends('layouts.pos')

@section('page')
Point Of Purchase Page
@stop

@section('content')

<div class="col-md-7  col-sm-12 ">
    <div class="card card-primary card-outline" style="height:80vh;">
        <div class="card-header">
            <h3 class="card-title">List Of Purchases Products</h3>

        </div> <!-- /.card-body -->
        <div class="card-body" style="overflow-y:scroll;">
            <form action="{{ route('purchase.store') }}" method="post">

                {{ csrf_field() }}
                {{ method_field('post') }}

                @include('partials._errors')
                <div class="row">
                    <div class="col-md-6">
                        <div id="provider" class="form-group">
                            <label for="">Select Provider </label>
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="provider_id" class="form-control">
                                        @foreach ($providers as $provider)
                                        <option value="{{ $provider->id }}"
                                            {{ old('provider_id') == $provider->id ? 'selected' : ''}}>{{
                                    $provider->provider_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-provider"><i class="fas fa-plus"> Add
                                            Provider</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Referance Purchase Numder : </label>


                            <input type="text" name="number_purchase" class="form-control text-center" readonly
                                value="{{ $purchase_number }}">


                        </div>
                    </div>
                </div>
                <div class="col-xs-12 table-responsive">

                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Index</th>
                                <th>Product</th>
                                <th>Quntite</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>

                        <tbody class="order-list">

                        </tbody>
                        <tfoot>
                            <tr class="form-group">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total : </th>
                                <th><input type="number" name="total" class="form-control input-sm total-price" min="0"
                                        readonly value="0"></th>
                            </tr>
                            <tr class="form-group">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Discount : </th>
                                <th><input type="number" id="discount" name="discount"
                                        class="form-control input-sm discount" min="0" value="0"></th>
                            </tr>
                            <tr class="form-group">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total Amount : </th>
                                <th><input type="number" id="total-amount" name="total_amount"
                                        class="form-control input-sm total-amount" readonly min="0" value="0"></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Select Payment Status : </th>
                                <th>
                                    <div class="form-group">
                                        <select id="select" class="form-control" name="status">
                                            <option>paid</option>
                                            <option>nopaid</option>
                                            <option>debt</option>
                                        </select>

                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Rest Payment : </th>
                                <th>

                                    <input id="rest" style="display:none;" type="number" name="rest"
                                        class="form-control input-sm rest" value="0"></input>
                                </th>
                            </tr>
                        </tfoot>

                    </table>

                    <div class="modal-footer form-group">
                        <button type="submit" class="btn btn-success" href="{{ route('purchase.store') }}"><i
                                class="fas fa-user-plus"></i>
                            Add new purchase</button>
                    </div>
            </form>
            <div class="modal fade bd-example-modal-lg-provider" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create
                                new Provider</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="new_provider" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            @include('partials._errors')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>provider name</label>
                                            <input type="text" name="provider_name" id="provider_name"
                                                class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea type="text" name="address" id="address"
                                                class="form-control"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea type="text" name="description" id="description"
                                                class="form-control"></textarea>
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
        </div>


    </div><!-- /.card-body -->
</div>
</div>
<div class="col-md-5 col-sm-12">
    <div class="card card-primary card-outline" style="height:80vh;">
        <div class="card-header">
            <h3 class="card-title">List Of Purchases Products</h3>
        </div> <!-- /.card-body -->
        <div id="proscroll" class="card-body" style="overflow-y:scroll;">
            <label for="">Search Product by Name or codebar</label>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input id="search" class="form-control" type="text" name="product"
                            placeholder="Search For Product" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target=".bd-example-modal-lg">Create a new Product</button>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Create new Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form enctype="multipart/form-data" id="new_product">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}
                                        <div id="form-messages" class="alert success" role="alert"
                                            style="display: none;"></div>
                                        <div class="modal-body">
                                            @include('partials._errors')
                                            <div class="form-group">
                                                <label>Categories</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="">All Categorie</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id') == $category->id ? 'selected' : ''}}>{{
                                    $category->category_name }} {{
                                    $category->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Codebar</label>
                                                <input type="text" name="codebar" id="codebar" class="form-control bar"
                                                    value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Product name</label>
                                                <input type="text" name="product_name" id="product_name"
                                                    class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <textarea style="display:none;" type="text" name="description"
                                                    id="description" class="form-control" value=""></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Purchase Price</label>
                                                <input type="number" name="purchase_price" id="purchase_price"
                                                    class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Sale Price</label>
                                                <input type="number" name="sale_price" id="sale_price"
                                                    class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="stock" id="stock" class="form-control"
                                                    value="0">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="min_stock" id="min_stock"
                                                    class="form-control" value="0">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image"
                                                        class="form-control image custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose product
                                                        Photo</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ asset('uploads/product_images/product.png') }}"
                                                    style="width:200px;" class="img-circle img-thumbnail img-preview"
                                                    alt="" srcset="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                @if ($products->count() > 0)
                <div id="pds" class="row text-center text-lg-left containerItems">

                    @foreach ($products as $product)

                    <div class="col-lg-3 col-md-4 col-6 prod">
                        <a href="" id="product" data-toggle="tooltip"
                            title="{{ $product->product_name }} Price : {{ $product->purchase_price }}"
                            data-placement="top" id="product-{{ $product->id }}" +
                            data-name="{{ $product->product_name }}" + data-id="{{ $product->id }}" +
                            data-price="{{ $product->purchase_price }}" + data-stock="{{ $product->stock }}" class="con d-block
                    mb-4
                    add-product-btn">
                            <img class="img-fluid img-thumbnail" src="{{ $product -> image_path }}" alt="">
                            <div class="overlay overlayFade text-center">
                                <div class="text">
                                    <h6>Stock Left</h6>
                                    <h6 class="text-nowrap stock">{{ $product->stock }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
        </div><!-- /.card-body -->
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // add new product in purchase page
        $('#new_product').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "/newproduct",
                data: formData,
                contentType: false,
                processData: false,
                success: function (reponse) {
                    //alert(reponse)
                    //console.log(reponse)
                    $('.bd-example-modal-lg').modal('hide')
                    $("#pds").load(" #pds");
                    $("#proscroll").animate({
                        scrollTop: $(document).height()
                    }, 'slow');

                    //alert("data saved");
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
                    //console.log(firstitem)

                    //alert("data not saved");
                }
            });
        });
        // add new provider in purchase page
        $('#new_provider').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "/newprovider",
                data: formData,
                contentType: false,
                processData: false,
                success: function (reponse) {
                    console.log(reponse)
                    $('.bd-example-modal-lg-provider').modal('hide')
                    $("#provider").load(" #provider");

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
        // Search for product to purchase by product id or category id
        let old_content = $('#pds').html();
        // Search for product to purchase by product name and codebar
        $("#search").keyup(function () {
            var pro = $("#search").val();
            if (pro != '') {
                $.ajax({
                    type: "GET",
                    url: "/search",
                    data: 'pro=' + pro,
                    dataType: 'json',
                    success: function (data) {
                        $('#pds').html(data.row_result);
                        console.log(data)

                    }
                });
            } else {
                $('#pds').html(old_content);
            }
        });
        // Search for product to purchase by category id selected
        // not working perfectly i will fix it later
        /*$("#category").change(function () {
            var cat = $("#category").val();
            if (cat != '') {
                $.ajax({
                    type: "GET",
                    url: "/search",
                    data: 'cat=' + cat,
                    dataType: 'json',
                    success: function (data) {
                        $('#pds').html(data.row_result);
                        console.log(data)

                    }
                });
            } else {
                $('#pds').html(old_content);
            }
        });*/
    });

</script>

@endsection
