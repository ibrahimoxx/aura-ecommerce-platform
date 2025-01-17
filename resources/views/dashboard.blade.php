<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            flex: 1 1 calc(25% - 20px); /* Adjust for 4 cards per row */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            overflow-y: auto;
            max-height: 80vh;
        }
        .product-info {
            text-align: center;
        }
        @media (max-width: 768px) {
            .product-card {
                flex: 1 1 calc(50% - 20px); /* Adjust for smaller screens */
            }
        }
        @media (max-width: 576px) {
            .product-card {
                flex: 1 1 100%; /* Single column for very small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Products List</h1>
        
        <!-- Category Filter Dropdown -->
        <div class="mb-4 text-center">
            <label for="categoryFilter" class="mr-2">Filter by Category:</label>
            <select id="categoryFilter" class="custom-select w-auto">
                <option value="all">All</option>
                <option value="Clothing">Clothing</option>
                <option value="Footwear">Footwear</option>
                <option value="Accessories">Accessories</option>
            </select>
        </div>
        
        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card" data-category="{{ $product->category }}">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    <div class="product-info">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->description }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                        <p><strong>Size:</strong> {{ implode(', ', $product->size) }}</p>
                        <p><strong>Color:</strong> {{ implode(', ', $product->color) }}</p>
                        <p><strong>Category:</strong> {{ $product->category }}</p>
                        <p><strong>Brand:</strong> {{ $product->brand }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        <a href="{{Route('addBag', $product->id)}}" class="btn btn-secondary mt-2">Add Bag</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('categoryFilter').addEventListener('change', function() {
            var selectedCategory = this.value.toLowerCase();
            var productCards = document.querySelectorAll('.product-card');
            
            productCards.forEach(function(card) {
                var productCategory = card.getAttribute('data-category').toLowerCase();
                
                if (selectedCategory === 'all' || productCategory === selectedCategory) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>   
</html>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
