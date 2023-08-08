<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
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

<h1>All Categories</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th> <!-- New column for the Edit button -->
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
    @can('update', $category)
        <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-primary">Edit</a>
    @else
        You can't edit this category.
    @endcan
</td>
<td>
    @can('delete', $category)
        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @else
        You can't delete this category.
    @endcan
</td>

        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
