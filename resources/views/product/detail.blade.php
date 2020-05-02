@extends('product.master')

@section('body')
<div class="row py-4">
  <div class="col-6">
    <img src="{{ $product->image }}"
      style="width: 100%; height: 320px; object-fit: contain" alt="">
  </div>
  <div class="col-6 d-flex flex-column justify-content-center">
    <h2>{{ $product->productName }}</h2>
    <h3 class="mt-2">Rp {{ $product->price }}</h3>
    <p class="mt-4">{{ $product->desc }}</p>
    <h5>{{ $product->category }}</h5>
    <form action="/cart/store" method="post">
      {{ csrf_field() }}

      <input type="text" value="1" class="d-none" name="quantity">
      <input type="text" value="{{ $product->id }}" class="d-none"
        name="productId">
      <input type="text" value="{{ Auth::user()->id }}" class="d-none"
        name="userId">
      <input type="submit" class="btn btn-primary mt-5" value="Add to cart">
    </form>
  </div>
</div>
@endsection