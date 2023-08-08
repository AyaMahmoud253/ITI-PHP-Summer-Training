<!-- Display details of the selected product -->
<head>
    <title>Welcome to Laravel Blade</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
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
<h1>{{ $product->name }}</h1>
<p>Description: {{ $product->description }}</p>
<p style="text-align: center;">
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}" width="200">
</p>

<p>Price: {{ $product->price }}</p>

