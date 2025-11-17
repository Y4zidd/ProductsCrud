<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Product Information</h3>
                    <div class="mb-4">
                        <strong>Name:</strong> {{ $product->name }}
                    </div>
                    <div class="mb-4">
                        <strong>Description:</strong> {{ $product->description }}
                    </div>
                    <div class="mb-4">
                        <strong>Price:</strong> Rp.{{ number_format($product->price) }}
                    </div>
                    <div class="mb-4">
                        <strong>Stock:</strong> {{ $product->stock }}
                    </div>
                    <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
