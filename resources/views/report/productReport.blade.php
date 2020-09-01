@extends('Home')
@section('content')
<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<form class="form-horizontal" name="RegForm" action="{{ route('report.filter',['name' => 'Stock']) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<!--label class="col-md-2 control-label" for="subject"></label-->
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon">
								category
							</span>
							<select class="form-control" name="category" id="category">
								<option value="{{$category}}">{{$category}}</option>
								@foreach($categories as $cat)
								<option value="{{ $cat->catid }}">{{ $cat->catname }}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon">
								subcategory
							</span>
							<select class="form-control" name="subcategory" id="subcategory">
								<option value="{{$subcategory}}">{{$subcategory}}</option>
								@foreach($subcategories as $subcat)
								<option value="{{ $subcat->subcatid }}">{{ $subcat->subcatname }}</option>
								@endforeach
							</select>
						</div>
					</div>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
					<button type="submit" class="btn btn-default" style="width:15%">Filter </button>	
				</div>

				<div class="form-group">
					<!--label class="col-md-2 control-label" for="subject"></label-->
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-shopping-basket"></i>
							</span>
							<select class="form-control" name="product">	
								@if($alreadyselected==NULL)
								<option value="">Select an Product</option>
								@else
								<?php
								foreach ($products as $sp) {
									if($sp->pid == $alreadyselected){
										$selected = $sp->pname;
									}
									else{
										$selected = "hello";
									}
								} 
								?>
								<option value="{{$alreadyselected}}"><?php echo $selected;?></option>
								@endif
								@foreach($selectproduct as $value)
								<option value="{{$value->pid}}">{{$value->pname}}</option>
								@endforeach
							</select>
						</div>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
					if($category==NULL){
						$category="no";
					}					
					if($subcategory==NULL ){					
						$subcategory="no";
					}
					if($alreadyselected==NULL){
						$alreadyselected="no";
					}
					?>
					<a href="{{ route('report.stockexport', ['product' => $alreadyselected, 'category' => $category, 'subcategory' => $subcategory ]) }}"><button type = "button" style="width:15%" class = "btn btn-success"><i class="fa fa-file-excel-o"></i> &nbsp;Export as Excel</button></a>
				</div>
			</form>

			<br>
			<hr class="widget-separator">

			<div class="card-body p-b-20">
				<div class="list-group">
					@foreach($products as $value)
					<div class="list-group-item media">	
						<div class="media-body">
							<div class="pull-left">	
								<h5><b>Product Name: </b> {{$value->pname}}</h5>
								<h5><b>Product Code: </b> {{$value->pcode}}  </h5>
								<h5><b>Stock:</b> {{$value->stock}}  </h5>
								<h5><b>Minimum Stock:</b> {{$value->minimum_stock}} </h5>
								<h5><b>Subcategory Name</b> {{$value->subcatname}}  </h5>
								<h5><b>Category Name:</b> {{$value->catname}}  </h5>
							</div>
						</div>
					</div>
					<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

	<!--<script type="text/javascript">
		$('#category').on('change',function(e){
			console.log(e);
			var cat_id = e.target.value;
			$.get('/ajax-subcat?cat_id='+ cat_id,function(data){
				$('#subcategory').empty();
				$.each(data,function(index,subcatObj)){
					$('#subcategory').append('<oprion value="'+subcatObj.subcatid+'">'+subcatObj.subcatname+'</option>');
				}
			});
		});
	</script>-->

	@endsection