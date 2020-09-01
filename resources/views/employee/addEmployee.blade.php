@extends('Home')
@section('content')

<div class="form-three widget-shadow">
	<div class=" panel-body-inputin">
		
		<form class="form-horizontal" name="RegForm" action="{{ route('employee.store')}}" onsubmit="#" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="col-md-2 control-label">Upload image</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-picture-o"></i>
						</span>
						<input type="file" class="form-control1" name="image" placeholder="Select image" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Employee Name</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
						<input type="text" class="form-control1" name="ename" placeholder="Employee Name" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Date of Birth</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<input type="date" class="form-control1" name="dob" placeholder="Date of Birth" max="<?php echo date("Y-m-d"); ?>" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Joining Date</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<input type="date" class="form-control1" name="joiningdate" placeholder="Joining Date" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Designation</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-briefcase"></i>
						</span>
						<input type="text" class="form-control1" name="designation" placeholder="Designation" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Education</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-book"></i>
						</span>
						<input type="text" class="form-control1" name="edu" placeholder="Education" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Employee emailid</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope-o"></i>
						</span>
						<input type="email" class="form-control1" name="e_emailid" placeholder="Employee id" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Mobile</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-phone"></i>
						</span>
						<input type="tel" pattern="[0-9]{10}" name="mobilenum" class="form-control1" placeholder="Mobile Number" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Address</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-home"></i>
						</span>
						<textarea class="form-control1" placeholder="Address" name="address" required></textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Password</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-key"></i>
						</span>
						<input type="password" class="form-control1" name="password" placeholder="Enter your Password" required>
					</div>
				</div>
			</div>
			<center> <button type="submit" class="btn btn-default">Submit</button>
			</center>
		</form>
	</div>
</div>



@endsection