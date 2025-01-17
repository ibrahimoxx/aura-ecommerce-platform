<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">My Bag</h1>

                    @if ($x !== null && count($x) > 0)
                        <table class="min-w-full table-auto border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border border-gray-300">Nom Produit</th>
                                    <th class="px-4 py-2 border border-gray-300">Prix</th>
                                    <th class="px-4 py-2 border border-gray-300">Size</th>
                                    <th class="px-4 py-2 border border-gray-300">Color</th>
                                    <th class="px-4 py-2 border border-gray-300">Quantity</th>
                                    <th class="px-4 py-2 border border-gray-300">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $grandTotal = 0;
                                @endphp
                                @foreach ($x as $product)
                                    @php
                                        $grandTotal += $product->totalPrix;
                                    @endphp
                                    <tr class="bg-white hover:bg-gray-50">
                                        <td class="px-4 py-2 border border-gray-300">{{ $product->products->name }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $product->products->price }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ implode(', ', $product->products->size) }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ implode(', ', $product->products->color) }}</td>
                                        <td class="px-4 py-2 border border-gray-300 flex items-center justify-center">
                                            <a href="{{ route('moinsProduct', $product->products->id) }}" >
                                                <button  class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                -</button>
                                            </a>                                            
                                            <span class="px-4">{{ $product->quantity }}</span>
                                            <a href="{{ route('plusProduct', $product->products->id) }}" >
                                                <button  class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                                +</button>
                                            </a>  
                                        </td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $product->totalPrix }}</td>
                                        <td>
                                        <a href="{{ route('suppPro', $product->id) }}" >
                                                <button  class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                supprimer</button>
                                            </a> 
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="bg-gray-200">
                                    <td colspan="5" class="px-4 py-2 border border-gray-300 font-bold text-right">Total</td>
                                    <td class="px-4 py-2 border border-gray-300 font-bold">{{ $grandTotal }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-6 flex justify-end">
                            <a href="{{ route('commander') }}">
                                <button class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg shadow-md hover:bg-blue-700">
                                    Commander
                                </button>
                            </a>
                        </div>
                    @else
                        <p class="text-red-500 font-semibold">Your bag is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
