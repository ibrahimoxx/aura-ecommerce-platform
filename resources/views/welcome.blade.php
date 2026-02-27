<x-app-layout>
    <!-- Hero Section -->
    <section class="relative h-[85vh] w-full bg-[#f4f4f4] flex items-center justify-center overflow-hidden">
        <!-- Placeholder Image Background -->
        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=2000&auto=format&fit=crop" alt="Fashion Lifestyle" class="absolute inset-0 w-full h-full object-cover object-[center_20%] opacity-90">
        
        <!-- Gradient Overlay for Contrast -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>

        <div class="relative z-10 text-center text-white px-4 flex flex-col items-center max-w-3xl mt-24">
            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 drop-shadow-md">The Latest Collection</h1>
            <p class="text-base md:text-lg font-light mb-10 w-3/4 mx-auto drop-shadow">Elevate your everyday with our new arrivals. Sustainably crafted, minimally designed.</p>
            
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                <a href="{{ route('dashboard') }}" class="px-10 py-4 bg-white text-black font-semibold text-xs tracking-[0.2em] uppercase hover:bg-gray-100 transition-colors w-full sm:w-auto text-center rounded-[4px]">
                    Shop Now
                </a>
                <a href="{{ route('dashboard') }}" class="px-10 py-4 border border-white text-white font-semibold text-xs tracking-[0.2em] uppercase hover:bg-white hover:text-black transition-colors w-full sm:w-auto text-center rounded-[4px] backdrop-blur-sm">
                    Explore
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Categories Row -->
    <section class="max-w-[1400px] mx-auto px-6 lg:px-12 py-24">
        <div class="flex justify-between items-end mb-10">
            <h2 class="text-2xl font-semibold tracking-tight">Shop by Category</h2>
            <a href="{{ route('dashboard') }}" class="text-sm font-medium underline underline-offset-4 hover:text-[#556B2F] transition-colors">View All</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Category: Men -->
            <a href="{{ route('dashboard') }}?category=clothing" class="group relative aspect-[4/5] block overflow-hidden rounded-[8px] bg-gray-100">
                <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?q=80&w=800&auto=format&fit=crop" alt="Men's Collection" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-[1.5s] ease-out">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-white/95 backdrop-blur-sm px-6 py-4 flex justify-between items-center rounded-[4px]">
                        <span class="text-sm font-semibold uppercase tracking-widest">Men</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
            </a>
            
            <!-- Category: Women -->
            <a href="{{ route('dashboard') }}?category=clothing" class="group relative aspect-[4/5] block overflow-hidden rounded-[8px] bg-gray-100">
                <img src="https://images.unsplash.com/photo-1434389678232-0678a1bcff6e?q=80&w=800&auto=format&fit=crop" alt="Women's Collection" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-[1.5s] ease-out">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-white/95 backdrop-blur-sm px-6 py-4 flex justify-between items-center rounded-[4px]">
                        <span class="text-sm font-semibold uppercase tracking-widest">Women</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
            </a>

            <!-- Category: Accessories -->
            <a href="{{ route('dashboard') }}?category=accessories" class="group relative aspect-[4/5] block overflow-hidden rounded-[8px] bg-gray-100">
                <img src="https://images.unsplash.com/photo-1509319117193-57bab727e09d?q=80&w=800&auto=format&fit=crop" alt="Accessories" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-[1.5s] ease-out">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-white/95 backdrop-blur-sm px-6 py-4 flex justify-between items-center rounded-[4px]">
                        <span class="text-sm font-semibold uppercase tracking-widest">Accessories</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- Trending Now Carousel Placeholder -->
    <section class="bg-[#fcfbf9] py-24 border-t border-gray-100">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-12">Trending Now</h2>
            
            <div class="flex overflow-x-auto gap-6 sm:gap-8 pb-8 snap-x snap-mandatory hide-scrollbar">
                
                <!-- Product Card 1 -->
                <div class="min-w-[280px] w-[280px] sm:min-w-[320px] sm:w-[320px] snap-start group cursor-pointer flex-shrink-0">
                    <div class="relative bg-gray-100 aspect-[4/5] mb-4 overflow-hidden rounded-[8px]">
                        <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover">
                        <!-- Quick Add -->
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <button class="w-full bg-white/90 backdrop-blur-md text-black font-semibold text-xs tracking-widest uppercase py-3 rounded-[4px] hover:bg-black hover:text-white transition-colors">Quick Add</button>
                        </div>
                        <button class="absolute top-4 right-4 text-gray-400 hover:text-black transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium mb-1">Essential Hoodie</h3>
                            <p class="text-xs text-gray-500">2 Colors</p>
                        </div>
                        <span class="text-sm font-medium">$45</span>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="min-w-[280px] w-[280px] sm:min-w-[320px] sm:w-[320px] snap-start group cursor-pointer flex-shrink-0">
                    <div class="relative bg-gray-100 aspect-[4/5] mb-4 overflow-hidden rounded-[8px]">
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <button class="w-full bg-white/90 backdrop-blur-md text-black font-semibold text-xs tracking-widest uppercase py-3 rounded-[4px] hover:bg-black hover:text-white transition-colors">Quick Add</button>
                        </div>
                        <button class="absolute top-4 right-4 text-gray-400 hover:text-black transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium mb-1">Sleek Leather Jacket</h3>
                            <p class="text-xs text-gray-500">1 Color</p>
                        </div>
                        <span class="text-sm font-medium">$195</span>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="min-w-[280px] w-[280px] sm:min-w-[320px] sm:w-[320px] snap-start group cursor-pointer flex-shrink-0">
                    <div class="relative bg-gray-100 aspect-[4/5] mb-4 overflow-hidden rounded-[8px]">
                        <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <button class="w-full bg-white/90 backdrop-blur-md text-black font-semibold text-xs tracking-widest uppercase py-3 rounded-[4px] hover:bg-black hover:text-white transition-colors">Quick Add</button>
                        </div>
                        <button class="absolute top-4 right-4 text-gray-400 hover:text-black transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium mb-1">Casual Sneakers</h3>
                            <p class="text-xs text-gray-500">3 Colors</p>
                        </div>
                        <span class="text-sm font-medium">$85</span>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="min-w-[280px] w-[280px] sm:min-w-[320px] sm:w-[320px] snap-start group cursor-pointer flex-shrink-0">
                    <div class="relative bg-gray-100 aspect-[4/5] mb-4 overflow-hidden rounded-[8px]">
                        <img src="https://images.unsplash.com/photo-1594938298596-3636b063afb9?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <button class="w-full bg-white/90 backdrop-blur-md text-black font-semibold text-xs tracking-widest uppercase py-3 rounded-[4px] hover:bg-black hover:text-white transition-colors">Quick Add</button>
                        </div>
                        <button class="absolute top-4 right-4 text-gray-400 hover:text-black transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium mb-1">Cotton Relaxed Chinos</h3>
                            <p class="text-xs text-gray-500">2 Colors</p>
                        </div>
                        <span class="text-sm font-medium">$55</span>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('dashboard') }}" class="inline-block px-10 py-4 border border-gray-300 text-black font-semibold text-xs tracking-[0.2em] uppercase hover:border-black transition-colors rounded-[4px]">
                    View The Full Collection
                </a>
            </div>
        </div>
    </section>
    
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</x-app-layout>
