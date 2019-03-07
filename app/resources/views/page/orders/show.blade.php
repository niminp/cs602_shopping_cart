@extends('layouts.app')

@section('content')
	<h1 class="text-center">Order</h1>
	@if($order)
		<div class="card">
			<div class="card-body">
				<span style="display: none">{{$total = 0}}</span>
				<h4>Order ID: {{$order->id}}</h4>
				<h5>Customer Name: {{$order->user->name}}</h5>
				<p>Date Order Placed: {{$order->created_at}}</p>
				@if(count($order->order_details()->get()) > 0)
					@foreach($order->order_details()->get() as $order_detail)
						<span style="display: none">{{$total += $order_detail->price * $order_detail->quantity}}</span>
					@endforeach
					<p>Order Total: {{$total}}</p>
					<table id="orders_table">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody>
						@foreach($order->order_details()->get() as $order_detail)
							<tr>
								<td><a href="/products/{{$order_detail->product->id}}">{{$order_detail->product->name}}</a></td>
								<td>${{number_format($order_detail->price, 2)}}</td>
								<td>{{$order_detail->quantity}}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				@else
					<p class="text-center">No Orders Found</p>
				@endif
			</div>
		</div>
	@else
		<p>Error: No Order found with the provided ID</p>
	@endif

	<script type="text/javascript">
		$(document).ready(function() {
			$('#orders_table').DataTable();
		});
	</script>
@endsection