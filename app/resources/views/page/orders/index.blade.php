@extends('layouts.app')

@section('content')
	<h1 class="text-center">Orders</h1>

	@if(Auth::user()->hasRole('customer'))
		<div class="text-center">
			<a href="/orders/create/" class="btn btn-primary text-center">Add an Order</a>
		</div>
	@endif
	@if(count($orders) > 0)
		<table id="orders_table">
			<thead>
				<tr>
					<th>Order ID</th>
					<th>Customer Name</th>
					<th>Date Order Placed</th>
				</tr>
			</thead>
			<tbody>
			@foreach($orders as $order)
				<tr>
					<td><a href="/orders/{{$order->id}}">{{$order->id}}</a></td>
					<td>{{$order->user->name}}</td>
					<td>{{$order->created_at}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@else
		<p class="text-center">No Orders Found</p>
	@endif

	<script type="text/javascript">
		$(document).ready(function() {
			$('#orders_table').DataTable();
		});
	</script>
@endsection