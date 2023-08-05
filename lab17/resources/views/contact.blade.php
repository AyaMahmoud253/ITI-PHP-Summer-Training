<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
            </ul>
        </nav>
    </header>

    <h1>Contact Us</h1>
    <p>
        Welcome to our Contact Us page! We are delighted to hear from you and will be more than happy to assist you with any inquiries or concerns you may have.
    </p>

    <h1>Contact Information</h1>
    <p>
        If you would like to get in touch with us, you can reach us through the following contact details:
    </p>

    <ul>
        <li>Email: info@example.com</li>
        <li>Phone: +1 (123) 456-7890</li>
        <li>Address: 123 Main Street, City, Country</li>
    </ul>

    <h1>Contact Form</h1>
    <p>
        Alternatively, you can use the contact form below to send us a message directly. We will make sure to respond to your message as soon as possible.
    </p>

    <p>
        Thank you for visiting our website and considering to contact us. We look forward to serving you!
    </p>
</body>
</html>
