@extends('Home')
@section('content')

<div class="col-md-10" style="left: 10%;margin-bottom: 50%">
	<div class="activity_box" style="padding-bottom: 70px;">
		<h2 style="background: black;text-align: center;">Inbox</h2>
		<form action="{{ route('messages.filter') }}" method="post" style="background-color: white;">
			{{ csrf_field() }}
			<div class="form-group" style="padding: 20px;">
				<select class="form-control" name="employee" id="" style="width: 70%;float: left;">
					<option value="">Search employee</option>
					@foreach($employees as $e)
					<option value="{{ $e->eid }}">{{ $e->ename }}</option>
					@endforeach
				</select>
				<input type="submit" value="Search" style="float: right;"/>
			</div>
			
		</form>
		<div class="scrollbar" style="height:400px">
			@foreach($inbox as $in)
			<div class="activity-row">
				<a href="{{ route('messages.chat',['id' => $in->eid ]) }}">
					<div class="col-xs-3 activity-img"><img src='{{ $in->photo }}' class="img-responsive" alt="" width="75px" height="75px" /></div>
					<div class="col-xs-7 activity-desc">
						<h5>{{ $in->ename }}</h5>
						<p>{{ $in->designation }}</p>
						<p>{{ $in->eid }}</p>
					</div>
					<div class="col-xs-2 activity-desc1">
						<h6>{{ $in->time }}</h6>
					</div>
					<div class="clearfix"> </div>
				</a>
			</div>
			@endforeach
		</div>
		
	</div>
</div>
<div class="clearfix"> </div>

@endsection