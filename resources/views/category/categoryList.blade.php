@extends('Home')
@section('content')

<div class="tables">
	<div class="panel-body widget-shadow">
		<div class="bs-example widget-shadow" data-example-id="hoverable-table">
			<h4>Category</h4>
			<a href="{{ route('category.add') }}"><button type = "button" class = "btn btn-success"><i class="fa fa-plus"></i>Add Category </button></a><br><br>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Category</th>
						<th>GST %</th>
					</tr>
				</thead>
				@foreach($category as $value)
				<tbody>
					<tr>
						<td>{{$value->catname}}</td>
						<td>{{$value->gst}}</td>
						<td style="width: 300px;"><a href="{{ route('category.edit' , ['id' => $value->catid ]) }}"><button type = "button" class = "btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
						<a onclick="return confirm('Are you sure you want to delete this category?')" href="{{ route('category.delete' , ['id' => $value->catid ]) }}"><button type = "button" class = "btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a></td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection