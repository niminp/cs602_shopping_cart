@extends('layouts.app')

@section('content')
	<h1 class="text-center">Product</h1>
	@if($product)
		<div class="card">
			<div class="card-body">
				<h4>{{$product->name}}</h4>
				<p>Description: {{$product->description}}</p>
				<p>Price: ${{$product->price}}</p>
				<p>Quantity: {{$product->quantity}}</p>
				
				<a href="/products/{{$product->id}}/edit/" class="btn btn-primary">Edit</a>
				{{ Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right']) }}
					{{Form::hidden('_method', 'DELETE')}}
					{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
				{{ Form::close() }}
			</div>
		</div>
	@else
		<p>Error: No Product found with the provided ID</p>
	@endif
@endsection