<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #f8f9fa;
        }
        .btn-primary {
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Product</h2>
        <div class="form-container">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Product Name</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="retail_price">Retail Price</label>
                    <input type="number" step="0.01" class="form-control @error('retail_price') is-invalid @enderror" id="retail_price" name="retail_price" value="{{ old('retail_price') }}" required>
                    @error('retail_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="wholesale_price">Wholesale Price</label>
                    <input type="number" step="0.01" class="form-control @error('wholesale_price') is-invalid @enderror" id="wholesale_price" name="wholesale_price" value="{{ old('wholesale_price') }}" required>
                    @error('wholesale_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="min_wholesale_qty">Min Wholesale Quantity</label>
                    <input type="number" class="form-control @error('min_wholesale_qty') is-invalid @enderror"
                    id="min_wholesale_qty" name="min_wholesale_qty" value="{{ old('min_wholesale_qty') }}" required>
                    @error('min_wholesale_qty')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Product Photo (optional)</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
            </form>
        </div>
    </div>
    @endsection
</body>
</html>
