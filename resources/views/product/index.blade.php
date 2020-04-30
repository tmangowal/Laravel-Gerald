@extends('product.master')

@section('body')
<style>

  :root {
    --accent-default: #3c64b1;
    --accent-dark: #1e4693;
    --accent-light: #5a82cf;
    --gray-lightest: #f4f5f4;
    --gray-divider: #e2e5e6;
    --gray-default: #c3cbcd;
    --gray-dark: #737b7d;
    --black: #373f41;
  }

  .product-card {
    padding: 16px;
    border-radius: 8px;
    transition: all ease 150ms;
    box-sizing: border-box;
    width: 259px;
    border: 1px solid var(--gray-divider);
  }

  .product-card:hover {
    box-shadow: 0px 4px 8px rgba(92, 107, 192, 0.2),
      0px 2px 4px rgba(59, 69, 123, 0.2);
  }

</style>
    <div class="d-flex flex-wrap justify-content-center">
    
    @foreach ($products as $product)
      <div class="product-card d-inline-block m-2">
          <img src="{{ $product->image }}" style='width: 224px; height: 250px; object-fit: contain' />
          <div>
              <p class="mt-3">{{ $product->productName }}</p>
              <h5>IDR {{ $product->price }}</h5>
              <p class="small">Category: {{ $product->category }} </p>
          </div>
          <div class="d-flex flex-row align-items-center justify-content-between mt-2">
              <div style="fontSize: 12px; padding: 4px 8px"> <a href="/product/detail/{{ $product->id }}">Buy</a> 
              </div>
          </div>
      </div>
    @endforeach
    </div>
    @endsection