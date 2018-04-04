@extends ('layout.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h2>Employee List
                <small>
                    <span class="btn-group pull-right">
                        <a href="/register" class="btn btn-primary">Add Employee</a>
                    </span>
                </small>
            </h2>

            <form method="POST">
                {{ csrf_field() }}
                
                <div class="input-group pull-right" style="padding-top: 10px;">
                    <input name="search" type="text" class="form-control" placeholder="Search..." required />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success">Search</button>
                        <a href="/employee" class="btn btn-warning">Reset Search</a>
                    </span>
                </div>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">View/Edit</th>
                        <th class="text-right">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->fullName }}</td>
                        <td>{{ $employee->userName }}</td>
                        <td>{{ $employee->type }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phoneNumber }}</td>
                        <td>{{ $employee->address }}</td>
                        <td class="text-right"><a href="/employee/{{ $employee->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td class="text-right"><a href="/employee/{{ $employee->id }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $employees->links() }}
        </div>

    </div>
</div>

@endsection