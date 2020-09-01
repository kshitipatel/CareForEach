@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<div class="card-header">
				<form class="form-horizontal" name="RegForm" action="{{ route('visitor.filter') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<table class="table">
						<tr>
							<td style="width: 40%;">
								<div class="form-group">
									<label for="subject"><b>Time period</b></label>
									<select class="form-control" name="time" id="">
										<option value="">All</option>
										<option value="month">This Month</option>
										<option value="today">Today</option>
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
					@foreach($visitors as $value)
					<div class="list-group-item media">
						<div class="pull-left">
							<img class="lg-item-img" src="{{ $value->vphoto }}" alt="" width="75px" height="75px">
						</div>
						<div class="media-body">
							<div class="pull-left">
								<div class="lg-item-heading">{{ $value->visitername }}</div>
								<div class="lg-item-heading">{{ $value->companyname }}</div>
								<small class="lg-item-text">{{ $value->date }}</small><br>
								<small class="lg-item-text">{{ $value->vtime }}</small><br>
								<small class="lg-item-text">{{ $value->visiter_emailid }}</small>
							</div>
							<div class="pull-right" style="padding-right: 200px">
								<a href="{{ route('visitor.view' , ['veid' => $value->veid ]) }}"><button type = "button" class = "btn btn-success"><i class="fa fa-eye"></i> View Details</button></a>
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