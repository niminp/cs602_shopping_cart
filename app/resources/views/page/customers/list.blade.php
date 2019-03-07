@extends('layouts.app')

@section('content')
	<h1 class="text-center">Customers</h1>

	@if(Auth::user()->hasRole('admin'))
		@if(count($customers) > 0)
			<table id="customers_table">
				<thead>
					<tr>
						<th>Customer ID</th>
						<th>Customer Name</th>
					</tr>
				</thead>
				<tbody>
				@foreach($customers as $customer)
					<tr>
						<td><a href="/customers/{{$customer->id}}/orders">{{$customer->id}}</a></td>
						<td>{{$customer->name}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center">No Customers Found</p>
		@endif
	@else
		<h3 class="text-center">Access Denied</h3>
	@endif
	

	<script type="text/javascript">
		$(document).ready(function() {
			$('#customers_table').DataTable();
		});
	</script>
@endsection