@foreach($products as $product)
    <div class="col">
        <div class="card h-100 product-card">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <p class="text-muted">No image</p>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text text-muted">{{ $product->category->name ?? 'No Category' }}</p>
                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                <p class="card-text fw-bold">${{ number_format($product->price, 2) }}</p>
                <p class="card-text text-muted">Stock: {{ $product->stock_quantity }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary">View Details</a>
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-add-to-cart">
                        <i class="fas fa-cart-plus"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
@endforeach
