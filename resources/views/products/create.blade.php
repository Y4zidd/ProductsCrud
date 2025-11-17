<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="mb-4">
                                <ul class="list-disc list-inside text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Product Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="w-full px-3 py-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description:</label>
                            <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Price:</label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}"
                                step="0.01" class="w-full px-3 py-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block text-gray-700">Stock:</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" class="w-full px-3 py-2 border rounded" required>
                        </div>

                        <div>
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Create Product</button>
                            <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
