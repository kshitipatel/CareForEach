@extends('Home')
@section('content')

<div class="forms" style="margin-left: 150px;margin-right: 150px;margin-top: 50px">
	<div class="form-grids row widget-shadow">
		<div class="form-title">
			<h4>Add Sub Category</h4>
		</div>
		<div class="form-body">
			<form class="form-horizontal" name="RegForm" action="{{ route('subcategory.store')}}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="subject">Select Category</label>
					<div class="col-md-14">

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-book"></i>
							</span>
							<select class="form-control" name="catid" id="subject" required>
								@foreach($category as $value)
								<option value="{{$value->catid}}">{{$value->catname}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Enter Sub Category Name:</label>
					<div class="col-md-14">

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-object-group"></i>
							</span>
							<input type="text" class="form-control" name="subcatname" placeholder="Enter Sub Category Name" required>
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