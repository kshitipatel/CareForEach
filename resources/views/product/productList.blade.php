@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

	<div class="card card-contact-list">
		<div class="agileinfo-cdr">
			<div class="card-header">
				<form class="form-horizontal" name="RegForm" action="{{ route('product.filter') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<table class="table">
						<tr>
							<td style="width: 40%;">
								<div class="form-group">
									<label for="subject"><b>Category</b></label>
									<select class="form-control" name="catid" id="">
										@if($selectedcat == NULL)
										<option value=""></option>
										@else
										<option value="{{ $selectedcat->catid }}">{{ $selectedcat->catname }}</option>
										@endif
										<option value="">All</option>
										@foreach($categories as $cat)
										<option value="{{ $cat->catid }}">{{ $cat->catname }}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td style="width: 10%;">
								<button type="submit" style=" margin-top: 20px;" class="btn btn-default">Submit</button>
							</td>
							<td style="width: 40%;">
								<div class="form-group">
									<label for="subject"><b>Subcategory</b></label>
									<select class="form-control" name="subcatid" id="">
										@if($selectedsubcat == NULL)
										<option value=""></option>
										@else
										<option value="{{ $selectedsubcat->subcatid }}">{{ $selectedsubcat->subcatname }}</option>
										@endif
										<option value="">All</option>
										@foreach($subcategories as $subcat)
										<option value="{{ $subcat->subcatid }}">{{ $subcat->subcatname }}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td style="width: 10%;">
								<button type="submit" style=" margin-top: 20px;" class="btn btn-default">Submit</button>
							</td>
							
						</tr>						
					</table>
					<a href="{{ route('product.add') }}"><button type = "button" class = "btn btn-success" style="margin-top: 20px"><i class="fa fa-plus"></i> Add Product </button></a>
				</form>
			</div>
			<br>
			
			@foreach(array_chunk($products->toArray(),3) as $chunk)
			<div class="row">
				@foreach($chunk as $item)
				<div class="col-sm-4 w3-agileits-crd widgettable">
					<a href="{{ route('product.view', ['pid' => $item['pid'] ]) }}">
						<div class="card card-contact-list">
							<div class="agileinfo-cdr">
								<div class="card-header">
									<center>
										<img class="lg-item-img" src="{{$item['pphoto']}}" style="width:200px;height: 200px;padding: 20px" alt="{{$item['pname']}}">
									</center>								
								</div>
								<hr class="widget-separator">
								<div class="card-body p-b-20">
									<div class="list-group">
										<a class="list-group-item media" href="">
											<div class="pull-left">
											</div>
											<div class="media-body">
												<div class="pull-left">
													<div class="lg-item-heading" style="font-size: 15px">{{$item['pname']}}</div>
													<small class="lg-item-text" style="font-size: 15px">Price : {{$item['price']}}/-</small>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="clearfix"></div>
@endsection