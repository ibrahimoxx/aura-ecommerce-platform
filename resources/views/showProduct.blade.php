<!-- resources/views/add_product.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Modifier Produit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updateProduct', $product->id)}}" method="GET" >
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{$product->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{$product->price}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="size" class="form-label">Size</label><br>
                                @foreach(['S' => 'Small', 'M' => 'Medium', 'L' => 'Large', 'XL' => 'Extra Large'] as $sizeValue => $sizeLabel)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="size{{ $sizeValue }}" name="size[]" value="{{ $sizeValue }}" 
                                        @if(in_array($sizeValue, $product->size)) checked @endif>
                                        <label class="form-check-label" for="size{{ $sizeValue }}">{{ $sizeLabel }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label><br>
                                @foreach(['Red', 'Blue', 'Green', 'Black', 'White'] as $color)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="color{{ $color }}" name="color[]" value="{{ $color }}" 
                                        @if(in_array($color, $product->color)) checked @endif>
                                        <label class="form-check-label" for="color{{ $color }}">{{ $color }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="Clothing" @if($product->category == 'Clothing') selected @endif>Clothing</option>
                                    <option value="Footwear" @if($product->category == 'Footwear') selected @endif>Footwear</option>
                                    <option value="Accessories" @if($product->category == 'Accessories') selected @endif>Accessory</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{$product->brand}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{$product->stock}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image</label>
                                <input type="url" class="form-control" id="image_url" name="image_url"  value="{{$product->image_url}}">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
