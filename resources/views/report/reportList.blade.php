@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<div class="card-header">
				<center>
					<h2>Reports</h2>
				</center>
			</div>
			<hr>
			<br>
			@foreach(array_chunk($reports,3) as $chunk)
			<div class="row">
				@foreach($chunk as $item)
				<div class="col-sm-4 w3-agileits-crd widgettable" style="padding: 10px;">
					<a href="{{ route('report.show',['name' => $item]) }}">
						<div class="card card-contact-list">
							<div class="agileinfo-cdr">
								<div class="card-header">
									<center>
										@if($item == 'Attendance')
										<img src="{{ asset('app/images/attendance.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Visitor')
										<img src="{{ asset('app/images/visitor.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Collection')
										<img src="{{ asset('app/images/collection.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Stock')
										<img src="{{ asset('app/images/stock.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Complaint')
										<img src="{{ asset('app/images/complaint.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Sales')
										<img src="{{ asset('app/images/sales.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Customer')
										<img src="{{ asset('app/images/customer.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Ginnie Box')
										<img src="{{ asset('app/images/ginnie box.jpg')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Leave')
										<img src="{{ asset('app/images/leave.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Location')
										<img src="{{ asset('app/images/location.png')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Pending Collection')
										<img src="{{ asset('app/images/pending collection.jpg')}}" style="width: 150px;height: 150px">
										@endif
										@if($item == 'Purchase')
										<img src="{{ asset('app/images/purchase.png')}}" style="width: 150px;height: 150px">
										@endif
									</center>								
								</div>
								<hr class="widget-separator">
								<div class="card-body p-b-20">
									<div class="list-group">
										<div class="media-body">
											<center>
												<div class="lg-item-heading" style="font-size: 20px">{{$item}}</div>
											</center>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div>

<div class="clearfix"></div>
@endsection