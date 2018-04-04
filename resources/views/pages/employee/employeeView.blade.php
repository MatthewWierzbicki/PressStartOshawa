@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Edit Employee Details</h2>

			<form action="/employee/{{ $employee->id }}" method="POST">

				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-md-6">
						<label for="formGroupUserName">Username</label>
						<input name="userName" type="text" class="form-control" id="formGroupUserName" placeholder="Username" value="{{ $employee->userName }}" required>
					</div>
					<div class="form-group col-md-6">
						<label for="formGroupFullName">Full Name</label>
						<input name="fullName" type="text" class="form-control" id="formGroupFirstName" placeholder="First Name" value="{{ $employee->fullName }}" required/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="formGroupType">Type</label>
						<select name="type" class="form-control">
							<option value="G" selected>General</option>
							<option value="A">Admin</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="formGroupSIN">SIN</label>
						<input name="SIN" type="text" class="form-control" id="formGroupSIN" placeholder="SIN" value="{{ $employee->SIN }}" required/>
					</div>
				</div>

				<div class="form-group">
					<label for="formGroupEmail">Email</label>
					<input name="email" type="email" class="form-control" id="formGroupEmail" placeholder="Email" value="{{ $employee->email }}" required/>
				</div>

				<div class="form-group">
					<label for="formGroupPhone">Phone</label>
					<input name="phoneNumber" type="tel" class="form-control" id="formGroupPhone" placeholder="Phone Number" value="{{ $employee->phoneNumber }}" required/>
				</div>
				
				<div class="form-group">
					<label for="formGroupAddress">Address</label>
					<input name="address" type="text" class="form-control" id="formGroupAddress" placeholder="Address" value="{{ $employee->address }}" required/>
				</div>

				<div class="row text-center">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</div>
			</form>
			
			<br />

			@include('layout.errors')
		</div>

		<div class="col-md-2"></div>

	</div>
</div>

@endsection