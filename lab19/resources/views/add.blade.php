<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
h1 {
    font-size: 32px;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

p,ul {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
    text-align: center;
    margin-bottom: 40px;
}

header {
    background-color: #333;
    padding: 10px;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

nav ul li a:hover {
    color: #f0f0f0;
}
/* public/css/styles.css */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
}

th {
    background-color: #f0f0f0;
    font-weight: bold;
}


    </style>
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
        <h1 style="text-align: center;">Create Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 10px;">
                <label for="name" style="display: block;">Name:</label>
                <input type="text" id="name" name="name" style="width: 100%; padding: 5px;">
            </div>
            <div style="text-align: center;">
                <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer;">Add Category</button>
            </div>
        </form>
    </div>
</body>
</html>
