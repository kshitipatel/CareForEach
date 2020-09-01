@extends('Home')
@section('content')

<div class="col-md-12 chart-layer1-right"> 
	<div class="user-marorm">		
		<div class="malorm-bottom">
			<div class="elements">
				<h3>Product Description</h3>
				<div class="pull-right">
					<a href="{{ route('product.edit', ['id' => $product->pid]) }}"><button type = "button" class = "btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
					<a onclick="return confirm('Are you sure you want to delete the product?')" href="{{ route('product.delete', ['id' => $product->pid]) }}"><button type = "button" class = "btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a>  
				</div>
				<br>
				<hr>
				<center><img class="lg-item-img" src="{{ $product->pphoto }}" alt="" width="200px" height="200px"></center><br><br>
				<div class="col-sm-12 w3-agileits-crd widgettable" style="align-items: center">
					
							
					<div class="card card-contact-list">
						<div class="agileinfo-cdr">
							<div class="card-body p-b-20">
								<div class="media-body">

									<div class="pull-left">

										<div class="lg-item-heading">{{ $product->pname }}</div>
										<div class="lg-item-heading">Price : {{ $product->price }}/-</div>
										<small class="lg-item-text">Code : {{ $product->pcode }}</small><br>
										<small class="lg-item-text">Stock : {{ $product->stock }}</small><br>
										<small class="lg-item-text">Minimum Price : {{ $product->msprice }}/-</small><br>										
									</div>																
								</div>								
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
@endsection