<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class Product2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::create([
            'name' => 'Hoodie',
            'description' => 'Warm fleece hoodie',
            'price' => '39.99',
            'size' => ['S', 'M', 'L'],
            'color' => ['Gray', 'Black'],
            'category' => 'Clothing',
            'brand' => 'UrbanStyle',
            'stock' => '50',
            'image_url' => 'image/i1.webp'
        ]);
        
        Products::create([
            'name' => 'Running Shoes',
            'description' => 'Lightweight running shoes',
            'price' => '79.99',
            'size' => ['40', '41', '42'],
            'color' => ['Blue', 'White'],
            'category' => 'Footwear',
            'brand' => 'SpeedRun',
            'stock' => '30',
            'image_url' => 'image/i2.webp'
        ]);
        
        Products::create([
            'name' => 'Leather Wallet',
            'description' => 'Compact leather wallet with multiple compartments',
            'price' => '49.99',
            'size' => ['One Size'],
            'color' => ['Brown', 'Black'],
            'category' => 'Accessories',
            'brand' => 'LeatherCraft',
            'stock' => '40',
            'image_url' => 'image/i3.webp'
        ]);
        
        Products::create([
            'name' => 'Ankle Boots',
            'description' => 'Stylish ankle boots with durable sole',
            'price' => '89.99',
            'size' => ['39', '40', '41'],
            'color' => ['Black', 'Brown'],
            'category' => 'Footwear',
            'brand' => 'StepAhead',
            'stock' => '20',
            'image_url' => 'image/i4.webp'
        ]);
        
        Products::create([
            'name' => 'Beanie Hat',
            'description' => 'Knitted beanie hat for winter warmth',
            'price' => '19.99',
            'size' => ['One Size'],
            'color' => ['Red', 'Gray'],
            'category' => 'Accessories',
            'brand' => 'CozyWear',
            'stock' => '35',
            'image_url' => 'image/i5.webp'
        ]);
        
        Products::create([
            'name' => 'Polo Shirt',
            'description' => 'Classic polo shirt with a modern fit',
            'price' => '29.99',
            'size' => ['M', 'L', 'XL'],
            'color' => ['Navy', 'White'],
            'category' => 'Clothing',
            'brand' => 'ClassicStyle',
            'stock' => '45',
            'image_url' => 'image/i6.webp'
        ]);
        
        Products::create([
            'name' => 'Backpack',
            'description' => 'Spacious backpack for everyday use',
            'price' => '59.99',
            'size' => ['One Size'],
            'color' => ['Green', 'Black'],
            'category' => 'Accessories',
            'brand' => 'TravelGear',
            'stock' => '25',
            'image_url' => 'image/i7.webp'
        ]);
        
        Products::create([
            'name' => 'Sports Jacket',
            'description' => 'Lightweight sports jacket with a modern design',
            'price' => '69.99',
            'size' => ['M', 'L', 'XL'],
            'color' => ['Blue', 'Gray'],
            'category' => 'Clothing',
            'brand' => 'ActiveWear',
            'stock' => '20',
            'image_url' => 'image/i8.webp'
        ]);
        
        Products::create([
            'name' => 'Sunglasses',
            'description' => 'Stylish sunglasses with UV protection',
            'price' => '24.99',
            'size' => ['One Size'],
            'color' => ['Black', 'Brown'],
            'category' => 'Accessories',
            'brand' => 'Visionary',
            'stock' => '50',
            'image_url' => 'image/i9.webp'
        ]);
        
        Products::create([
            'name' => 'Casual Sneakers',
            'description' => 'Comfortable casual sneakers for everyday wear',
            'price' => '59.99',
            'size' => ['38', '39', '40'],
            'color' => ['White', 'Gray'],
            'category' => 'Footwear',
            'brand' => 'ComfyFeet',
            'stock' => '30',
            'image_url' => 'image/i10.webp'
        ]);
        
        Products::create([
            'name' => 'Leather Jacket',
            'description' => 'Premium leather jacket with a sleek design',
            'price' => '199.99',
            'size' => ['M', 'L', 'XL'],
            'color' => ['Black', 'Brown'],
            'category' => 'Clothing',
            'brand' => 'LuxStyle',
            'stock' => '15',
            'image_url' => 'image/i11.webp'
        ]);
        
        Products::create([
            'name' => 'Chelsea Boots',
            'description' => 'Elegant Chelsea boots for formal occasions',
            'price' => '129.99',
            'size' => ['40', '41', '42'],
            'color' => ['Black', 'Brown'],
            'category' => 'Footwear',
            'brand' => 'FormalStep',
            'stock' => '20',
            'image_url' => 'image/i12.webp'
        ]);
        
        Products::create([
            'name' => 'Silk Scarf',
            'description' => 'Luxurious silk scarf with intricate patterns',
            'price' => '49.99',
            'size' => ['One Size'],
            'color' => ['Red', 'Blue'],
            'category' => 'Accessories',
            'brand' => 'SilkElegance',
            'stock' => '25',
            'image_url' => 'image/i13.webp'
        ]);
        
        Products::create([
            'name' => 'Denim Jacket',
            'description' => 'Classic denim jacket with a modern fit',
            'price' => '79.99',
            'size' => ['S', 'M', 'L'],
            'color' => ['Blue', 'Black'],
            'category' => 'Clothing',
            'brand' => 'DenimWorks',
            'stock' => '35',
            'image_url' => 'image/i14.webp'
        ]);
        
        Products::create([
            'name' => 'Canvas Sneakers',
            'description' => 'Comfortable canvas sneakers for casual wear',
            'price' => '49.99',
            'size' => ['39', '40', '41'],
            'color' => ['White', 'Navy'],
            'category' => 'Footwear',
            'brand' => 'CasualKicks',
            'stock' => '40',
            'image_url' => 'image/i15.jpg'
        ]);
        
        Products::create([
            'name' => 'Baseball Cap',
            'description' => 'Classic baseball cap with adjustable strap',
            'price' => '19.99',
            'size' => ['One Size'],
            'color' => ['Black', 'Gray'],
            'category' => 'Accessories',
            'brand' => 'CapMasters',
            'stock' => '50',
            'image_url' => 'image/i16.webp'
        ]);
        
        Products::create([
            'name' => 'Chinos',
            'description' => 'Comfortable chinos with a tailored fit',
            'price' => '59.99',
            'size' => ['M', 'L', 'XL'],
            'color' => ['Beige', 'Navy'],
            'category' => 'Clothing',
            'brand' => 'SmartWear',
            'stock' => '30',
            'image_url' => 'image/i17.webp'
        ]);
        
        Products::create([
            'name' => 'Loafers',
            'description' => 'Elegant loafers with a comfortable fit',
            'price' => '89.99',
            'size' => ['41', '42', '43'],
            'color' => ['Brown', 'Black'],
            'category' => 'Footwear',
            'brand' => 'ElegantStep',
            'stock' => '20',
            'image_url' => 'image/i18.webp'
        ]);
        
        Products::create([
            'name' => 'Belt',
            'description' => 'Stylish leather belt with a classic buckle',
            'price' => '29.99',
            'size' => ['One Size'],
            'color' => ['Black', 'Brown'],
            'category' => 'Accessories',
            'brand' => 'BeltCraft',
            'stock' => '45',
            'image_url' => 'image/i19.webp'
        ]);
        
        


    }
}
