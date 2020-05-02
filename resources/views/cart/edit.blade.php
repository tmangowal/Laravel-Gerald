@extends('cart.master')

@section('body')

@if (Auth::user()->id == $cart[0]->userId)

<h2>Edit Cart</h2>

<div class="row">
  <div class="col-6">
    <img src="{{ $cart[0]->products->image }}" alt="">
  </div>
  <div class="col-6">
    <h4 class="">{{ $cart[0]->products->productName }}</h4>
    <h5 class="mt-2">Rp {{ $cart[0]->products->price }}</h5>

    <form action="/cart" method="put">
      {{ csrf_field() }}

      <input type="number" name="cartId" value="{{ $cart[0]->id }}"
        class="d-none">
      <input type="number" name="newQty" class="form-control mt-4"
        placeholder="{{ $cart[0]->quantity }}">
      <input type="submit" class="btn btn-success mt-2" value="Save">
    </form>
  </div>
</div>

@endif

@endsection