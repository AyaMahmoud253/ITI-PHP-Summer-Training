<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<header>
        <nav>
        <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('aboutus') }}">About</a></li>
                <li><a href="{{ route('contactus') }}">Contact</a></li>
                <li><a href="{{ route('cat') }}">Categories</a></li>
                <li><a href="{{ route('categories.create') }}" >Add Category</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="{{ route('contact') }}">Add new Product</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                @if($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ $product->price }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>
