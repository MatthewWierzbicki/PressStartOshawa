@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-10 text-center">
			<form action="/customer/{{ $customer->id }}" method="POST">
				{{ csrf_field() }}
				<h3>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="formGroupId">Customer ID</label>
							<input type="text" class="form-control" id="formGroupId" value="{{ $customer->id }}" readonly/>
						</div>
						<div class="form-group col-md-3">
							<label for="formGroupFirstName">First Name</label>
							<input name="firstName" type="text" class="form-control" id="formGroupFirstName" value="{{ $customer->firstName }}" required/>
						</div>
						<div class="form-group col-md-4">
							<label for="formGroupLastName">Last Name</label>
							<input name="lastName" type="text" class="form-control" id="formGroupLastName" value="{{ $customer->lastName }}" required/>
						</div>
					</div>
				</h3>

				<h3>
					<div class="row">
						<div class="form-group col-md-5">
							<label for="formGroupPhone">Phone</label>
							<input name="phoneNumber" type="tel" class="form-control" id="formGroupPhone" value="{{ $customer->phoneNumber }}" required/>
						</div>
						<div class="form-group col-md-5">
							<label for="formGroupEmail">Email</label>
							<input name="email" type="email" class="form-control" id="formGroupEmail" placeholder="Email" value="{{ $customer->email }}" required/>
						</div>
					</div>
				</h3>
				<div class="row">
					<div class="col-md-10">
						<button type="submit" class="btn btn-primary">Save Changes</button>
					</div>
				</div>
			</form>
			
			<br />
			<div class="row">
				<div class="col-md-10">
					@include('layout.errors')
				</div>
			</div>
		</div>

		<div class="col-md-1"></div>
	</div> <!-- End Row 1 -->

	<div class="row">

		<div class="col-md-6">
			<h4 class="text-center">Invoices</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Purchase Date</th>
						<th>Price</th>
						<th>Item Name</th>
						<th>Status</th>
						<th>Complete</th>
						<th>Cancel</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customer->invoices as $invoice)
						<tr>
							<td>{{ $invoice->id }}</td>
							<td>{{ $invoice->dateCreated }}</td>
							<td>{{ $invoice->balance }}</td>
							<td>{{ App\Item::where('id', $invoice->item_id)->value('itemName') }}</td>
							<td>{{ $invoice->status }}</td>
							<td><a href="/invoice/{{ $invoice->id }}/complete" class="btn btn-primary btn-xs"><i class="fa fa-check-square-o"></i></a></td>
							<td><a href="/invoice/{{ $invoice->id }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<a href="/customer/{{ $customer->id }}/invoice/create" class="btn btn-info" role="button">New Invoice</a>
		</div>

		<div class="col-md-6">
			<h4 class="text-center">Tickets</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Subject</th>
						<th>Create Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customer->tickets as $ticket)
					<tr>
						<td>{{ $ticket->id }}</td>
						<td>{{ $ticket->description}}</td>
						<td>{{ $ticket->dateSubmitted }}</td>
						<td>{{ $ticket->status }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<a href="/ticket/create" class="btn btn-primary">New Ticket</a>
		</div>

	</div> <!-- End Row 2 -->
</div>

@endsection