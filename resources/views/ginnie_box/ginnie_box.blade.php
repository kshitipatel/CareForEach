@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<div class="card-body p-b-20">
				<div class="list-group">

					@foreach($customers as $customer)

					<div class="list-group-item media">
						<div class="pull-left">
							<img class="lg-item-img" src="{{asset('app/images/contact.jpg')}}" alt="" width="100px" height="100px">
						</div>
						<div class="media-body">
							<div class="pull-left">
								<div class="lg-item-heading">{{ $customer->custname }}</div>
								<div class="lg-item-heading">{{ $customer->cust_company_name }}</div>
								<small class="lg-item-text">{{ $customer->expecteddate }}</small><br>
								<small class="lg-item-text">{{ $customer->custemailid }}</small><br>
								<?php $gt = 0;?>
								@foreach($wishlist as $wl)
								<?php
								if($customer->wcid == $wl->wcid){
									$gt = $gt + $wl->sprice;
								}
								?>
								@endforeach
								<div class="lg-item-heading">Grand Total : <?php echo $gt;?> /-</div>
							</div>
							<div class="pull-right" style="padding-right: 200px; padding-top: 20px">
								<a href="{{ route('ginnieBox.gview', ['wcid' => $customer->wcid ]) }}"><button type = "button" class = "btn btn-success"><i class="fa fa-eye"></i> View Details</button></a>
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
<div class="clearfix"></div>


@endsection