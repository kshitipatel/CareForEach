@extends('Home')
@section('content')

<div class="col-md-12 chart-layer1-right"> 
	<div class="user-marorm">		
		<div class="malorm-bottom">			
			<center>
				<img src="{{ $visitor->vphoto }}" alt="{{ $visitor->visitername }}" style="background-size:cover;
				min-height: 258px;width: 200px;height: 200px;">
			</center>
			<br>
			<div class="elements">
				<div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<tbody>
								<tr>
									<th scope="row">Name :</th>
									<td>{{ $visitor->visitername }}</td>
								</tr>
								<tr>
									<th scope="row">Company name :</th>
									<td>{{ $visitor->companyname }}</td>
								</tr>
								<tr>
									<th scope="row">Email :</th>
									<td>{{ $visitor->visiter_emailid }}</td>
								</tr>
								<tr>
									<th scope="row">Contact no :</th>
									<td>{{ $visitor->vcontactnum }}</td>
								</tr>
								<tr>
									<th scope="row">Area :</th>
									<td>{{ $visitor->area }}</td>
								</tr>
								<tr>
									<th scope="row">Address :</th>
									<td>{{ $visitor->vaddress }}</td>
								</tr>
								<tr>
									<th scope="row">Date :</th>
									<td>{{ $visitor->date }}</td>
								</tr>
								<tr>
									<th scope="row">Time :</th>
									<td>{{ $visitor->vtime }}</td>
								</tr>
								<tr>
									<th scope="row">Discussion :</th>
									<td>{{ $visitor->vdiscussion }}</td>
								</tr>
								<tr>
									<th scope="row">Employee e-mail :</th>
									<td>{{ $visitor->e_emailid }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
@endsection