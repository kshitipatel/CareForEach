@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<div class="card-header">
				<form class="form-horizontal" name="RegForm" action="{{ route('leave.filter') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<table class="table">
						<tr>
							<td style="width: 40%;">
								<div class="form-group">
									<select class="form-control" name="status" id="">
										<option value="">All</option>
										<option value="pending">Pending</option>
										<option value="approved">Approved</option>
										<option value="rejected">Rejected</option>
									</select>
								</div>
							</td>
							<td style="width: 10%;">
								<button type="submit" class="btn btn-default">Submit</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<br>			
			<div class="card-body p-b-20">
				<div class="list-group">
					@foreach($leave_requests as $value)
					<div class="list-group-item media">
						<div class="pull-left">
							<img class="lg-item-img" src="{{ $value->photo }}" alt="" width="75px" height="75px">
						</div>
						<div class="media-body">
							<div class="pull-left">
								<div class="lg-item-heading">{{ $value->ename }}</div>
								<div class="lg-item-heading">{{ $value->designation }}</div>
								<small class="lg-item-text">{{ $value->mobilenum }}</small><br>
								<small class="lg-item-text">{{ $value->leavestartdate }} To {{ $value->leaveenddate }}</small><br>
								<small class="lg-item-text">{{ $value->reason }}</small>
							</div>
							@if( $value->status == 'YES')
							<div class="pull-right" style="padding-right: 200px">
								<button type = "button" class = "btn btn-success disabled"><i class="fa fa-check"></i> Approved</button>
							</div>
							@elseif( $value->status == 'NO')
							<div class="pull-right" style="padding-right: 200px">
								<button type = "button" class = "btn btn-danger disabled"><i class="fa fa-times"></i> Rejected</button>
							</div>
							@else
							<div class="pull-right" style="padding-right: 200px">
								<a href="{{ route('leave.decision' , ['status' => 'YES','id' => $value->lrid ]) }}">
									<button type = "button" value="approve" class = "btn btn-success"><i class="fa fa-check"></i> Approve</button>
								</a>
							</div>
							<div class="pull-right" style="padding-right: 50px">
								<a href="{{ route('leave.decision' , ['status' => 'NO','id' => $value->lrid ]) }}">
									<button type = "button" class = "btn btn-danger"><i class="fa fa-times"></i> Reject</button>
								</a>
							</div>
							@endif						
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