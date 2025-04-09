@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Product list</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <button type="submit" class="btn btn-warning"> <a href="{{route('createProduct')}}">Create New Products</a></button>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Serial/Id</th>
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
                    <td>{{ $product->category->name ?? 'no category' }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary btn-sm">View</a>

                        <!-- Delete form -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
