<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
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
    <br>
    <div style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc;">
        <h1 style="text-align: center;">Edit Category</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 10px;">
                <label for="name" style="display: block;">Name:</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" style="width: 100%; padding: 5px;">
            </div>
            <div style="text-align: center;">
                <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer;">Update Category</button>
            </div>
        </form>
    </div>
</body>
</html>
