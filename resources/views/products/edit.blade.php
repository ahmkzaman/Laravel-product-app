@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit products</h1>
    <form action="#" method="POST">
        @csrf
        @foreach ($products as $product)
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Product {{ $product->name }}</h5>
                </div>
               
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Description</label>
                        <input type="text" class="form-control" id="name" name="description[]" value="{{ $product->description }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" name="price[]" class="form-control" value="{{ $product->price }}">
                    </div>
                    
                    <div class="mb-3">
                        <label>Category</label>
                        <input type="text" name="category[]" class="form-control" value="{{ $product->category->name ?? 'N/A' }}" readonly>
                    </div>
                    
                </div>
            </div>
            
        @endforeach
     {{-- Add a submit button later --}}
    <button type="submit" class="btn btn-primary">Submit Changes</button>
    </form>

</div>

@endsection