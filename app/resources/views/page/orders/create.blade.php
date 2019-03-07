@extends('layouts.app')

@section('content')
	<script type="text/javascript">
		var count = 0;
		var products = `
			@foreach($products as $product)
				<option value"{{$product->id}}">{{$product->name}}</option>
			@endforeach
		`;

		$(document).ready(function() {
			$('input[type=submit]').hide();
		});

		function addProduct(){
			console.log(count);
			$("#form-content").append('<hr><select name="product' + count + '" class="form-control" required>' + products + '</select><input name="quantity' + count + '" type="number" class="form-control" placeholder="Quantity" min="1" required>');
			count += 1;
			$("input[type=submit]").show()
			$("input[name=count]").val(count)
		}
	</script>
	<h1 class="text-center">Place an Order</h1>
	
	<div class="card">
		<div class="card-body">
			<div class="text-center"><a class="btn btn-primary" onclick="addProduct()">+</a></div>
			{{ Form::open(['action' => 'OrderController@store', 'method' => 'POST']) }}
				<div id="form-content" class="form-group">
					
				</div>
				{{Form::hidden('count', '')}}
				{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
			{{ Form::close() }}
		</div>
	</div>
@endsection