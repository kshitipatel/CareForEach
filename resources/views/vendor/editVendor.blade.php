@extends('Home')
@section('content')

<div class="form-three widget-shadow">
    <div class=" panel-body-inputin">

        <form class="form-horizontal" name="RegForm" action="{{ route('vendor.update',['vid' => $vendor->vid ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <center>
                <img src="{{ $vendor->photo }}" style="width: 100px;height: 100px;border: 4px solid #fff;border-radius: 63px;-webkit-border-radius: 63px;-moz-border-radius: 63px;-o-border-radius: 63px;">
            </center>
            <br>
            <div class="form-group">
                <label class="col-md-2 control-label">Upload image</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-picture-o"></i>
                        </span>
                        <input type="file" class="form-control1" name="image" value="{{ $vendor->photo }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Vendor Name</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control1" name="contactpersonname" value="{{ $vendor->contactpersonname }}" placeholder="{{ $vendor->contactpersonname }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Company name</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-university"></i>
                        </span>
                        <input type="text" class="form-control1" name="companyname" value="{{ $vendor->companyname }}" placeholder="{{ $vendor->companyname }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Contact</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" class="form-control1" name="contact" value="{{ $vendor->contact }}" placeholder="{{ $vendor->contact }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Email id</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        <input type="email" class="form-control1" name="email" value="{{ $vendor->email }}" placeholder="{{ $vendor->email }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Address</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-location-arrow"></i>
                        </span>
                        <input class="form-control1" name="address" value="{{ $vendor->address }}" placeholder="{{ $vendor->address }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">City</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-building"></i>
                        </span>
                        <input class="form-control1" value="{{ $vendor->city }}" placeholder="{{ $vendor->city }}" name="city" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Mail format</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input class="form-control1" value="{{ $vendor->mail_data }}" placeholder="{{ $vendor->mail_data }}" name="mail_data" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <?php
                        $p = $vendor->productname;
                        $d=explode(",",$p);
                        $dl = sizeof($d);
                        $prodlist = [];
                        for($i=0;$i<$dl;$i++){?>
                            @foreach(array_chunk($products->toArray(),4) as $chunk)
                            <table>
                                <tbody>
                                    <tr>
                                        @foreach($chunk as $item)
                                        <td width="200px">
                                            <?php 
                                            if($d[$i] == $item['pid']){
                                                echo '<div class="checkbox-inline1"><input type="checkbox" name=vdp[] value="'.$item['pid'].'" checked="">  '.$item['pname'].'</div>';
                                            }
                                            else{
                                                echo '<div class="checkbox-inline1"><input type="checkbox" name="vdp[]" value="'.$item['pid'].'">  '.$item['pname'].' </div>';
                                            }
                                            ?>    
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                        <?php }?>
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