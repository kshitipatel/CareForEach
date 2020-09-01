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
									<img class="lg-item-img" src="{{asset('app/images/contact.jpg')}}" alt="" width="100px" height="100px" style="border-radius: 50%;">
								</div>
								<div class="media-body">
									<div class="pull-left">
										<div class="lg-item-heading">{{ $customer_employee->customername }}</div>
										<div class="lg-item-heading">{{ $customer_employee->customercompanyname }}</div>
										<small class="lg-item-text">{{ $customer_employee->date }}</small><br>
										<small class="lg-item-text">{{ $customer_employee->customeremailid }}</small><br>
										<div class="lg-item-heading">Grand Total : {{ $customer_employee->grandtotal }} /-</div>
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
									<img class="lg-item-img" src="{{ $customer_employee->photo }}" alt="" width="100px" height="100px" style="border-radius: 50%;">
								</div>
								<div class="media-body">
									<div class="pull-left">
										<div class="lg-item-heading">{{ $customer_employee->ename }}</div>
										<small class="lg-item-text">{{ $customer_employee->e_emailid }}</small><br>
										<br><br><br>
									</div>																
								</div>								
							</div>
						</div>
					</div>
				</div>
				<h3>Payment Details</h3><br>
				@foreach($payments as $payment)
				<?php $p = $payment->grandtotal; $tp=0; ?>
				@endforeach
				@foreach($payments as $payment)
				<div class="col-sm-12 w3-agileits-crd widgettable" style="align-items: center">
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<small class="lg-item-text">Date : {{ $payment->p_date }}</small><br>
								<small class="lg-item-text">Mode : {{ $payment->paymenttype }}</small><br>
								<small class="lg-item-text">Paid amount : {{ $payment->amount }}</small><br>
								<?php $p = $p - $payment->amount; $tp = $tp +  $payment->amount;?>
								<small class="lg-item-text">Pending amount : <?php echo $p;?></small><br>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="col-sm-12 w3-agileits-crd widgettable" style="align-items: center">
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<h4>Total paid amount: <?php echo $tp;?></h4>
							</div>
						</div>
					</div>
				</div>
				<a href="{{ route('order.pview', ['oid' => $customer_employee->oid ]) }}">
					<button type = "button" class = "btn btn-primary" style="align-items: center"><i class="fa fa-eye"></i> View Product</button>
				</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

@endsection