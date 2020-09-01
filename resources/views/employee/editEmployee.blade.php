@extends('Home')
@section('content')

<div class="form-three widget-shadow">
    <div class=" panel-body-inputin">

        <form class="form-horizontal" name="RegForm" action="{{ route('employee.update',['id' => $employee->eid ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <center>
                <img src="{{ $employee->photo }}" style="width: 100px;height: 100px;border: 4px solid #fff;border-radius: 63px;-webkit-border-radius: 63px;-moz-border-radius: 63px;-o-border-radius: 63px;">
            </center>
            <br>
            <div class="form-group">
                <label class="col-md-2 control-label">Upload image</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-picture-o"></i>
                        </span>
                        <input type="file" class="form-control1" name="image" value="{{ $employee->photo }}" placeholder="{{ $employee->photo }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Employee Name</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control1" name="ename" value="{{ $employee->ename }}" placeholder="{{ $employee->ename }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Date of Birth</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <?php
                        $d=explode("-",$employee->dob);
                        $d_c=strlen($d[1]);
                        if($d_c==1)
                        {
                            $d[1]="0".$d[1];
                        }
                        $d_a=implode("-", $d);
                        ?>
                        <input type="date" class="form-control1" name="dob" value="<?php echo $d_a; ?>" max="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Joining Date</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <?php
                        $j=explode("-",$employee->joiningdate);
                        $j_c=strlen($j[1]);
                        if($j_c==1)
                        {
                            $j[1]="0".$j[1];
                        }
                        $j_a=implode("-", $j);
                        ?>
                        <input type="date" class="form-control1" name="joiningdate" value="<?php echo $j_a; ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Designation</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-briefcase"></i>
                        </span>
                        <input type="text" class="form-control1" name="designation" value="{{ $employee->designation }}" placeholder="{{ $employee->designation }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Education</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-book"></i>
                        </span>
                        <input type="text" class="form-control1" name="edu" value="{{ $employee->edu }}" placeholder="{{ $employee->edu }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Employee emailid</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        <input type="email" class="form-control1" name="e_emailid" value="{{ $employee->e_emailid }}" placeholder="{{ $employee->e_emailid }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Mobile</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="tel" pattern="[0-9]{10}" name="mobilenum" class="form-control1" value="{{ $employee->mobilenum }}" placeholder="{{ $employee->mobilenum }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Address</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </span>
                        <input class="form-control1" value="{{ $employee->address }}" placeholder="{{ $employee->address }}" name="address" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Password</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        <input type="password" class="form-control1" name="password" placeholder="{{ $employee->password }}" value="{{ $employee->password }}" required>
                    </div>
                </div>
            </div>
            <center> <button type="submit" class="btn btn-default">Update</button>
            </center>
        </form>
    </div>
</div>



@endsection