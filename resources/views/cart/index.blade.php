@extends('cart.master')

@section('body')

@if (Auth::user()->id == $userId)

<table class="table">
  <thead>
    <tr class="text-center">
      <th>Product Name</th>
      <th>Image</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th colspan="2">Action</th>
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
      <td>
        <a href="/cart/edit/{{ $cart->id }}">
          <input type="submit" value="Edit" class="btn btn-dark">
        </a>
      </td>
      <td>
        <form action="/deleteCart" method="get">
          {{ csrf_field() }}

          <input type="text" class="d-none" value="{{ $cart->id }}"
            name="cartId">
          <input type="text" class="d-none" value="{{ Auth::user()->id }}"
            name="userId">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="7">
        <h4> Total Price: Rp {{ $totalPrice }} </h4>
      </td>
    </tr>
    <tr>
      <td colspan="7">
        <h4> Shipping Fee: Rp 12000 </h4>
      </td>
    </tr>
  </tfoot>
</table>
<div class="card p-3">
  <form action="/transaction" method="post">
    {{ csrf_field() }}

    <input type="text" class="d-none" name="userId"
      value="{{ Auth::user()->id }}">
    <input type="text" class="d-none" name="price"
      value="{{ $totalPrice + 12000 }}">
    <input type="text" class="d-none" name="quantity" value="{{ $qty }}">
    <input type="text" class="d-none" name="cartItems" value="{{ $carts }}">
    <input type="text" class="d-none" name="status" value="pending">
    <div class="row">
      <div class="col-3 mt-2"><input type="text" class="form-control"
          placeholder="Full Name" name="fullName"></div>
      <div class="col-3 mt-2"><input type="text" class="form-control"
          placeholder="Address" name="address"></div>
      <div class="col-3 mt-2"><input type="text" class="form-control"
          placeholder="City" name="city"></div>
      <div class="col-3 mt-2"><input type="text" class="form-control"
          placeholder="District" name="district"></div>
      <div class="col-3 mt-2"><input type="text" class="form-control"
          placeholder="Province" name="province"></div>
      <div class="col-3 mt-2"><input type="text" class="form-control"
          placeholder="Zip Code" name="zip"></div>
      <div class="col-3 mt-2"><input type="text" class="form-control"
          placeholder="Phone Number" name="phone"></div>
    </div>
    <hr>
    <div class="row">
      <div class="col-8">
        <select name="userPayment" class="form-control">
          <option value="Bank Transfer">Bank Transfer</option>
          <option value="Kartu Kredit">Kartu Kredit</option>
          <option value="OVO">OVO</option>
          <option value="GOPAY">GOPAY</option>
        </select>
      </div>
      <div class="col-4">
        <input type="submit" value="Pay" class="btn btn-success btn-block">
      </div>
    </div>
  </form>
</div>

@endif

@endsection