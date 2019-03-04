@extends('layouts.app')

@section('content')
	<h1 class="text-center">Edit Product</h1>
	{{ Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'POST']) }}	
		<div class="form-group">
			{{Form::label('name', 'Name*')}}
			{{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Product Name', 'required' => true])}}
		</div>
		<div class="form-group">
			{{Form::label('name', 'Description*')}}
			{{Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description', 'required' => true])}}
		</div>
		<div class="form-group">
			{{Form::label('name', 'Price*')}}
			{{Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price', 'step' => '0.01', 'min' => '0', 'required' => true])}}
		</div>
		<div class="form-group">
			{{Form::label('name', 'Quantity*')}}
			{{Form::number('quantity', $product->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity', 'min' => '0', 'required' => true])}}
		</div>
		{{Form::hidden('_method', 'PUT')}}
		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{{ Form::close() }}
@endsection