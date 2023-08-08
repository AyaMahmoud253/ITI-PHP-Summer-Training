<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Laravel Blade</title>
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
    <h1>Welcome to Our Website!</h1>
    <p>
        Our website is dedicated to providing a wide range of high-quality products for your needs.
        Whether you are looking for electronics, fashion, beauty, or home essentials, we have it all.
        With a focus on customer satisfaction and competitive prices, we aim to make your shopping experience delightful.

        Browse through our extensive catalog of products and discover the latest trends and must-have items.
        Our user-friendly interface and secure payment options ensure a seamless shopping journey from start to finish.

        If you have any questions or need assistance, feel free to reach out to our dedicated customer support team.
        Happy shopping, and thank you for choosing us for all your product needs!
    </p>

</body>
</html>