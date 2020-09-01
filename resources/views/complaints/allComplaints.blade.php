@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<div class="card-header">
				<h3>All Complaints</h3>
			</div>
			<br>
			<hr class="widget-separator">
			<div class="card-body p-b-20">
				<div class="list-group">
					@foreach($complaints as $value)
					<div class="list-group-item media">
						<div class="pull-left">
							<img class="lg-item-img" src="{{ $value->photo }}" alt="" width="75px" height="75px">
						</div>
						<div class="media-body">
							<div class="pull-left">
								<div class="lg-item-heading">{{ $value->ename }}</div>
								<div class="lg-item-heading">{{ $value->designation }}</div>
								<div class="lg-item-heading">{{ $value->subject }}</div>
								<small class="lg-item-text">{{ $value->date }}</small><br>
								<small class="lg-item-text">{{ $value->description }}</small>

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