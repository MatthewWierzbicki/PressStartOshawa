@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Invoice Creation</h2>

			<form action="/customer/{{ $customer->id }}/invoice/create" method="POST">
				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-md-6">
						<label for="itemName">Name/Title</label>
						<input name="itemName" type="text" class="form-control" id="itemName" placeholder="Name/Title" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="customer_id">Customer ID</label>
						<input name="customer_id" type="text" class="form-control" id="customer_id" value="{{ $customer->id }}" readonly />
					</div>
				</div>

				<div class="row text-center">
					<button type="submit" class="btn btn-primary">Save</button>
					<a class="btn btn-danger" href="{{ URL::previous() }}">Go Back</a>
				</div>
			</form>

			<br />

			@include('layout.errors')
		</div>

		<div class="col-md-2"></div>
	</div>
</div>

@endsection