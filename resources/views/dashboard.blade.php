@extends('Home')
@section('content')

<div class="col_4">
	<a href="{{ route('orders') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<img class="pull-left" src="{{ asset('app/images/stock.png')}}" style="width: 70px;height: 70px">
				<div class="stats" style="padding-left: 10px">
					<h5><strong>{{$order}}</strong></h5>
					<span>My order</span>
				</div>
			</div>
		</div>
	</a>
	<a href="{{ route('attendance') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<img class="pull-left" src="{{ asset('app/images/attendance.png')}}" style="width: 80px;height: 80px">
				<div class="stats" style="padding-left: 10px">
					<h5><strong>{{$attendance}}</strong></h5>
					<span>Attendance</span>
				</div>
			</div>
		</div>
	</a>
	<a href="{{ route('employee.list') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<img class="pull-left" src="{{ asset('app/images/employee.png')}}" style="width: 70px;height: 70px">
				<div class="stats" style="padding-left: 10px">
					<h5><strong>{{$employee}}</strong></h5>
					<span>Employee</span>
				</div>
			</div>
		</div>
	</a>
	<a href="{{ route('vendor.list') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-money user2 icon-rounded"></i>
				<div class="stats">
					<h5><strong>{{$vendor}}</strong></h5>
					<span>Vendor</span>
				</div>
			</div>
		</div>
	</a>
	<div class="clearfix"> </div>
</div>

<div class="col_4" style="margin-top: 50px;">
	<a href="{{ route('ginnieBox') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<img class="pull-left" src="{{ asset('app/images/ginnie box.jpg')}}" style="width: 70px;height: 70px">
				<div class="stats" style="padding-left: 10px">
					<h5><strong>{{$ginnie}}</strong></h5>
					<span>Ginnie Box</span>
				</div>
			</div>
		</div>
	</a>
	<a href="{{ route('visitor') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<img class="pull-left" src="{{ asset('app/images/visitor.png')}}" style="width: 70px;height: 70px;border-radius: 50%">
				<div class="stats" style="padding-left: 10px">
					<h5><strong>{{$visit}}</strong></h5>
					<span>Visitors</span>
				</div>
			</div>
		</div>
	</a>
	<a href="{{ route('product.list') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-laptop user1 icon-rounded"></i>
				<div class="stats" style="padding-left: 10px">
					<h5><strong>{{$product}}</strong></h5>
					<span>Product</span>
				</div>
			</div>
		</div>
	</a>
	<a href="{{ route('leave') }}">
		<div class="col-md-3">
			<div class="r3_counter_box">
				<img class="pull-left" src="{{ asset('app/images/leave.png')}}" style="width: 70px;height: 70px">
				<div class="stats" style="padding-left: 10px">
					<h5><strong>{{$leave}}</strong></h5>
					<span>Leave</span>
				</div>
			</div>
		</div></a>

		<div class="clearfix"> </div>
	</div>

	<div class="col_4" style="margin-top: 50px;">
		<a href="{{ route('category.list') }}">
			<div class="col-md-3">
				<div class="r3_counter_box">
					<img class="pull-left" src="{{ asset('app/images/cat.png')}}" style="width: 70px;height: 70px">
					<div class="stats" style="padding-left: 10px">
						<h5><strong>{{$category}}</strong></h5>
						<span>Category</span>
					</div>
				</div>
			</div>
		</a>
		<a href="{{ route('subcategory.list') }}">
			<div class="col-md-3">
				<div class="r3_counter_box">
					<img class="pull-left" src="{{ asset('app/images/subcat.jpg')}}" style="width: 70px;height: 70px">
					<div class="stats" style="padding-left: 10px">
						<h5><strong>{{$subcategory}}</strong></h5>
						<span>Subcategory</span>
					</div>
				</div>
			</div>
		</a>
		<a href="{{ route('complaint') }}">
			<div class="col-md-3">
				<div class="r3_counter_box">
					<img class="pull-left" src="{{ asset('app/images/complaint.png')}}" style="width: 70px;height: 70px">
					<div class="stats" style="padding-left: 10px">
						<h5><strong>{{$complaint}}</strong></h5>
						<span>Complaints</span>
					</div>
				</div>
			</div>
		</a>
		<a href="{{ route('reports') }}">
			<div class="col-md-3">
				<div class="r3_counter_box">
					<img class="pull-left" src="{{ asset('app/images/report.jpg')}}" style="width: 70px;height: 70px">
					<div class="stats" style="padding-left: 10px">
						<h5><strong>10 +</strong></h5>
						<span>Reports</span>
					</div>
				</div>
			</div>
		</a>

		<div class="clearfix"> </div>
	</div>






	@endsection