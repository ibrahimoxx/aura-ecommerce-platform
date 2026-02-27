<x-app-layout>
    <div x-data="productDetail()" class="bg-white min-h-screen pb-24">
        
        <!-- Top Navigation / Breadcrumb -->
        <div class="border-b border-gray-100 py-4 mt-6">
            <div class="max-w-[1400px] mx-auto px-6 lg:px-12 flex items-center text-xs text-gray-500 font-light space-x-2">
                <a href="{{ route('dashboard') }}" class="hover:text-black transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('dashboard') }}?category={{ strtolower($product->category ?? 'all') }}" class="hover:text-black transition-colors" x-text="'{{ $product->category ?? 'Category' }}'"></a>
                <span>/</span>
                <span class="text-black font-medium">{{ $product->name }}</span>
            </div>
        </div>

        <div class="max-w-[1400px] mx-auto px-6 lg:px-12 mt-10">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
                
                <!-- Left: Image Gallery -->
                <div class="w-full lg:w-3/5 flex gap-4 lg:gap-6">
                    <!-- Thumbnails (Hidden on mobile) -->
                    <div class="hidden md:flex flex-col gap-4 w-20 flex-shrink-0">
                        <button @click="activeImage = '{{ asset($product->image_url) }}'" :class="{'border-black': activeImage === '{{ asset($product->image_url) }}', 'border-transparent': activeImage !== '{{ asset($product->image_url) }}'}" class="border-b-2 pb-1 focus:outline-none transition-colors">
                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="w-full aspect-[3/4] object-cover bg-gray-100">
                        </button>
                        <!-- Placeholders for extra thumbnails to match Everlane style -->
                        <button @click="activeImage = 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600&auto=format&fit=crop'" :class="{'border-black': activeImage === 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600&auto=format&fit=crop', 'border-transparent': activeImage !== 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600&auto=format&fit=crop'}" class="border-b-2 pb-1 focus:outline-none transition-colors opacity-60 hover:opacity-100">
                            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600&auto=format&fit=crop" alt="Detail 1" class="w-full aspect-[3/4] object-cover bg-gray-100">
                        </button>
                        <button @click="activeImage = 'https://images.unsplash.com/photo-1434389678232-0678a1bcff6e?q=80&w=600&auto=format&fit=crop'" :class="{'border-black': activeImage === 'https://images.unsplash.com/photo-1434389678232-0678a1bcff6e?q=80&w=600&auto=format&fit=crop', 'border-transparent': activeImage !== 'https://images.unsplash.com/photo-1434389678232-0678a1bcff6e?q=80&w=600&auto=format&fit=crop'}" class="border-b-2 pb-1 focus:outline-none transition-colors opacity-60 hover:opacity-100">
                            <img src="https://images.unsplash.com/photo-1434389678232-0678a1bcff6e?q=80&w=600&auto=format&fit=crop" alt="Detail 2" class="w-full aspect-[3/4] object-cover bg-gray-100">
                        </button>
                    </div>

                    <!-- Main Image with Zoom on Hover -->
                    <div class="flex-1 relative overflow-hidden bg-[#f4f4f4] aspect-[3/4] md:aspect-[4/5] cursor-zoom-in"
                         @mousemove="zoom" 
                         @mouseenter="zoomed = true" 
                         @mouseleave="zoomed = false; bgPosition = 'center center'">
                        <img :src="activeImage" :alt="product.name" 
                             :class="{'opacity-0': zoomed, 'opacity-100': !zoomed}" 
                             class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300">
                        
                        <!-- Zoomed Image Background -->
                        <div x-show="zoomed" 
                             class="absolute inset-0 w-full h-full"
                             :style="`background-image: url(${activeImage}); background-size: 200%; background-position: ${bgPosition}; background-repeat: no-repeat;`">
                        </div>
                    </div>
                </div>

                <!-- Right: Product Details -->
                <div class="w-full lg:w-2/5 flex flex-col pt-2 lg:pt-10">
                    <div class="mb-8">
                        <div class="flex justify-between items-start mb-2">
                            <h1 class="text-2xl font-medium tracking-tight text-[#222]">{{ $product->name }}</h1>
                            <span class="text-xl font-medium text-[#222]">${{ number_format($product->price, 2) }}</span>
                        </div>
                        
                        <div class="flex items-center text-xs text-gray-500 mb-6 font-light space-x-4">
                            <span>{{ $product->brand }}</span>
                            <!-- Placeholder Rating -->
                            <div class="flex items-center">
                                <span class="flex text-yellow-400">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </span>
                                <span class="ml-2 underline hover:text-black cursor-pointer">4.2 (128 Reviews)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Color Selector Placeholder -->
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-xs font-semibold tracking-wider uppercase text-black">Color</h4>
                            <span class="text-xs text-gray-500 font-light" x-text="selectedColor"></span>
                        </div>
                        <div class="flex gap-3">
                            <button @click="selectedColor = 'Oatmeal'" :class="{'ring-1 ring-black ring-offset-2': selectedColor === 'Oatmeal'}" class="w-8 h-8 rounded-full bg-[#E5E0D8] border border-gray-200 focus:outline-none transition-all"></button>
                            <button @click="selectedColor = 'Charcoal'" :class="{'ring-1 ring-black ring-offset-2': selectedColor === 'Charcoal'}" class="w-8 h-8 rounded-full bg-[#36454F] border border-gray-200 focus:outline-none transition-all"></button>
                            <button @click="selectedColor = 'Olive'" :class="{'ring-1 ring-black ring-offset-2': selectedColor === 'Olive'}" class="w-8 h-8 rounded-full bg-[#556B2F] border border-gray-200 focus:outline-none transition-all"></button>
                        </div>
                    </div>

                    <!-- Size Selector -->
                    @php
                        $sizes = is_string($product->size) ? json_decode($product->size) : $product->size;
                        if(!is_array($sizes)) $sizes = [$sizes];
                    @endphp
                    @if(!empty($sizes) && count($sizes) > 0 && $sizes[0] !== null)
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-xs font-semibold tracking-wider uppercase text-black">Size</h4>
                            <button class="text-xs text-gray-500 font-light underline hover:text-black">Size Guide</button>
                        </div>
                        <div class="grid grid-cols-4 gap-3">
                            @foreach($sizes as $s)
                                <button @click="selectedSize = '{{ $s }}'" 
                                        :class="{'bg-[#556B2F] text-white border-[#556B2F]': selectedSize === '{{ $s }}', 'bg-white text-gray-800 border-gray-300 hover:border-black': selectedSize !== '{{ $s }}'}" 
                                        class="border rounded-[4px] py-3 text-xs font-medium transition-colors">
                                    {{ $s }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Stock Status & Actions -->
                    <div class="mb-10 mt-auto">
                        @if($product->stock > 0)
                            <p class="text-xs text-green-700 font-medium mb-4 flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-2"></span>
                                In Stock ({{ $product->stock }} left)
                            </p>
                            
                            <!-- Mobile Sticky CTA Wrapper (Appears fixed at bottom on mobile) -->
                            <div class="fixed md:static bottom-0 left-0 right-0 p-4 md:p-0 bg-white md:bg-transparent border-t border-gray-100 md:border-t-0 z-40 flex gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.08)] md:shadow-none">
                                <a href="{{ route('addBag', $product->id) }}" class="flex-1 bg-[#556B2F] text-white flex items-center justify-center font-semibold text-xs tracking-widest uppercase py-4 rounded-[4px] hover:bg-black transition-colors w-full">
                                    Add to Bag — ${{ number_format($product->price, 2) }}
                                </a>
                                <button class="w-14 h-14 border border-gray-300 flex items-center justify-center rounded-[4px] hover:border-black transition-colors focus:outline-none flex-shrink-0 bg-white">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                </button>
                            </div>
                        @else
                            <div class="bg-gray-100 border border-gray-200 text-black py-4 text-center rounded-[4px] uppercase text-xs tracking-widest font-semibold mb-4">
                                Currently Sold Out
                            </div>
                            <button class="w-full border border-black text-black font-semibold text-xs tracking-widest uppercase py-4 rounded-[4px] hover:bg-black hover:text-white transition-colors">
                                Waitlist Me
                            </button>
                        @endif
                    </div>

                    <!-- Accordions -->
                    <div class="border-t border-gray-200 pt-2 pb-2">
                        <!-- Description -->
                        <div class="border-b border-gray-200">
                            <button @click="accordion = (accordion === 'desc' ? '' : 'desc')" class="flex justify-between items-center w-full py-5 focus:outline-none text-left">
                                <span class="text-xs uppercase tracking-wider font-semibold">Description</span>
                                <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': accordion === 'desc'}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="accordion === 'desc'" x-collapse class="pb-6">
                                <p class="text-sm text-gray-500 font-light leading-relaxed">
                                    {{ $product->description }}
                                    <br><br>
                                    Designed with premium materials to ensure longevity and ultimate comfort. The perfect addition to your everyday rotation.
                                </p>
                            </div>
                        </div>

                        <!-- Materials & Care -->
                        <div class="border-b border-gray-200">
                            <button @click="accordion = (accordion === 'materials' ? '' : 'materials')" class="flex justify-between items-center w-full py-5 focus:outline-none text-left">
                                <span class="text-xs uppercase tracking-wider font-semibold">Materials & Care</span>
                                <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': accordion === 'materials'}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="accordion === 'materials'" x-collapse class="pb-6">
                                <ul class="list-disc pl-5 text-sm text-gray-500 font-light space-y-2">
                                    <li>100% Organic Material</li>
                                    <li>Machine wash cold with like colors</li>
                                    <li>Tumble dry low or lay flat to dry</li>
                                    <li>Cool iron if needed</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Shipping & Returns -->
                        <div class="border-b border-gray-200">
                            <button @click="accordion = (accordion === 'shipping' ? '' : 'shipping')" class="flex justify-between items-center w-full py-5 focus:outline-none text-left">
                                <span class="text-xs uppercase tracking-wider font-semibold">Shipping & Returns</span>
                                <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': accordion === 'shipping'}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="accordion === 'shipping'" x-collapse class="pb-6">
                                <p class="text-sm text-gray-500 font-light leading-relaxed">
                                    Free standard shipping on all orders over $150. Expedited options available at checkout.<br><br>
                                    We accept returns within 60 days of the original purchase date. Items must be unworn, unwashed, and in original condition with tags attached.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Complete The Look -->
            @if(isset($recommendations) && count($recommendations) > 0)
            <div class="mt-32 border-t border-gray-100 pt-20">
                <h3 class="text-xl font-medium tracking-tight text-center mb-12">Complete The Look</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($recommendations as $rec)
                    <div class="group flex flex-col h-full">
                        <div class="relative bg-[#f4f4f4] aspect-[3/4] mb-4 overflow-hidden rounded-[4px]">
                            <a href="{{ route('product.show', $rec->id) }}" class="block w-full h-full">
                                <img src="{{ asset($rec->image_url) }}" alt="{{ $rec->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            </a>
                            @if($rec->stock > 0)
                            <div class="absolute bottom-0 left-0 right-0 p-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300 z-10">
                                <a href="{{ route('addBag', $rec->id) }}" class="block w-full text-center bg-white/95 backdrop-blur-md py-2 text-[10px] tracking-widest uppercase font-semibold text-black hover:bg-black hover:text-white rounded-[2px]">
                                    Quick Add
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="flex justify-between items-start mt-2">
                            <a href="{{ route('product.show', $rec->id) }}" class="text-xs font-medium text-[#222] hover:underline">{{ $rec->name }}</a>
                            <span class="text-xs font-semibold text-[#222]">${{ number_format($rec->price, 2) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>

    <!-- Alpine.js logic for Product Detail Interaction -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productDetail', () => ({
                product: @js($product),
                activeImage: '{{ asset($product->image_url) }}',
                zoomed: false,
                bgPosition: 'center center',
                selectedColor: 'Oatmeal',
                selectedSize: null,
                accordion: 'desc',
                
                zoom(e) {
                    if (!this.zoomed) return;
                    
                    // Calculate pointer position relative to image container
                    const { left, top, width, height } = e.currentTarget.getBoundingClientRect();
                    const x = ((e.clientX - left) / width) * 100;
                    const y = ((e.clientY - top) / height) * 100;
                    
                    this.bgPosition = `${x}% ${y}%`;
                }
            }));
        });
    </script>
</x-app-layout>
