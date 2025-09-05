@extends('layouts.app')

@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">
                <i class="fas fa-pills me-2"></i> Product List
            </h2>
            <a href="{{ route('products.create') }}" class="btn btn-success shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Add Product
            </a>
        </div>


        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive" style="max-height: 100vh; overflow-y: auto;">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Barcode</th>
                        <th>Purchase Price</th>
                        <th>Selling Price</th>
                        <th>Stock</th>
                        <th>Manufacture Date</th>
                        <th>Expiry Date</th>
                        <th>Prescription Required?</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category ?? 'N/A' }}</td>
                            <td>{{ $product->barcode ?? 'N/A' }}</td>
                            <td>{{ $product->purchase_price ?? 'N/A' }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity_in_stock }}</td>
                            <td>{{ $product->manufacture_date ?? 'N/A' }}</td>
                            <td>{{ $product->expiry_date ?? 'N/A' }}</td>
                            <td>{{ $product->prescription_required ? 'Yes' : 'No' }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirmDelete('{{ $product->name }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>



        {{-- Pagination --}}
        <div class="pagination-wrapper">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
@push('styles')
    <link href="{{ asset('css/product-index.css') }}" rel="stylesheet">
@endpush
