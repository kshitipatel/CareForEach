@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

  <div class="card card-contact-list">
    <div class="agileinfo-cdr">
      <div class="card-header">
        <h3>Vendors</h3>
        <a href="{{ route('vendor.add') }}"><button type = "button" class = "btn btn-success" style="float: right;"><i class="fa fa-plus"></i> </button></a>
      </div>
      <br>
      <hr class="widget-separator">
      <div class="card-body p-b-20">
        <div class="list-group">
          @foreach($vendors as $vendor)
          <div class="list-group-item media">
            <div class="pull-left">
              <img class="lg-item-img" src="{{ $vendor->photo }}" alt="" width="150px" height="150px" name="image">
            </div>
            <div class="media-body">
              <div class="pull-left"  style="padding-left: 20px">
                <div class="lg-item-heading">{{ $vendor->contactpersonname }}</div>
                <small class="lg-item-text">{{ $vendor->companyname }}</small><br>
                <small class="lg-item-text">{{ $vendor->contact }}</small><br>
                <small class="lg-item-text">{{ $vendor->email }}</small><br>
                <small class="lg-item-text">{{ $vendor->city }}</small><br>
                <small class="lg-item-text">{{ $vendor->address }}</small><br>
                <?php
                $p = $vendor->productname;
                $d=explode(",",$p);
                $dl = sizeof($d);
                $prodlist = [];
                for($i=0;$i<$dl;$i++){
                  ?>
                  @foreach($products as $product)
                  <?php
                  if($d[$i] == $product->pid){
                    $prodlist[] = $product->pname;
                  }
                  ?>
                  @endforeach
                  <?php
                }
                $prod=implode(" , ", $prodlist);
                ?>
                <small class="lg-item-text"><?php echo $prod; ?></small><br>
                <small class="lg-item-text">{{ $vendor->mail_data }}</small><br>
              </div>
              <div class="pull-right" style="padding-right: 100px; padding-top: 50px">
                <a href="{{ route('vendor.edit' , ['vid' => $vendor->vid ]) }}"><button type = "button" class = "btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                <a href="{{ route('vendor.delete' , ['vid' => $vendor->vid ]) }}"><button type = "button" class = "btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a>                 
              </div>
            </div>
          </div>
          <hr>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

@endsection