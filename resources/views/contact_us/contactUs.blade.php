@extends('Home')
@section('content')


<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
	}

	* {
		box-sizing: border-box;
	}

	/* Style inputs */
	input[type=text], select, textarea {
		width: 100%;
		padding: 12px;
		border: 1px solid #ccc;
		margin-top: 6px;
		margin-bottom: 16px;
		resize: vertical;
	}

	input[type=submit] {
		background-color: #4CAF50;
		color: white;
		padding: 12px 20px;
		border: none;
		cursor: pointer;
	}

	input[type=submit]:hover {
		background-color: #45a049;
	}

	/* Style the container/contact section */
	.container {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 10px;
	}

	/* Create two columns that float next to eachother */
	.column {
		float: left;
		width: 50%;
		margin-top: 6px;
		padding: 20px;
	}

	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
		.column, input[type=submit] {
			width: 100%;
			margin-top: 0;
		}
	}
</style>
<div class="col-sm-12 w3-agileits-crd widgettable">
	<div class="card card-contact-list">
		<div class="agileinfo-cdr">

			<div class="container" style="margin-top: 20px;" >

				<div class="row">
					<div class="column">
						<img src="app/images/CareForEach.png" style="width:100%">
					</div>
					<div class="column">

						<br>

						<h3>Address</h3>
						<p>WebEarl Technologies Pvt. Ltd. A1, 2nd Floor, Surya Complex, Gurukul Memnagar Road, Gurukul, Ahmedabad-380052</p>
						<br><br>

						<h3>Phone</h3>
						<p>+91 9033251903</p>
						<br><br>
						<h3>Email</h3>
						<p>info@webearl.com</p>


					</div>
				</div>
			</div> 
		</div>
	</div>
</div>
	<div class="clearfix"></div>

	@endsection