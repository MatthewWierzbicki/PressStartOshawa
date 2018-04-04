@extends ('layout.master')

@section('content')


<div class="container">

	<h2>Preorder Creation</h2>

	<div class="row">
		<form action="/preorder/create" method="POST">
			{{ csrf_field() }}
			<div class="col-md-6">
				<label for="formGroupId">Item Name</label>
				<input name="itemName" type="text" class="form-control" id="formGroupId" />
				<br/>
			</div>

			<div class="col-md-6">
				<label for="formGroupCustomerId">Customer Email</label>
				<input name="customerEmail" type="text" class="form-control" id="formGroupCustomerId" />
			</div>
		</div>

		<br />
		
		<div class="row text-center">
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="/item" class="btn btn-danger">Cancel</a>
		</div>
	</form>
	
	<br />

	@include('layout.errors')
</div>

@endsection