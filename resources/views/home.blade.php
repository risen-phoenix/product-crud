<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Bootstrap Bundle with Popper -->
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <title>Product-CRUD</title>
</head>

<body>
  <div>
  <h1 class="p-1">Products</h1>
  <form action="/" method="POST">
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
  </div>
  <div class="p-2">
    <h2>Current products</h2>
    @foreach ($products as $product)
    <div>{{$product['productName']}}</div>
    <div>{{$product['productPrice']}}</div>
    <div>{{$product['productDescription']}}</div>
<p><a href="/edit-product/{{$product->id}}">Edit</a></p>
<form action="/delete-product/{{$product->id}}" method="POST">
@csrf
@method('DELETE')
<button>Delete</button>
</form>
@endforeach
  </div>
</body>

</html>
