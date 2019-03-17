@extends('layouts.pos')

@section('page')
Point Of Sale Page
@stop

@section('content')

<div class="col-md-7  col-sm-12">
    <div class="card card-primary card-outline" style="height: 100%;">
        <div class="card-header">
            <h3 class="card-title">List Of Sales Products</h3>
        </div> <!-- /.card-body -->
        <div class="card-body" style="height: 100%;">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Select Client </label>
                        <div class="row  no-gutters">
                            <div class="col-md-9">
                                <select class="form-control">
                                    <option>Anonymous</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn btn-primary"><i class="fas fa-plus"> Add Client</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Select Product </label>
                        <div class="row  no-gutters">
                            <div class="col-md-9">
                                <select class="form-control">
                                    <option>Anonymous</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn btn-primary"><i class="fas fa-plus"> Add Product</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quntite</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>

                    <tbody class="neworderbody">

                    </tbody>
                </table>
            </div>


        </div><!-- /.card-body -->
    </div>

</div>
<div class="col-md-5 col-sm-12">
    <div class="card card-primary card-outline" style="height: 100%;">
        <div class="card-header">
            <h3 class="card-title">List Of Sales Products</h3>
        </div> <!-- /.card-body -->
        <div class="card-body" style="height: 100%;">
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
                <div class="eq-height-row" style="display: flex;flex-wrap: wrap;max-height: 480px;
    overflow-y: scroll;
    overflow-x: hidden;">
                    <div class="row">
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <a href="#" id="add">
                                    <div class="img-thumbnail">
                                        <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                            class="img-thumbnail">
                                    </div>
                                    <div id="name" class="text text-muted text-uppercase">product name</div>
                                    <div id="price" class="text text-muted text-uppercase">Price</div>
                                    <div id="stock" class="text text-muted text-uppercase">stock</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom"
                                data-variation_id="77" title="" data-original-title="Cistiben Forte  (AP0034)">
                                <div class="img-thumbnail">
                                    <img src="{{ asset('uploads/product_images/product.png') }}" style="width:200px;"
                                        class="img-thumbnail">
                                </div>
                                <div class="text text-muted text-uppercase">
                                    <small>Cistiben Forte
                                    </small>
                                </div>
                                <small class="text-muted">
                                    (AP0034)
                                </small>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div><!-- /.card-body -->
    </div>

</div>





@stop
