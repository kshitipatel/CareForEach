@extends('Home')
@section('content')

<div class="tables">
	<div class="panel-body widget-shadow">
		<div class="bs-example widget-shadow" data-example-id="hoverable-table">
			<h4>Subcategory</h4>
			<a href="{{ route('subcategory.add') }}"><button type = "button" class = "btn btn-success"><i class="fa fa-plus"></i>   Add Category </button></a><br><br>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Subcategory</th>
						<th>Category</th>
					</tr>
				</thead>
				@foreach($subcategory as $value)
				<tbody>
					<tr>
						<td>{{$value->subcatname}}</td>
						<td>{{$value->catname}}</td>
						<td style="width: 300px;"><a href="{{ route('subcategory.edit' , ['id' => $value->subcatid ]) }}"><button type = "button" class = "btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
						<a onclick="return confirm('Are you sure you want to delete this subcategory?')" href="{{ route('subcategory.delete' , ['id' => $value->subcatid ]) }}"><button type = "button" class = "btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a></td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>
<div class="clearfix"></div>
@endsection