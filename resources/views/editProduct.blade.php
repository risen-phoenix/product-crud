@extends('layout')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="card-header text-center font-weight-bold">
        <h2>Edit a Product</h2>
    </div>

    <form method="POST" action={{route('update', $product->id)}}>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control"
                value="{{ $product->name }}">
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="price" id="price" name="price" class="@error('price') is-invalid @enderror form-control"
                value="{{ $product->price }}">
            @error('price')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" id="description" name="description"
                class="@error('description') is-invalid @enderror form-control">{{ $product->description }}</textarea>
            @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary p-2 mt-4">Submit</button>
    </form>
    @endsection
