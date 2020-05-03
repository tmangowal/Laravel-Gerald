@extends ('admin.master')

@section('body')

<div class="row">
  <div class="col-3">
    <img style="object-fit: contain; width: 100%" src="{{ $product->image }}"
      alt="">
  </div>
  <div class="col">
    <h5>Product Name</h5>
    <p>{{ $product->productName }}</p>
    <h5>Price</h5>
    <p>{{ $product->price }}</p>
    <h5>Category</h5>
    <p>{{ $product->category }}</p>
    <h5>Description</h5>
    <p>{{ $product->desc }}</p>
  </div>
  <div class="col-5">
    <form action="/admin/product/edit" method="get">
      {{ csrf_field() }}
      <input type="text" name="productId" value="{{ $product->id }}"
        class="d-none">
      <label for="productName">Product Name</label>
      <input placeholder="{{ $product->productName }}" name="productName"
        type="text" class="form-control">
      <div class="row">
        <div class="col-6">
          <label for="price">Price</label>
          <input placeholder="{{ $product->price }}" name="price" type="text"
            class="form-control">
        </div>
        <div class="col-6">
          <label for="category">Category</label>
          <select class="form-control" name="category" id="">
            @foreach($categories as $category)
            <option value="{{ $category->category }}">{{ $category->category }}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <label for="image">Image</label>
      <input placeholder="{{ $product->image }}" name="image" type="text"
        class="form-control">
      <label for="desc">Description</label>
      <textarea style="resize: none" name="desc"
        class="form-control"></textarea>
      <input type="submit" value="Save" class="btn btn-success btn-block mt-2">
    </form>
  </div>

</div>

@endsection