@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Ticket Creation</h2>

			<form action="/ticket/create" method="POST">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="formGroupDescription">Description</label>
					<input name="description" type="text" class="form-control" id="formGroupDescription" placeholder="Description" required/>
				</div>

				<div class="form-group">
					<label for="formGroupCustomerID">Customer ID</label>
					<input name="customerID" type="text" class="form-control" id="formGroupCustomerID" placeholder="Customer ID" required/>
				</div>

				<button type="submit" class="btn btn-primary">Create</button>
			</form>
			
			<br />

			@include('layout.errors')
		</div>

		<div class="col-md-2"></div>

	</div>
</div>

@endsection