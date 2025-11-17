<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Product List -->
                    <div class="flex justify-between mb-4 ">
                            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Add New Product</a>
                            <a href="{{ route('products.export') }}" class="px-4 py-2 bg-green-500 text-white rounded">Export</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto bg-white divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Stock</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ ($products -> currentPage() - 1) * $products -> perPage() + $loop->iteration }} </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $product->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $product->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp.{{ number_format($product->price) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $product->stock }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="d-inline-flex align-items-center justify-content-center btn"
                                                style="width:28px;height:28px;border-radius:8px;background:#3b82f6;border-color:#3b82f6;"
                                                title="View" aria-label="View product">
                                                <i class="bi bi-eye" style="color:#fff;"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="d-inline-flex align-items-center justify-content-center btn"
                                                style="width:28px;height:28px;border-radius:8px;background:#f59e0b;border-color:#f59e0b;"
                                                title="Edit" aria-label="Edit product">
                                                <i class="bi bi-pencil" style="color:#fff;"></i>
                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="d-inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="d-inline-flex align-items-center justify-content-center btn"
                                                    style="width:28px;height:28px;border-radius:8px;background:#ef4444;border-color:#ef4444;"
                                                    title="Delete" aria-label="Delete product">
                                                    <i class="bi bi-trash" style="color:#fff;"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada produk. <a href="{{ route('products.create') }}"
                                                class="text-blue-600">Tambah produk</a>.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
