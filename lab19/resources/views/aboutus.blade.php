<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
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

    <h1>About Us</h1>
    <p>
        Welcome to our About Us page! We are a passionate team of professionals dedicated to providing top-notch products and services to our valued customers.

        At our company, we believe in delivering the highest quality products at affordable prices. Our mission is to exceed our customers' expectations by offering a diverse selection of products that cater to different needs and preferences.

        Our team consists of experts from various fields, including technology, fashion, beauty, and more. This diverse expertise allows us to curate a wide range of products that meet the highest standards of quality and innovation.

        As a customer-centric company, we value your satisfaction above all else. Our commitment to exceptional customer service ensures that your shopping experience with us is smooth and enjoyable. We are always here to assist you with any questions or concerns you may have.

        Thank you for choosing us as your preferred destination for high-quality products. We look forward to serving you and building a long-lasting relationship with you.

        Happy shopping!
    </p>
</body>
</html>