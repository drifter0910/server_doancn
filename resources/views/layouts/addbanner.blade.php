@extends('dashboard')

@section('content')
<div class="container" style="align-items: center">
    <form action="/api/addbanner" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center mt-4 mb-4">ADD BANNER</h1>
        <div class=" row mb-3 ">

            <label class="col-4 text-center d-flex justify-content-center align-items-center" for="name">Banner name</label>
            <input class="col-6 bg-white" style="width: '50%;" type="text" id="name" name="name" placeholder="Product name" />
        </div>
        <div class=" row mb-3">
            <label class="col-4 text-center d-flex justify-content-center align-items-center" for="subject">Description</label>
            <textarea class="col-6" id="description" name="description" placeholder="Write something.." ></textarea>
        </div>
        <div class="row mb-3">
            <label class="col-4 text-center d-flex justify-content-center align-items-center" for="subject">Upload Image</label>
            <input class="col-3 text-center bg-white" type="file" id="img3" name="img3" />
        </div>
        <div class="text-center ">
            <input class="col-2" type="submit" name="Upload" value="Add product" />
        </div>
    </form>
</div>
@endsection


<style>
    input{
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 14px;
    }
    textarea{
        height: 150px;
    }
</style>
