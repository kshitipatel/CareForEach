@extends('Home')
@section('content')

<div class="col-md-12 chart-layer1-right"> 
	<div class="user-marorm">
		
		<div class="malorm-bottom">
			<div class="elements">
				<h3>Customer Details</h3><br>
				<div class="col-sm-12 w3-agileits-crd widgettable" style="align-items: center">
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<div class="pull-left" style="padding-right: 30px">
									<img class="lg-item-img" src="{{asset('app/images/contact.jpg')}}" alt="" width="100px" height="100px">
								</div>
								<div class="media-body">
									<div class="pull-left">
										<div class="lg-item-heading">{{ $customer->custname }}</div>
										<div class="lg-item-heading">{{ $customer->cust_company_name }}</div>
										<small class="lg-item-text">{{ $customer->expecteddate }}</small><br>
										<?php $gt = 0;?>
										@foreach($wishlist as $wl)
										<?php
										if($customer->wcid == $wl->wcid){
											$gt = $gt + $wl->sprice;
										}
										?>
										@endforeach
										<div class="lg-item-heading">Grand Total : <?php echo $gt;?> /-</div><br>
									</div>																
								</div>								
							</div>
						</div>
					</div>
				</div>
				<h3>Employee Details</h3><br>
				<div class="col-sm-12 w3-agileits-crd widgettable" style="align-items: center">
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<div class="pull-left" style="padding-right: 30px">
									<img class="lg-item-img" src="{{ $customer->photo }}" alt="" width="100px" height="100px">
								</div>
								<div class="media-body">
									<div class="pull-left">
										<div class="lg-item-heading">{{ $customer->ename }}</div>
										<small class="lg-item-text">{{ $customer->e_emailid }}</small><br>
										<br><br><br>
									</div>																
								</div>								
							</div>
						</div>
					</div>
				</div>
				<h3>Product Details</h3><br>
				@foreach($products as $p)
				<div class="col-sm-12 w3-agileits-crd widgettable" style="align-items: center">
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<div class="pull-left" style="padding-right: 30px">
									<img class="lg-item-img" src="{{ $p->pphoto }}" alt="" width="100px" height="100px">
								</div>
								<div class="media-body">
									<div class="pull-left">
										<div class="lg-item-heading" style="font-size: 20px">{{ $p->pname }}</div>
										<small class="lg-item-text" style="font-size: 15px">Code : {{ $p->pcode }}</small><br>
										<small class="lg-item-text" style="font-size: 15px">Price : Rs. {{ $p->price }} /-</small><br>
										<small class="lg-item-text" style="font-size: 15px">Quantity : {{ $p->qty }}</small><br>
										<small class="lg-item-text" style="font-size: 15px">Discription : {{ $p->pdesc }}</small><br>
									</div>																
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
@endsection