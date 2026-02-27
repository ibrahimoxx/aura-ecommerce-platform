<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon Panier') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Cart Items Section -->
                <div class="w-full lg:w-2/3">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h3 class="text-xl font-bold text-gray-900">Articles de votre commande</h3>
                        </div>
                        
                        <div class="p-6">
                            @if(count($x) > 0)
                                <div class="space-y-6">
                                    @php $totalPrice = 0; @endphp
                                    @foreach($x as $item)
                                        @php $totalPrice += $item->totalPrix; @endphp
                                        <div class="flex flex-col sm:flex-row items-center border border-gray-100 rounded-xl p-4 gap-6 hover:shadow-md transition-shadow">
                                            <!-- Product Image -->
                                            <div class="w-full sm:w-32 h-32 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                                <img src="{{ $item->products->image_url }}" alt="{{ $item->products->name }}" class="w-full h-full object-cover">
                                            </div>
                                            
                                            <!-- Product Details -->
                                            <div class="flex-1 w-full flex flex-col justify-between">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h4 class="text-lg font-bold text-gray-900">{{ $item->products->name }}</h4>
                                                        <p class="text-sm text-gray-500 mt-1">{{ $item->products->category }} | {{ $item->products->brand }}</p>
                                                    </div>
                                                    <span class="text-lg font-extrabold text-indigo-600">${{ $item->totalPrix }}</span>
                                                </div>
                                                
                                                <div class="flex items-center justify-between mt-4">
                                                    <!-- Quantity Controls -->
                                                    <div class="flex items-center space-x-3 bg-gray-50 rounded-lg p-1 border border-gray-200">
                                                        <a href="{{Route('moinsProduct', $item->id)}}" class="w-8 h-8 flex items-center justify-center rounded-md bg-white hover:bg-gray-100 text-gray-600 border border-gray-200 shadow-sm transition-colors">-</a>
                                                        <span class="font-semibold px-2 w-8 text-center">{{ $item->quantity }}</span>
                                                        <!-- Prevent adding more if stock limit reached. Assuming you want them to stop at product stock. -->
                                                        @if($item->quantity < $item->products->stock)
                                                            <a href="{{Route('plusProduct', $item->products->id)}}" class="w-8 h-8 flex items-center justify-center rounded-md bg-white hover:bg-gray-100 text-gray-600 border border-gray-200 shadow-sm transition-colors">+</a>
                                                        @else
                                                            <button disabled class="w-8 h-8 flex items-center justify-center rounded-md bg-gray-100 text-gray-400 border border-gray-200 cursor-not-allowed">+</button>
                                                        @endif
                                                    </div>
                                                    
                                                    <!-- Remove Button -->
                                                    <a href="{{Route('suppPro', $item->id)}}" class="text-red-500 hover:text-red-700 flex items-center text-sm font-medium transition-colors">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        Retirer
                                                    </a>
                                                </div>
                                                @if($item->quantity >= $item->products->stock)
                                                    <p class="text-xs text-orange-500 mt-2">Maximum en stock atteint.</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-16">
                                    <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <h3 class="text-xl font-medium text-gray-900 mb-2">Votre panier est vide</h3>
                                    <p class="text-gray-500 mb-6">Ajoutez des articles pour continuer vos achats.</p>
                                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                        Retour au catalogue
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary Section -->
                @if(count($x) > 0)
                <div class="w-full lg:w-1/3">
                    <div class="bg-gray-900 text-white rounded-2xl shadow-xl border border-gray-800 p-6 sticky top-8">
                        <h3 class="text-xl font-bold mb-6">Récapitulatif</h3>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between text-gray-300 text-sm">
                                <span>Sous-total ({{ count($x) }} articles)</span>
                                <span>${{ $totalPrice }}</span>
                            </div>
                            <div class="flex justify-between text-gray-300 text-sm">
                                <span>Frais de livraison</span>
                                <span class="text-green-400">Gratuit</span>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-700 pt-4 mb-8">
                            <div class="flex justify-between items-end">
                                <span class="text-base font-medium">Total TTC</span>
                                <span class="text-3xl font-extrabold text-indigo-400">${{ $totalPrice }}</span>
                            </div>
                        </div>
                        
                        <a href="{{ url('/commander') }}" class="block w-full text-center bg-indigo-500 border border-transparent rounded-xl py-4 px-4 text-base font-bold text-white hover:bg-indigo-600 transition-colors shadow-lg shadow-indigo-500/30">
                            Passer à la caisse
                        </a>
                        
                        <div class="mt-6 flex justify-center space-x-4 text-gray-400">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-12h2v6h-2zm0 8h2v2h-2z"/></svg>
                            <span class="text-sm">Paiement 100% sécurisé</span>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</x-app-layout>
