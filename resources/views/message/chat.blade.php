@extends('Home')
@section('content')
<center>
<div class="col-md-10" style="align-content: center;left: 10%;margin-bottom: 50%">
	<div class="activity_box">
		<h3 style="background: black;text-align: center;">{{$employee->ename}}</h3>
		<form action="{{route('messages.send',['employee'=>$employee->e_emailid])}}" method="post" style="background-color: white;">
			{{ csrf_field() }}
			<input type="text" name="msg" value="" placeholder="Send Message" required="">
			<input type="submit" value="Send" />
		</form>
		<div class="scrollbar" style="height: 480px;">
			@foreach($chat as $ct)
			@if($ct->sender == $employee->e_emailid)
			<div class="activity-row activity-row1">
				<div class="col-xs-3 activity-img"><img src='{{$employee->photo}}' class="img-responsive" alt="" width="75px" height="75px" /><span>{{$ct->time}}</span></div>
				<div class="col-xs-5 activity-img1">
					<div class="activity-desc-sub">
						<p>{{$ct->text}}</p>
					</div>
				</div>
				<div class="col-xs-4 activity-desc1"></div>
				<div class="clearfix"> </div>
			</div>
			@else
			<div class="activity-row activity-row1">
				<div class="col-xs-2 activity-desc1"></div>
				<div class="col-xs-7 activity-img2">
					<div class="activity-desc-sub1">
						<p>{{$ct->text}}</p>
					</div>
				</div>
				<div class="col-xs-3 activity-img"><img src='{{$company->c_photo}}' class="img-responsive" alt="" width="75px" height="75px"/><span>06:02 AM</span></div>
				<div class="clearfix"> </div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</div>
<div class="clearfix"></div>
</center>
@endsection