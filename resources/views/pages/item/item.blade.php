@extends ('layout.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h2>Inventory Information
                <small>
                    <div class="btn-group pull-right">
                        <a href="/item/create" class="btn btn-primary">New Item</a>
                    </div>
                </small>
            </h2>

            <form method="POST">
                {{ csrf_field() }}
                
                <div class="input-group pull-right" style="padding-top: 10px;">
                    <input name="search" type="text" class="form-control" placeholder="Search..." required />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success">Search</button>
                        <a href="/item" class="btn btn-warning">Reset Search</a>
                    </span>
                </div>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Developer</th>
                        <th>Release Date</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Condition</th>
                        <th>Product Type</th>
                        <th>Console</th>
                        <th class="text-right">Edit</th>
                        <th class="text-right">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->itemName }}</td>
                        <td>{{ $item->developer }}</td>
                        <td>{{ $item->releaseDate }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->condition }}</td>
                        <td>{{ $item->productType }}</td>
                        <td>{{ $item->console }}</td>
                        <td class="text-right"><a href="/item/{{ $item->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td class="text-right"><a href="/item/{{ $item->id }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $items->links() }}
        </div>

    </div>
</div>

@endsection