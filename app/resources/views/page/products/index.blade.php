@extends('layouts.app')

@section('content')
	<h1 class="text-center">Products</h1>

	<div class="text-center">
		<a href="/products/create/" class="btn btn-primary text-center">Add a Product</a>
	</div>

	@if(count($products) > 1)
		<table id="products_table">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tbody>
			@foreach($products as $product)
				<tr>
					<td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
					<td>{{$product->description}}</td>
					<td>${{number_format($product->price, 2)}}</td>
					<td>{{$product->quantity}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@else
		<p class="text-center">No Products Found, Please add product</p>
	@endif

	<script type="text/javascript">
		$(document).ready(function() {
			$('#products_table').DataTable();
		});
	</script>
@endsection