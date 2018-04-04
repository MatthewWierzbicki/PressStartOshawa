@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Item View</h2>

			<form action="/item/{{ $item->id }}" method="POST">
				{{ csrf_field() }}
				<div class="row">
					<div class="form-group col-md-6">
						<label for="itemName">Name/Title</label>
						<input name="itemName" type="text" class="form-control" id="itemName" value="{{ $item->itemName }}" readonly/>
					</div>
					<div class="form-group	 col-md-6">
						<label for="quantity">Quantity</label>
						<input name="quantity" type="number" class="form-control" id="quantity" value="{{ $item->quantity }}" required />
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="releaseDate">Release Date</label>
						<input name="releaseDate" type="date" class="form-control" id="releaseDate" value="{{ $item->releaseDate }}" readonly/>
					</div>
					<div class="form-group col-md-6">
						<label for="developer">Developer</label>
						<input name="developer" type="text" class="form-control" id="developer" value="{{ $item->developer }}" readonly/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="formGroupDescription">Description</label>
						<input name="description" type="text" class="form-control" id="formGroupDescription" value="{{ $item->description }}" readonly/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="formGroupType">Product Type</label>
						<input name="productType" type="text" class="form-control" id="formGroupType" value="{{ $item->productType }}" readonly/>
					</div>
					<div class="form-group col-md-6">
						<label for="formGroupCondition">Condition</label>
						<input name="condition" type="text" class="form-control" id="formGroupCondition" value="{{ $item->condition }}" readonly/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="formGroupPrice">Price</label>
						<input name="price" type="number" min="0.00" class="form-control" id="formGroupPrice" value="{{ $item->price }}" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="formGroupConsole">Console</label>
						<input name="console" type="text" class="form-control" id="formGroupConsole" value="{{ $item->console }}" readonly/>
					</div>
				</div>
				<div class="row text-center">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="/item" class="btn btn-danger">Cancel</a>
				</div>
			</form>
			
			<br />

			@include('layout.errors')
		</div>

		<div class="col-md-2"></div>

	</div>
</div>

@endsection