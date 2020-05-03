@extends('admin.master')

@section('body')

<h1>Hello Admin</h1>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>Product Name</th>
      <th>Price</th>
      <th>Image</th>
      <th>Category</th>
      <th>Description</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td>{{ $product->productName }}</td>
      <td>{{ $product->price }}</td>
      <td class="text-center">
        <img src="{{ $product->image }}"
          style="object-fit: contain; height: 120px;" alt="">
      </td>
      <td>{{ $product->category }}</td>
      <td>{{ $product->desc }}</td>
      <td>
        <a href="/admin/product/edit/{{ $product->id }}">
          <input type="submit" value="Edit" class="btn btn-dark">
        </a>
      </td>
      <td>
        <a href="/admin/product/delete/{{ $product->id }}">
          <input type="submit" value="Delete" class="btn btn-danger">
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="card p-3">
  <h2>Add Product</h2>
  <form action="/admin/product" method="post">
    {{ csrf_field() }}

    <div class="row">
      <div class="mt-2 col-6">
        <label for="productname">Product Name</label>
        <input type="text" name="productName" class="form-control">
      </div>
      <div class="mt-2 col-6">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control">
      </div>
      <div class="mt-2 col-6">
        <label for="image">Image</label>
        <input type="text" name="image" class="form-control">
      </div>
      <div class="mt-2 col-3">
        <label for="newCategory">New Category</label>
        <input type="text" name="newCategory" class="form-control">
      </div>
      <div class="mt-2 col-3">
        <label for="existingCategory">Use Existing Category</label>
        <select name="existingCategory" class="form-control">
          @foreach($categories as $category)
          <option value="{{ $category->category }}">{{ $category->category }}
          </option>
          @endforeach
        </select>
      </div>
      <div class="mt-2 col-12">
        <label for="desc">Description</label>
        <textarea name="desc" style="resize: none" type="text"
          class="form-control">
      </textarea>
      </div>
      <div class="col-6 offset-3 mt-3">
        <input type="submit" value="Create" class="btn btn-success btn-block">
      </div>
    </div>
  </form>
</div>

@endsection