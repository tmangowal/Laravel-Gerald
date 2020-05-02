@extends('cart.master')

@section('body')

<table class="table">
  <thead>
    <tr class="text-center">
      <th>Product Name</th>
      <th>Image</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($carts as $cart)
    <tr class="text-center">
      <td>{{ $cart->products->productName }}</td>
      <td> <img src="{{ $cart->products->image }}"
          style="object-fit: contain; height: 120px" alt=""> </td>
      <td>{{ $cart->products->price }}</td>
      <td>{{ $cart->quantity }}</td>
      <td>{{ $cart->quantity * $cart->products->price}}</td>
      <td><input type="submit" value="Delete" class="btn btn-danger"></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection