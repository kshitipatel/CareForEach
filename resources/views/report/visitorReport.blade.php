@extends('Home')
@section('content')
<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<form class="form-horizontal" name="RegForm" action="{{ route('report.filter',['name' => 'Visitor']) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label class="col-md-2 control-label" for="subject">Select Employee</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<select class="form-control" name="emailid" id="subject">					
								@if($alreadyselected==NULL)
								<option value="">Select an Employee</option>
								@else
								<option value="{{$alreadyselected}}">{{$alreadyselected}}</option>
								@endif
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
					<a href="{{ route('report.visitexport', ['id' => $alreadyselected, 'cdate1' => $cdate1, 'cdate2' => $cdate2 ]) }}"><button type = "button" style="width:15%" class = "btn btn-success"><i class="fa fa-file-excel-o"></i> &nbsp;Export as Excel</button></a>
				</div>
			</form>

			<br>
			<hr class="widget-separator">
			<div class="card-body p-b-20">
				<div class="list-group">
					@foreach($visitors as $value)
					<div class="list-group-item media">						
						<div class="media-body">
							<div class="pull-left">	
								<h5><b>Name: </b> {{$value->ename}}</h5>
								<h5><b>Email: </b> {{$value->e_emailid}}  </h5>
								<h5><b>Date: </b> {{$value->date}}  </h5>
								<h5><b>Time: </b> {{$value->vtime}}  </h5>
								<h5><b>Visitor Name: </b> {{$value->visitername}}  </h5>
								<h5><b>Company Name: </b> {{$value->companyname}}  </h5>
								<h5><b>Area: </b> {{$value->area}}  </h5>
								<h5><b>Address: </b> {{$value->vaddress}}  </h5>
								<h5><b>Discussion: </b> {{$value->vdiscussion}}  </h5>
								<h5><b>Contact no: </b> {{$value->vcontactnum}}  </h5>
								<h5><b>Visitor's emaialid: </b> {{$value->visiter_emailid}}  </h5>
							</div>
						</div>
					</div>
					<hr>
					@endforeach
				</div>
			</div>
			<div class="clearfix"></div>

			@endsection