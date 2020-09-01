@extends('Home')
@section('content')

<div class="forms" style="margin-left: 150px;margin-right: 150px;margin-top: 50px">
	<div class="form-grids row widget-shadow">
		<div class="form-title">
			<h4>Change password</h4>
		</div>
		<div class="form-body">
			<form class="form-horizontal" name="RegForm" action="{{ route('updatepassword', ['id' => $company->cid]) }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Enter Password:</label><br>
					<div class="col-md-14">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-book"></i>
							</span>
							<input type="password" class="form-control" name="pwd" id="password" value="{{ $company->password }}" placeholder="Enter a valid password" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Confirm password</label><br>
					<div class="col-md-14">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-inr"></i>
							</span>

							<input type="password" class="form-control" id="confirm_password" name="confirm" onkeyup='check();' required>
							<script type="text/javascript">
								var check = function() {
									if (document.getElementById('password').value ==
										document.getElementById('confirm_password').value) 
									{
										document.getElementById('Change').disabled = false;

									} 
									else {
										document.getElementById('Change').disabled = true;
									}
								}
							</script>
						</div>
					</div>
				</div>
				<center>
					<button type="submit" class="btn btn-primary" id="Change" disabled>Change password</button>
				</center>
			</form>
		</div>
	</div>
</div>
<div class="clearfix"></div>

@endsection