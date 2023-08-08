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
    <div class="category-details">
        <h1>Category: {{ $category->name }}</h1>

        <h1>Products:</h1>
        @if($products->count() > 0)
            <ul class="product-list">
                @foreach($products as $product)
                    <li>
                        {{ $product->name }} - Price: {{ $product->price }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No products found for this category.</p>
        @endif
    </div>

    <style>
        .category-details {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .category-details h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-list li {
            margin-bottom: 5px;
        }
    </style>


