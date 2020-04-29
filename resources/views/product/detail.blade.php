@extends('product.master')

@section('body')
  <div class="row">
    <div class="col-6">
      <img src="{{ $product->image }}" style="width: 100%; height: 320px; object-fit: contain" alt="">
    </div>
    <div class="col-6 d-flex flex-column justify-content-center">
      <h2>{{ $product->productName }}</h2>
      <h3 class="mt-2">Rp {{ $product->price }}</h3>
      <p class="mt-4">{{ $product->desc }}</p>
      <h5>{{ $product->category }}</h5>
    </div>
  </div>
@endsection