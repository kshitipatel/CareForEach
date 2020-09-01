@extends('Home')
@section('content')

<div class="forms" style="margin-left: 150px;margin-right: 150px;margin-top: 50px">
	<div class="form-grids row widget-shadow">
		<div class="form-title">
			<h4>Add Category</h4>
		</div>
		<div class="form-body">
			<form class="form-horizontal" name="RegForm" action="{{ route('category.store')}}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Enter Category Name:</label><br>
					<div class="col-md-14">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-book"></i>
							</span>
							<input type="text" class="form-control" name="catname" placeholder="Enter Category Name" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Add GST%</label><br>
					<div class="col-md-14">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-inr"></i>
							</span>

							<input type="text" class="form-control" name="gst" placeholder="Add GST%" required>
						</div>
					</div>
				</div>
				<center>
					<button type="submit" class="btn btn-primary">ADD</button>
				</center>

			</form>
		</div>
	</div>
</div>
<div class="clearfix"></div>
@endsection