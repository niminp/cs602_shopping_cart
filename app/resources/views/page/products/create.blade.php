@extends('layouts.app')

@section('content')
	<h1 class="text-center">Create Product</h1>
	{{ Form::open(['action' => 'ProductController@store', 'method' => 'POST']) }}	
		<div class="form-group">
			{{Form::label('name', 'Name*')}}
			{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Product Name', 'required' => true])}}
		</div>
		<div class="form-group">
			{{Form::label('name', 'Description*')}}
			{{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description', 'required' => true])}}
		</div>
		<div class="form-group">
			{{Form::label('name', 'Price*')}}
			{{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Price', 'step' => '0.01', 'min' => '0', 'required' => true])}}
		</div>
		<div class="form-group">
			{{Form::label('name', 'Quantity*')}}
			{{Form::number('quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantity', 'min' => '0', 'required' => true])}}
		</div>
		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{{ Form::close() }}
@endsection