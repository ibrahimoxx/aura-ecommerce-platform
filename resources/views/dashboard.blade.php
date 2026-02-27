<x-app-layout>
    <div class="bg-white min-h-screen pb-24">
        <!-- Top Bar with Breadcrumbs -->
        <div class="border-b border-gray-100 py-4 mt-6">
            <div class="max-w-[1500px] mx-auto px-6 lg:px-12 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500 font-light">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <a href="{{ route('dashboard') }}" class="hover:text-black transition-colors">Home</a>
                    <span>/</span>
                    <span class="text-black font-medium">The Collection</span>
                </div>
                <!-- Dynamic results count injected by Alpine below -->
                <div id="results-count" class="tracking-widest uppercase"></div>
            </div>
        </div>

        <div class="max-w-[1500px] mx-auto px-6 lg:px-12 mt-10">
            
            <div x-data="productFilter(@js($products))" class="flex flex-col lg:flex-row gap-12 lg:gap-16">
                
                <!-- Left Sidebar Filters -->
                <div class="w-full lg:w-56 flex-shrink-0">
                    <div class="sticky top-24">
                        
                        <!-- Category Filter -->
                        <div class="mb-8">
                            <h4 class="text-xs font-semibold tracking-wider uppercase text-black mb-4">Category</h4>
                            <div class="space-y-3 font-light text-sm">
                                <button @click="category = 'all'; size = 'all'" :class="{'text-black font-medium': category === 'all', 'text-gray-500 hover:text-black': category !== 'all'}" class="block transition-colors text-left w-full">All Products</button>
                                <button @click="category = 'clothing'; size = 'all'" :class="{'text-black font-medium': category === 'clothing', 'text-gray-500 hover:text-black': category !== 'clothing'}" class="block transition-colors text-left w-full">Clothing</button>
                                <button @click="category = 'footwear'; size = 'all'" :class="{'text-black font-medium': category === 'footwear', 'text-gray-500 hover:text-black': category !== 'footwear'}" class="block transition-colors text-left w-full">Footwear</button>
                                <button @click="category = 'accessories'; size = 'all'" :class="{'text-black font-medium': category === 'accessories', 'text-gray-500 hover:text-black': category !== 'accessories'}" class="block transition-colors text-left w-full">Accessories</button>
                            </div>
                        </div>
                        
                        <!-- Dynamic Size Filter -->
                        <div class="mb-8" x-show="availableSizes.length > 0">
                            <h4 class="text-xs font-semibold tracking-wider uppercase text-black mb-4">Size</h4>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="s in availableSizes" :key="s">
                                    <button @click="size = (size === s ? 'all' : s)" 
                                          :class="{'bg-[#556B2F] text-white border-[#556B2F]': size === s, 'bg-white text-gray-600 border-gray-200 hover:border-black': size !== s}" 
                                          class="border rounded-[4px] min-w-[2.5rem] px-2 h-9 flex items-center justify-center text-xs transition-colors" x-text="s"></button>
                                </template>
                            </div>
                        </div>

                        <!-- Sort Dropdown in Sidebar for Desktop -->
                        <div class="mb-8">
                            <h4 class="text-xs font-semibold tracking-wider uppercase text-black mb-4">Sort By</h4>
                            <select x-model="sortBy" class="w-full border-gray-300 rounded-[4px] text-sm font-light focus:border-black focus:ring-0 cursor-pointer py-2">
                                <option value="newest">Newest Arrivals</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="price_desc">Price: High to Low</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Main Product Grid -->
                <div class="flex-1">
                    <!-- Update teleported result count -->
                    <div x-init="$watch('filteredProducts', () => { document.getElementById('results-count').innerText = filteredProducts.length + ' Products' })" class="hidden"></div>

                    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-10 sm:gap-x-6 sm:gap-y-12">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <div class="group flex flex-col h-full">
                                <!-- Image Container -->
                                <div class="relative bg-gray-100 aspect-[3/4] mb-4 overflow-hidden rounded-[8px]">
                                    <!-- Wrap image in a link to PDP -->
                                    <a :href="'/product/' + product.id" class="block w-full h-full">
                                        <img :src="'/' + product.image_url" :alt="product.name" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-[1.5s] ease-out">
                                    </a>
                                    
                                    <div x-show="product.stock == 0" class="absolute top-4 left-4 z-10">
                                        <span class="bg-black/80 text-white text-[10px] uppercase tracking-widest px-3 py-1 rounded-[4px]">Sold Out</span>
                                    </div>
                                    
                                    <!-- Quick Add overlay on hover -->
                                    <template x-if="product.stock > 0">
                                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 z-10">
                                            <a :href="'/dashboard/addBag/' + product.id" class="block w-full text-center bg-white/95 backdrop-blur-md border border-transparent py-3 text-xs tracking-widest uppercase font-semibold text-black hover:bg-black hover:text-white rounded-[4px] shadow-sm transition-all">
                                                Quick Add
                                            </a>
                                        </div>
                                    </template>
                                </div>
                                
                                <!-- Content -->
                                <div class="flex flex-col flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <a :href="'/product/' + product.id" class="text-sm font-medium text-[#222] hover:underline" x-text="product.name"></a>
                                        <span class="text-sm font-medium text-[#222]" x-text="'$' + product.price"></span>
                                    </div>
                                    <div class="text-[11px] text-gray-500 font-light mt-auto">
                                        <span x-text="product.brand"></span>
                                        <template x-if="product.color">
                                            <!-- Just showing a count of colors as text for simplicity, matching Zara/Everlane style -->
                                            <span> • <span x-text="Array.isArray(product.color) ? product.color.length + ' Colors' : '1 Color'"></span></span>
                                        </template>
                                    </div>
                                    <!-- Mobile Add button only shows below lg -->
                                    <template x-if="product.stock > 0">
                                        <a :href="'/dashboard/addBag/' + product.id" class="lg:hidden mt-4 block w-full text-center bg-white border border-gray-300 py-2.5 text-[10px] tracking-widest uppercase font-semibold text-black hover:border-black rounded-[4px] transition-colors">
                                            Add to Bag
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <!-- Fallback -->
                        <div x-show="filteredProducts.length === 0" class="col-span-full py-24 text-center">
                            <p class="text-sm tracking-widest uppercase text-gray-900 font-medium mb-2">No Products Found</p>
                            <p class="text-sm text-gray-500 font-light mb-6">We couldn't track down any pieces matching your filters.</p>
                            <button @click="category = 'all'; size = 'all'" class="px-8 py-3 bg-black text-white text-xs font-semibold tracking-widest uppercase rounded-[4px] hover:bg-gray-800 transition-colors">Clear Filters</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error handling -->
            @if(session('error'))
                <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 bg-red-50 text-red-900 border border-red-200 px-6 py-4 rounded-[4px] shadow-xl flex items-center justify-between min-w-[300px] z-50" role="alert">
                    <span class="text-sm font-medium mr-4 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('error') }}
                    </span>
                    <button @click="show = false" class="text-red-500 hover:text-red-700 focus:outline-none">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif

        </div>
    </div>

    <!-- Alpine Component Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productFilter', (products) => ({
                products: products,
                category: 'all',
                size: 'all',
                sortBy: 'newest',
                
                // Dynamically collect available sizes based on the CURRENT category
                get availableSizes() {
                    let sizes = new Set();
                    let cats = this.category === 'all' 
                        ? this.products 
                        : this.products.filter(p => p.category && p.category.toLowerCase() === this.category.toLowerCase());
                    
                    cats.forEach(p => {
                        if (p.size) {
                            let sizeList = [];
                            try {
                                sizeList = typeof p.size === 'string' ? JSON.parse(p.size) : p.size;
                            } catch (e) {
                                sizeList = [p.size];
                            }
                            if(Array.isArray(sizeList)){
                                sizeList.forEach(s => sizes.add(s));
                            } else {
                                sizes.add(sizeList);
                            }
                        }
                    });

                    // Sort sizes roughly logically if possible
                    const sizeOrder = {'XS': 1, 'S': 2, 'M': 3, 'L': 4, 'XL': 5, 'One Size': 6};
                    return Array.from(sizes).sort((a, b) => {
                        let rankA = sizeOrder[a] || 99;
                        let rankB = sizeOrder[b] || 99;
                        if (rankA !== rankB) return rankA - rankB;
                        // fallback to alphabetical if not in sizeOrder map (e.g., shoe sizes like '40', '41')
                        return a.toString().localeCompare(b.toString());
                    });
                },
                
                get filteredProducts() {
                    let result = this.products;

                    // Filter by category
                    if (this.category !== 'all') {
                        result = result.filter(p => p.category && p.category.toLowerCase() === this.category.toLowerCase());
                    }

                    // Filter by size
                    if (this.size !== 'all') {
                        result = result.filter(p => {
                            if (!p.size) return false;
                            let sizeList = [];
                            try {
                                sizeList = typeof p.size === 'string' ? JSON.parse(p.size) : p.size;
                            } catch (e) {
                                sizeList = [p.size];
                            }
                            return sizeList.includes(this.size);
                        });
                    }

                    // Sorting
                    if (this.sortBy === 'price_asc') {
                        result = result.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
                    } else if (this.sortBy === 'price_desc') {
                        result = result.sort((a, b) => parseFloat(b.price) - parseFloat(a.price));
                    } else {
                        // newest
                        result = result.sort((a, b) => b.id - a.id);
                    }

                    return result;
                }
            }));
        });
    </script>
</x-app-layout>
