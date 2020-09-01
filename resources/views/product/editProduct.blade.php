@extends('Home')
@section('content')

<div class="form-three widget-shadow">
    <div class=" panel-body-inputin">

        <form class="form-horizontal" name="RegForm" action="{{ route('product.update',['pid' => $product->pid ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <center>
                <img src="{{ $product->pphoto }}" style="width: 200px;height: 200px;border: 4px solid #fff;">
            </center>
            <br>
            <div class="form-group">
                <label class="col-md-2 control-label">Upload image</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-picture-o"></i>
                        </span>
                        <input type="file" class="form-control1" name="image" value="{{ $product->pphoto }}">
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
                        <input type="text" class="form-control1" name="pname" value="{{ $product->pname }}" placeholder="{{ $product->pname }}" required>
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
                        <input type="text" class="form-control1" name="pcode" value="{{ $product->pcode }}" placeholder="{{ $product->pcode }}" required>
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
                        <input class="form-control1" name="pdesc" value="{{ $product->pdesc }}" placeholder="{{ $product->pdesc }}" required>
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
                        <input type="number" class="form-control1" name="price" value="{{ $product->price }}" placeholder="{{ $product->price }}" required>
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
                        <input type="number" class="form-control1" name="stock" value="{{ $product->stock }}" placeholder="{{ $product->stock }}" required>
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
                            <?php if($product->subcatid == $value->subcatid){
                                $scid = $value->subcatid;
                                $scnm = $value->subcatname;
                            }?>
                            @endforeach
                            <option value="<?php echo $scid;?>"><?php echo $scnm;?></option>
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
                        <input type="number" class="form-control1" max="{{ $product->stock }}" value="{{ $product->minimum_stock }}" placeholder="{{ $product->minimum_stock }}" name="minimum_stock" required>
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
                        <input type="number" class="form-control1" max="{{ $product->price }}" value="{{ $product->msprice }}" placeholder="{{ $product->msprice }}" name="msprice" required>
                    </div>
                </div>
            </div>
            <center> 
                <button type="submit" class="btn btn-default">Update</button>
            </center>
        </form>
    </div>
</div>
<div class="clearfix"></div>
@endsection