@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-3"></div>

		<div class="col-md-6">
			<h1 class="text-center">Registration</h1>
			<form method="POST" action="/register">

				{{ csrf_field() }}

				<div class="form-group">
					<label for="username">Username</label>
					<input name="username" type="text" class="form-control" id="username" placeholder="Username" required/>
				</div>

				<div class="form-group">
					<label for="fullname">Full Name</label>
					<input name="fullname" type="text" class="form-control" id="fullname" placeholder="Full Name" required/>
				</div>

				<div class="form-group">
					<label for="type">Type</label>
						<select name="type" class="form-control">
							<option value="G" selected>General</option>
							<option value="A">Admin</option>
						</select>
				</div>

				<div class="form-group">
					<label for="SIN">SIN</label>
					<input name="SIN" type="text" class="form-control" id="SIN" placeholder="SIN" required/>
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" type="email" class="form-control" id="email" placeholder="Email" required/>
				</div>

				<div class="form-group">
					<label for="phonenumber">Phone Number</label>
					<input name="phonenumber" type="tel" class="form-control" id="phonenumber" placeholder="Phone Number" required/>
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input name="address" type="text" class="form-control" id="address" placeholder="Address" required/>
				</div>

				<div class="form-group">
					<label for="passsword">Password</label>
					<input name="password" type="password" class="form-control" id="passsword" placeholder="Password" required/>
				</div>

				<div class="form-group">
					<label for="password_confirmation">Password Confirmation</label>
					<input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password" required/>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>

			</form>
			
			<br />

			@include('layout.errors')
		</div>

		<div class="col-md-3"></div>

	</div>
</div>

@endsection