@extends('Home')
@section('content')

<div class="col-md-12 chart-layer1-right"> 
	<div class="user-marorm">
		<div class="malorum-top" style="background-color: black; ">				
		</div>
		<div class="malorm-bottom">
			
			<img src="{{ $company->c_photo }}" alt="{{ $company->cname }}" style="width: 150px;height: 150px;display: inline-block;align-self: center; position: absolute;left: 44%;border: 4px solid #fff;padding-bottom: 50px">
			<br><br>
			<h2 style="text-align: center;padding-top: 100px">{{ $company->cname }}</h2>
			<h4 style="text-align: center;">{{ $company->personname }}</h4><br>
			<h4 style="text-align: center;">{{ $company->designation }}</h4><br>
			<div class="elements">
				<div class="col-sm-4 w3-agileits-crd widgettable" style="align-items: center;left: 33%">
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<div class="list-group">
									<a class="list-group-item media">
										<div class="pull-right">
											<a href="{{ route('changepassword',['id'=> $company->cid ]) }}">
												<button type = "button" class = "btn btn-primary"><i class="fa fa-edit"></i> change password</button>
											</a>
										</div>
									</a><br>
									<a class="list-group-item media">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Registered date :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $company->regdate }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Email ID :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $company->c_emailid }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media" href="">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Mobile :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $company->mobile }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media" href="">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Address :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $company->address }}</div>
											</div>
										</div>
									</a>
									<a class="list-group-item media" href="">
										<div class="media-body">
											<div class="pull-left">
												<div class="lg-item-text">Total Employees :</div>
											</div>
											<div class="pull-right">
												<div class="lg-item-text">{{ $company->totalemp }}</div>
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
			
		</div>
	</div>
</div>
<div class="clearfix"></div>
</div>

@endsection