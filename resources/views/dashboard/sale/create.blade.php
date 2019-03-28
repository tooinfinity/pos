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
                                    <a type="button" href="{{ route('client.create') }}" class=" btn btn btn-primary"><i
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
                                        <select class="form-control" name="status">
                                            <option>paid</option>
                                            <option>notpaid</option>
                                            <option>dept</option>
                                        </select>
                                    </div>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select class="form-control">
                            <option>All Categories</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Select Brand</label>
                        <select class="form-control">
                            <option>All Brands</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <div class="row">
                    <ul class="users-list clearfix">
                        @foreach ($products as $product)
                        <li class="col-md-3 col-xs-4" style="line-height: 0;">
                            {{--  <a href="" id="product-{{ $product->id }}" + data-name="{{ $product->product_name }}"
                            +
                            data-id="{{ $product->id }}" + data-price="{{ $product->sale_price }}"
                            class="btn btn-success btn-sm add-product-btn">
                            <img src="{{ $product -> image_path }}" style="width: 200px;"
                                class="img-circle img-thumbnail" alt="">
                            </a> --}}

                            <a href="" data-toggle="tooltip"
                                title="{{ $product->product_name }} Price : {{ $product->sale_price }}"
                                data-placement="top" id="product-{{ $product->id }}" +
                                data-name="{{ $product->product_name }}" + data-id="{{ $product->id }}" +
                                data-price="{{ $product->sale_price }}" class=" con
                                add-product-btn" style="width: 10rem;">
                                <img class="image img-card" src="{{ $product -> image_path }}" alt="">
                                <div class="overlay overlayFade">
                                    <div class="text">
                                        <h6>Stock Rest</h6>
                                        <h6 class="text-nowrap">{{ $product->stock }}</h6>
                                    </div>
                                </div>
                            </a>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</div>





@stop
