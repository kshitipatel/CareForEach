@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<div class="card-header">
				<form class="form-horizontal" name="RegForm" action="{{ route('order.filter') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<table class="table">
						<tr>
							<td style="width: 40%;">
								<div class="form-group">
									<label for="subject"><b>Time period</b></label>
									<select class="form-control" name="time" id="">
										<option value="">All</option>
										<option value="month">This Month</option>
										<option value="year">This year</option>
									</select>
								</div>
							</td>
							<td style="width: 40%;">
								<div class="form-group">
									<label for="subject"><b>Employee</b></label>
									<select class="form-control" name="employee" id="">
										<option value="">Select a employee</option>
										@foreach($employees as $employee)
										<option value="{{ $employee->e_emailid }}">{{ $employee->ename }}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td style="width: 10%;">
								<button type="submit" style=" margin-top: 20px;" class="btn btn-default">Submit</button>
							</td>
						</tr>
						
					</table>
					
				</form>
				

			</div>
			<br>
			
			<div class="card-body p-b-20">
				<div class="list-group">
					@foreach($orders as $value)
					<div class="list-group-item media">
						<div class="pull-left">
							<img class="lg-item-img" src="{{asset('app/images/contact.jpg')}}" alt="" width="100px" height="100px" style="border-radius: 50%;">
						</div>
						<div class="media-body">
							<div class="pull-left">
								<div class="lg-item-heading">{{ $value->customername }}</div>
								<div class="lg-item-heading">{{ $value->customercompanyname }}</div>
								<small class="lg-item-text">{{ $value->date }}</small><br>
								<small class="lg-item-text">{{ $value->customeremailid }}</small><br>
								<div class="lg-item-heading">Grand Total : {{ $value->grandtotal }} /-</div>
							</div>
							<div class="pull-right" style="padding-right: 200px; padding-top: 20px">
								<a href="{{ route('order.oview', ['oid' => $value->oid ]) }}"><button type = "button" class = "btn btn-success"><i class="fa fa-eye"></i> View Details</button></a>
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



@endsection