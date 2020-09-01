@extends('Home')
@section('content')

<div class="forms" style="margin-left: 150px;margin-right: 150px;margin-top: 50px">
	<div class="form-grids row widget-shadow">
		<div class="form-title">
			<h4>Edit Category</h4>
		</div>
		<div class="form-body">
			<form class="form-horizontal" name="RegForm" action="{{ route('category.update', ['id' => $category->catid ])}}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Category Name:</label><br>
					<div class="col-md-14">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-book"></i>
							</span>
							<input type="text" class="form-control" name="catname" value="{{ $category->catname }}" placeholder="{{ $category->catname }}" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>GST%</label><br>
					<div class="col-md-14">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-inr"></i>
							</span>

							<input type="text" class="form-control" pattern="[0-9]{1,3}" name="gst" value="{{ $category->gst }}" placeholder="{{ $category->gst }}" required>
						</div>
					</div>
				</div>
				<center>
					<button type="submit" class="btn btn-primary">Update</button>
				</center>
			</form>
		</div>
	</div>
</div>
<div class="clearfix"></div>
@endsection