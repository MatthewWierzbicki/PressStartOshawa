@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Item Creation</h2>

			<form action="/item/create" method="POST">
				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-md-12">
						<label for="itemName">Name/Title</label>
						<input name="itemName" type="text" class="form-control" id="itemName" placeholder="Name/Title" required/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="releaseDate">Release Date</label>
						<input name="releaseDate" type="date" class="form-control" id="releaseDate" placeholder="YYYY-MM-DD" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="developer">Developer</label>
						<input name="developer" type="text" class="form-control" id="developer" placeholder="Developer" required/>
					</div>
				</div>

				<div class="form-group">
					<label for="formGroupDescription">Description</label>
					<input name="description" type="text" class="form-control" id="formGroupDescription" placeholder="Description" required/>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="productType">Product Type</label>
						<select name="productType" class="form-control">
						  <option value="Game" selected>Game</option>
						  <option value="Console">Console</option>
						  <option value="Accessory">Accessory</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="condition">Condition</label>
						<select name="condition" class="form-control">
						  <option value="New" selected>New</option>
						  <option value="Used">Used</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="formGroupPrice">Price</label>
						<input name="price" type="number" min="0.00" class="form-control" id="formGroupPrice" placeholder="$##.##" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="formGroupType">Console</label>
						<select name="console" class="form-control">
						  <option value="Playstation 4" selected>Playstation 4</option>
						  <option value="Xbox 1">xBox One</option>
						  <option value="Nintendo Switch">Nintendo Switch</option>
						  <option value="SNES">Super Nintendo</option>
						  <option value="N/A">N/A</option>
						</select>
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