<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Edit Product</h1>
  <form action="/edit-product/{{$product->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3 p-2">
    <label for="productName" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productName" name="productName" value="{{$product->productName}}">
  </div>
  <div class="mb-3 p-2">
    <label for="productPrice" class="form-label">Price</label>
    <input type="text" class="form-control" name="productPrice" id="productPrice" value="{{$product->productPrice}}">
  </div>
  <div class="mb-3 p-2">
    <label for="productDescription" class="form-label">Description</label>
    <textarea type="text" class="form-control" id="productDescription" name="productDescription">{{$product->productDescription}}</textarea>
    <button>Save Changes</button>
  </div>
</form>
</body>
</html>