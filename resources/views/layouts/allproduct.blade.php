@extends('dashboard')
@section('content')
<div class="container" style="align-items: center">
    <h1 class="text-center mb-5 mt-5">PRODUCT LIST</h1>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row mb-2 mt-2 ">
        <div class="col-1 border ">ID</div>
        <div class="col-2 border">Name</div>
        <div class="col-2 border">Price</div>
        <div class="col-4 border">Description</div>
        <div class="col-3 border">Category</div>
    </div>
    @foreach ($products as $product)
    <div class="row pb-2 pt-2 ">
        <div class="col-1 border">{{ $product->id }}</div>
        <div class="col-2 border">{{ $product->name }}</div>
        <div class="col-2 border">{{ $product->price }}</div>
        <div class="col-4 border">{{ $product->description }}</div>
        <div class="col-1 border">{{ $product->category }}</div>
        <div class="col-1 border"><a href="{{route('editproduct')}}" class="text-decoration-none">Edit</a></div>
        <div class="col-1 border rounded">
            <a href="{{url('/deleteproduct/'.$product->id)}}">Delete</a>
        </div>

    </div>
    @endforeach
    <div class="mt-5 text-decoration-none" style="margin-left: 80%; text-decoration: none;">

        {{ $products->links() }}
    </div>
</div>

@endsection


<style>
    input {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 14px;
    }

    textarea {
        height: 150px;
    }

    .w-5 {
        display: none;
    }

    .a {
        text-decoration: none;

    }

    a {
        text-decoration: none !important;
    }
</style>