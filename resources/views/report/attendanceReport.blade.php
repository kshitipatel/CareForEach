@extends('Home')
@section('content')
<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<form class="form-horizontal" name="RegForm" action="{{ route('report.filter',['name' => 'Attendance']) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label class="col-md-2 control-label" for="subject">Select Employee</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<select class="form-control" name="emailid" id="subject">
								<option value="{{$alreadyselected}}">{{$alreadyselected}}</option>
								@foreach($employees as $value)
								<option value="{{$value->e_emailid}}">{{$value->ename}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-default" style="width:15%">Filter </button>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Select a Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon">
								To <i class="fa fa-calendar"></i>
							</span>
							<input type="date" class="form-control1" name="cdate1" value="{{$cdate1}}" max="<?php echo date("Y-m-d"); ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon">
								From <i class="fa fa-calendar"></i>
							</span>
							<input type="date" class="form-control1" name="cdate2"value="{{$cdate2}}" max="<?php echo date("Y-m-d"); ?>">
						</div>
					</div>
					<?php
					if($cdate1==NULL && $cdate2==NULL ){
						$cdate1="no";
						$cdate2="no";
					}
					if($alreadyselected==NULL){
						$alreadyselected="no";
					}
					?>
					<a href="{{ route('report.export', ['id' => $alreadyselected, 'cdate1' => $cdate1, 'cdate2' => $cdate2 ]) }}"><button type = "button" style="width:15%" class = "btn btn-success"><i class="fa fa-file-excel-o"></i> &nbsp;Export as Excel</button></a>
				</div>
			</form>

			<br>
			<hr class="widget-separator">
			<div class="card-body p-b-20">
				<div class="list-group">
					@foreach($attendance as $value)
					<div class="list-group-item media">
						<div class="pull-left">
							<img class="lg-item-img" src="{{ $value->photo }}" alt="" width="75px" height="75px">
						</div>
						<div class="media-body">
							<div class="pull-left">
								<div class="lg-item-heading">{{ $value->ename }}</div>
								<div class="lg-item-heading">{{ $value->designation }}</div>
								<small class="lg-item-text">Address : {{ $value->address }}</small><br>
								<small class="lg-item-text">Login time : {{ $value->logintime }}</small><br>
								<small class="lg-item-text">Logout time : {{ $value->logouttime }}</small><br>
								<small class="lg-item-text">Email id : {{ $value->e_emailid }}</small><br>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

@endsection