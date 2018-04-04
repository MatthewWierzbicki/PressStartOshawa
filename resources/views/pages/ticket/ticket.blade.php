@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h2>Tickets
				<small>
					<div class="pull-right">
						<a href="/ticket/create" class="btn btn-primary">New Ticket</a>
					</div>
				</small>
			</h2>

			<form method="POST">
				{{ csrf_field() }}
				
				<div class="input-group pull-right" style="padding-top: 10px;">
					<input name="search" type="text" class="form-control" placeholder="Search..." required />
					<span class="input-group-btn">
						<button type="submit" class="btn btn-success">Search</button>
						<a href="/item" class="btn btn-warning">Reset Search</a>
					</span>
				</div>
			</form>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Submit Date</th>
						<th>Description</th>
						<th>Status</th>
						<th>Customer ID</th>
						<th>Employee ID</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tickets as $ticket)
					<tr>
						<td>{{ $ticket->id }}</td>
						<td>{{ $ticket->dateSubmitted }}</td>
						<td>{{ $ticket->description }}</td>
						<td>{{ $ticket->status }}</td>
						<td>{{ $ticket->customer_id }}</td>
						<td>{{ $ticket->user_id }}</td>
						<td><a href="/ticket/{{ $ticket->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $tickets->links() }}
		</div>
	</div>
</div>

@endsection