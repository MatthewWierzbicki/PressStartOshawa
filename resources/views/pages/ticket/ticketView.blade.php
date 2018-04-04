@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Ticket View</h2>

			<form action="/ticket/{{ $ticket->id }}" method="POST">

				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-md-12">
						<label for="description">Ticket Description</label>
						<input name="description" type="text" class="form-control" id="description" value="{{ $ticket->description }}" readonly/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="id">Ticket ID</label>
						<input name="id" type="text" class="form-control" id="id" value="{{ $ticket->id }}" readonly/>
					</div>
					<div class="form-group col-md-6">
						<label for="userID">User ID</label>
						<input name="userID" type="text" class="form-control" id="userID" value="{{ $ticket->user_id }}" readonly/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
						<label for="dateSubmitted">Date Submitted</label>
						<input name="dateSubmitted" type="text" class="form-control" id="dateSubmitted" value="{{ $ticket->dateSubmitted }}" readonly/>
					</div>
					<div class="form-group col-md-4">
						<label for="customerID">Customer ID</label>
						<input name="customerID" type="text" class="form-control" id="customerID" value="{{ $ticket->customer_id }}" readonly/>
					</div>
					<div class="form-group col-md-4">
						<label for="status">Status</label>
						<select name="status" class="form-control">
							<option value="Open" selected>Open</option>
							<option value="Closed">Closed</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="comments">Comments:</label>
						<textarea class="form-control" id="comments" name="comments" rows="10">{{ $ticket->comments }}</textarea>
					</div>
				</div>

				<div class="row text-center">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="/ticket" class="btn btn-danger">Cancel</a>
				</div>
			</form>
			
			<br />

			@include('layout.errors')
		</div>

		<div class="col-md-2"></div>

	</div>
</div>

@endsection