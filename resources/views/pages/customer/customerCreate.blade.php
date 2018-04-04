@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Customer Creation</h2>

			<form action="/customer/create" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="formGroupFirstName">First Name</label>
					<input name="firstName" type="text" class="form-control" id="formGroupFirstName" placeholder="First Name" required/>
				</div>

				<div class="form-group">
					<label for="formGroupLastName">Last Name</label>
					<input name="lastName" type="text" class="form-control" id="formGroupLastName" placeholder="Last Name" required/>
				</div>

				<div class="form-group">
					<label for="formGroupPhone">Phone #</label>
					<input name="phoneNumber" type="tel" class="form-control" id="formGroupPhone" placeholder="Phone #" required/>
				</div>
				
				<div class="form-group">
					<label for="formGroupEmail">Email</label>
					<input name="email" type="email" class="form-control" id="formGroupEmail" placeholder="Email" required/>
				</div>
				
				<div class="row text-center">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="/customer" class="btn btn-danger">Cancel</a>
				</div>
			</form>
			
			<br />

			@include('layout.errors')
		</div>

		<div class="col-md-2"></div>

	</div>
</div>

@endsection