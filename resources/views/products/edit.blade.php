@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edit products</h1>
    <form action="{{route('products.update', $product->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select name="category_id" class="form-control">

            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <button class="btn btn-warning">Update</button>

    </form>
    

</div>

@endsection