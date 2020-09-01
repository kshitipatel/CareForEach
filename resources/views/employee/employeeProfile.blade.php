@extends('Home')
@section('content')

<div class="col-md-12 chart-layer1-right"> 
	<div class="user-marorm">
		<div class="malorum-top">				
		</div>
		<div class="malorm-bottom">
			
			<img src="{{ $employee->photo }}" alt="{{ $employee->ename }}" style="width: 100px;height: 100px;display: inline-block;align-self: center; position: absolute;top: -60px;left: 45%;border: 4px solid #fff;border-radius: 63px;-webkit-border-radius: 63px;-moz-border-radius: 63px;-o-border-radius: 63px;">
			
			<h2>{{ $employee->ename }}</h2>
			<h4 style="text-align: center;">{{ $employee->designation }}</h4>
			<h5 style="text-align: center;margin-top: 1em;">{{ $employee->address }}</h5><br><br>
			<div class="elements">
				<div class="col-sm-4 w3-agileits-crd widgettable" style="align-items: center;left: 33%">
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<div class="list-group">
									<a class="list-group-item media">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Date Of Birth :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $employee->dob }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Join Date :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $employee->joiningdate }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media" href="">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Education :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $employee->edu }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media" href="">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">E-mail id :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $employee->e_emailid }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media" href="">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Contact no. :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $employee->mobilenum }}</div>
											</div>
										</div>
									</a>                                        
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<br>
			<center>
				<a href="{{ route('employee.edit' , ['eid' => $employee->eid ]) }}"><button type = "button" class = "btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
			</center>
		</div>
	</div>
</div>
<div class="clearfix"></div>
</div>

@endsection