@extends('Home')
@section('content')

<div class="form-three widget-shadow">
    <div class=" panel-body-inputin">

        <form class="form-horizontal" name="RegForm" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label class="col-md-2 control-label">Upload image</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-picture-o"></i>
                        </span>
                        <input type="file" class="form-control1" name="image">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Name</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-newspaper-o"></i>
                        </span>
                        <input type="text" class="form-control1" name="pname" placeholder="Enter product name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Code</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-book"></i>
                        </span>
                        <input type="text" class="form-control1" name="pcode" placeholder="Enter product code" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Description</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil-square"></i>
                        </span>
                        <input class="form-control1" name="pdesc" placeholder="Add product description" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Price</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-inr"></i>
                        </span>
                        <input type="text" class="form-control1" name="price" placeholder="Enter price of product" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Stock</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-archive"></i>
                        </span>
                        <input type="text" class="form-control1" name="stock" placeholder="Enter stock" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Select Subcategory</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-object-group"></i>
                        </span>
                        <select class="form-control" name="subcatid">
                            @foreach($subcategories as $value)
                            <option value="{{$value->subcatid}}">{{$value->subcatname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Minimum Stock of product</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-archive"></i>
                        </span>
                        <input class="form-control1" placeholder="Enter minimum stock" name="minimum_stock" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Minimum Selling Price</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-inr"></i>
                        </span>
                        <input class="form-control1" placeholder="Enter minimum selling price" name="msprice" required>
                    </div>
                </div>
            </div>
            <center> 
                <button type="submit" class="btn btn-default">Store</button>
            </center>
        </form>
    </div>
</div>
<div class="clearfix"></div>
@endsection