<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('cat') }}">Categories</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="{{ route('contact') }}">Add new Product</a></li>
            </ul>
        </nav>
    </header>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                
                <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}" width="50"></td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
             <td>{{ $product->category_id ? App\Models\Category::find($product->category_id)->name : 'Uncategorized' }}</td>


            </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>
