@extends('dashboard')
@section('content')
<div style="align-items: center">
    <h1 class="text-center mb-5 mt-5">CHECKOUT LIST</h1>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row mb-2 mt-2 ">
        <!-- <div class="col-1 ">ID</div> -->
        <div class="col-2">User name</div>
        <div class="col-2">Email</div>
        <div class="col-3">Detail</div>
        <div class="col-1">Total price</div>
        <div class="col-2">Address</div>
        <div class="col-2">Phone</div>
        <!-- <div class="col-1"></div> -->
    </div>
    @foreach ($checkouts as $checkout)
    <div class="row pb-2 pt-2 ">
        <!-- <div class="col-1 ">{{ $checkout->id }}</div> -->
        <div class="col-2">{{ $checkout->username }}</div>
        <div class="col-2">{{ $checkout->email }}</div>
        <div class="col-3">{{ $checkout->detail }}</div>
        <div class="col-1">{{ $checkout->totalprice }}</div>
        <div class="col-2">{{ $checkout->address }}</div>
        <div class="col-1">{{ $checkout->phone }}</div>
        <div class="col-1">
            <a href="{{url('/deletecheckout/'.$checkout->id)}}">Delete</a>
        </div>
    </div>


</div>
@endforeach
<div class="mt-5 text-decoration-none" style="margin-left: 80%; text-decoration: none;">
    {{ $checkouts->links() }}
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