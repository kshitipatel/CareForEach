@extends('Home')
@section('content')

<div class="col-md-12 chart-layer1-right"> 
	<div class="user-marorm">
		
		<div class="malorm-bottom">
			<div class="elements">
				<h3>Products ordered by {{ $customer_employee->customername }}</h3><br>
				@foreach($productdetails as $p)
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

@endsection