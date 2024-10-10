<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        body {
            background-color: #f8f9fa; /* Latar belakang yang lebih cerah */
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background-color: #007bff; /* Warna biru untuk header */
            color: white;
            font-size: 1.5rem;
        }
        h2 {
            text-align: center; /* Rata tengah untuk judul */
            margin-bottom: 20px;
            color: #343a40; /* Warna teks yang gelap */
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container mt-5">
        <h2>Product Details</h2>
        <div class="card">
            <div class="card-header">
                {{ $product->nama }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p><strong>Description:</strong> {{ $product->description }}</p>
                        <p><strong>Retail Price:</strong> ${{ number_format($product->retail_price, 2) }}</p>
                        <p><strong>Wholesale Price:</strong> ${{ number_format($product->wholesale_price, 2) }}</p>
                        <p><strong>Minimum Wholesale Quantity:</strong> {{ $product->min_wholesale_qty }}</p>
                        <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        @if($product->photo)
                            <p><strong>Product Photo:</strong></p>
                            <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->nama }}" class="product-image mb-3">
                        @else
                            <p class="text-muted">No photo available for this product.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
