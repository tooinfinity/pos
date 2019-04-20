@extends('layouts.pos')

@section('page')
Point Of Sale Page
@stop

@section('content')

<div class="col-md-7  col-sm-12 ">
    <div class="card card-primary card-outline" style="height:80vh;">
        <div class="card-header">
            <h3 class="card-title">List Of Sales Products</h3>

        </div> <!-- /.card-body -->
        <div class="card-body" style="overflow-y:scroll;">
            <form action="{{ route('sale.store') }}" method="post">

                {{ csrf_field() }}
                {{ method_field('post') }}

                @include('partials._errors')
                <div class="form-group form-inline float-right">
                    <label class="col-sm-7 col-form-label"> Referance Sale Numder : </label>
                    <input type="text" name="number_sale" class="form-control col-sm-5" readonly
                        value="{{ $sale_number }}">
                </div>
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Client </label>
                            <div class="row  no-gutters">
                                <div class="col-md-9">
                                    <select name="client_id" class="form-control">
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"
                                            {{ old('category_id') == $client->id ? 'selected' : ''}}>{{
                                    $client->client_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('client.create') }}" class="btn btn-primary"><i
                                            class="fas fa-plus"> Add
                                            Client</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 table-responsive">

                    <table class="table table-striped table-hover">
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
                        <button type="submit" class="btn btn-success" href="{{ route('sale.store') }}"><i
                                class="fas fa-user-plus"></i>
                            Add new sale</button>
                    </div>
            </form>
        </div>


    </div><!-- /.card-body -->
</div>
</div>
<div class="col-md-5 col-sm-12">
    <div class="card card-primary card-outline" style="height:80vh;">
        <div class="card-header">
            <h3 class="card-title">List Of Sales Products</h3>
        </div> <!-- /.card-body -->
        <div class="card-body" style="overflow-y:scroll;">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Search for Product by name or category</label>
                        <input id="search" class="form-control search" type="search" placeholder="Search For Product">
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                @if ($products->count() > 0)
                <div class="row text-center text-lg-left containerItems">

                    @foreach ($products as $product)

                    <div class="col-lg-3 col-md-4 col-6" {{ $cat = $product->Category()->first()->category_name }}
                        data-search="{{ $product->product_name }} {{ $cat }}">
                        <a href="" data-toggle="tooltip"
                            title="{{ $product->product_name }} Price : {{ $product->sale_price }}" data-placement="top"
                            id="product-{{ $product->id }}" + data-name="{{ $product->product_name }}" +
                            data-id="{{ $product->id }}" + data-price="{{ $product->sale_price }}" +
                            data-stock="{{ $product->stock }}" class="con d-block mb-4
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
                @else
                <div class="lam">
                    <div class="centered">
                        <h5>There is no product for sale</h5>
                    </div>
                </div>


                @endif
            </div>
        </div><!-- /.card-body -->
    </div>
</div>


@stop
