@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{$product->name}}</h2>
    <p><strong>Description</strong> {{$product->description}}</p>
    <p><strong>Price</strong> {{$product->price}}</p>
    <p><strong>Category</strong> {{$product->category->name?? 'uncategorized'}}</p>

<a href="{{route('products.index')}}" class="btn btn-secondary mt-3">Back to products</a>
</div>

@endsection