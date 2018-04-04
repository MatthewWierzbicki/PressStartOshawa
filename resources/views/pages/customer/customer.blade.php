@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h2>Customer Information
				<small>
					<span class="btn-group pull-right">
						<a href="/customer/create" class="btn btn-primary">New Customer</a>
					</span>
				</small>
			</h2>

			<form method="POST">
                {{ csrf_field() }}
                
                <div class="input-group pull-right" style="padding-top: 10px;">
                    <input name="search" type="text" class="form-control" placeholder="Search..." required />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success">Search</button>
                        <a href="/customer" class="btn btn-warning">Reset Search</a>
                    </span>
                </div>
            </form>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>    
						<th>Phone #</th>
						<th>Email</th>
						<th class="text-right">View/Edit</th>
						<th class="text-right">Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customers as $customer)
						<tr>
							<td>{{ $customer->id }}</td>
							<td>{{ $customer->firstName }}</td>
							<td>{{ $customer->lastName }}</td>
							<td>{{ $customer->phoneNumber }}</td>
							<td>{{ $customer->email }}</td>
							<td class="text-right"><a href="/customer/{{ $customer->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i></a></td>
							<td class="text-right"><a href="/customer/{{ $customer->id }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{ $customers->links() }}
		</div>

	</div>
</div>

@endsection