<!-- Display details of the selected product -->
<h1>{{ $product->name }}</h1>
<p>Description: {{ $product->description }}</p>
<img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}" width="200">
<p>Price: {{ $product->price }}</p>

