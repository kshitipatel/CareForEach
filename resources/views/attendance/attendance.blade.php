@extends('Home')
@section('content')



<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<form class="form-horizontal" name="RegForm" action="{{ route('attendance.pst') }}" onsubmit="#" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label class="col-md-2 control-label">Select a Date</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<input type="date" class="form-control1" name="cdate" placeholder="select a date" value="{{ $cdate }}" max="<?php echo date("Y-m-d"); ?>" required>
						</div>
					</div>
				</div>
				<center> 
					<button type="submit" class="btn btn-default">Submit</button>
				</center>
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
								<small class="lg-item-text">{{ $value->address }}</small><br>
								<small class="lg-item-text">{{ $value->logintime }}</small><br>
								<small class="lg-item-text">{{ $value->logouttime }}</small><br>
								<small class="lg-item-text">{{ $value->e_emailid }}</small><br>
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