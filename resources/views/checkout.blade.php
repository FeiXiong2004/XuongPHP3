@extends('layout')
@section('title')
    Giỏ hàng | Techchain
@endsection
@section('content')
<style>
    form{
        height: 500px;
        widows: 500px;
    }
</style>
<div class="container ">
    <form action="" method="post" class="border-1 ">
        @csrf
        <div class="b-3">
            <label for="" class="form-label">Fullname</label>
            <input type="text" name="fullname" id="" class="form-control">
        </div>
        <div class="b-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" name="phone" id="" class="form-control">
        </div>
        <div class="b-3">
            <label for="" class="form-label">Address</label>
            <input type="text" name="address" id="" class="form-control">
        </div>
        <div class="b-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="t-3 mt-3 text-center">
            <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
    </form>
</div>
    
@endsection