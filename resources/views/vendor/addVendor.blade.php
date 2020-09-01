@extends('Home')
@section('content')

<div class="form-three widget-shadow">
    <div class=" panel-body-inputin">

        <form class="form-horizontal" name="RegForm" action="{{ route('vendor.store')}}" method="post" enctype="multipart/form-data">
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
                <label class="col-md-2 control-label">Vendor Name</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control1" name="contactpersonname" placeholder="Enter vendor's name" required>
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
                        <input type="text" class="form-control1" name="companyname" placeholder="Enter vendor's company name" required>
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
                        <input type="text" class="form-control1" name="contact" placeholder="Enter vendor's contact number" required>
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
                        <input type="email" class="form-control1" name="email" placeholder="Enter vendor's email id" required>
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
                        <input class="form-control1" name="address" placeholder="Enter vendor's address" required>
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
                        <input class="form-control1" placeholder="Enter vendor's city" name="city" required>
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
                        <input class="form-control1" placeholder="Enter mail format" name="mail_data" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
                <div class="col-sm-8">
                	<div class="input-group">
                            @foreach(array_chunk($products->toArray(),4) as $chunk)
                            <table>
                                <tbody>
                                    <tr>
                                        @foreach($chunk as $item)
                                        <td width="200px">
                                            <div class="checkbox-inline1"><input type="checkbox" name=vdp[] value="{{$item['pid']}}">  {{$item['pname']}}</div>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                    </div>
                </div>
            </div>
            <center> 
                <button type="submit" class="btn btn-default">Add Vendor</button>
            </center>
        </form>
    </div>
</div>
<div class="clearfix"></div>
@endsection