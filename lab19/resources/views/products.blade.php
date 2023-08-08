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
                <li><a href="{{ route('aboutus') }}">About</a></li>
                <li><a href="{{ route('contactus') }}">Contact</a></li>
                <li><a href="{{ route('cat') }}">Categories</a></li>
                <li><a href="{{ route('categories.create') }}" >Add Category</a></li>
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
                     @can('update', $product)
                 <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                @else
                     You can't edit this product.
               @endcan
              </td>

              <td>
            @can('delete', $product)
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
            @else
               You can't delete this product.
            @endcan
            </td>
            <td>
                @if ($product->category)
    <a href="{{ route('show2', ['category' => $product->category->id]) }}">
        {{ $product->category->name }}
    </a>
@else
    No category available
@endif


                
</td>



            </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>
