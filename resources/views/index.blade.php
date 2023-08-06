@extends('layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="pull-left col">
            <h2>Products</h2>
        </div>
        <div class="text-right mt-2 col">
            <a class="btn btn-success float-right" href="{{ route('add-product') }}"> Add a Product</a>
        </div>

    </div>
    <div class="col-lg-12 mt-5">
        <h2>Current products</h2>
        @foreach ($products as $product)
            <div class="row border-bottom p-2 ">
                <div class="col">{{ $product['name'] }}</div>
                <div class="col">{{ $product['price'] }}</div>
                <div class="col">{{ $product['description'] }}</div>
                <div class="col">

                    <a class="btn btn-info mb-1" href="{{ route('edit', $product->id) }}">Edit</a>
                    <form action="{{ route('delete', $product->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

{{-- <  div> --}}
{{-- <form action="/" method="POST">
    @csrf
    <div class="mb-3 p-2">
      <label for="productName" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="productName" name="productName" required minlength="3" maxlength="50" >
    </div>
    <div class="mb-3 p-2">
      <label for="productPrice" class="form-label">Price</label>
      <input type="text" class="form-control" name="productPrice" id="productPrice" required>
    </div>
    <div class="mb-3 p-2">
      <label for="productDescription" class="form-label">Description</label>
      <textarea type="text" class="form-control" id="productDescription" name="productDescription" required minlength="10" maxlength="150"></textarea>
    </div>
    <button type="submit" class="btn btn-primary m-2">Submit</button>
  </form>
  </div> --}}
