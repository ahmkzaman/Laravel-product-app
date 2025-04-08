@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Product list</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Seridal/Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Category ID</th>
                <th>Actions</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->category->name ?? 'no category'}}</td>
                <td>{{ $product->category_id }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    
                    {{-- <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    
                    {{-- <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                </td>
                <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">View</a></td>
                
                
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection