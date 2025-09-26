@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Product Details</h2>

        <div class="row g-3">
            <!-- Product Overview -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Product Overview</div>
                    <div class="card-body text-center">
                        @if ($product->product_image)
                            <img src="{{ asset('storage/' . $product->product_image) }}" class="img-fluid rounded mb-2"
                                style="max-height:150px">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                        <h6 class="mt-2">
                            <a href="#" class="text-decoration-none">
                                Product #{{ $product->id }}
                            </a>
                        </h6>
                        <p class="text-muted">{{ $product->barcode ?? 'No Barcode' }}</p>
                    </div>
                </div>
            </div>

            <!-- Inventory & Pricing -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Inventory & Pricing</div>
                    <div class="card-body row text-center">
                        <div class="col-md-6">
                            <p><strong>Purchase Price:</strong>
                                <span class="badge bg-info">${{ $product->purchase_price }}</span>
                            </p>
                            <p><strong>Discount:</strong>
                                <span class="badge bg-warning">{{ $product->discount }}%</span>
                            </p>
                            <p><strong>Quantity in Stock:</strong>
                                <span class="badge bg-danger">{{ $product->quantity_in_stock }} units</span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Selling Price:</strong>
                                <span class="badge bg-success">${{ $product->selling_price }}</span>
                            </p>
                            <p><strong>Category:</strong>
                                <span class="badge bg-info">
                                    {{ $product->medicineCategory->name ?? 'N/A' }}
                                </span>
                            </p>
                            <p><strong>Min Stock Alert:</strong>
                                <span class="badge bg-secondary">{{ $product->minimum_stock_alert }} units</span>
                            </p>
                        </div>
                    </div>
                    @if ($product->quantity_in_stock <= $product->minimum_stock_alert)
                        <div class="alert alert-warning text-center mb-0">
                            <strong>Low Stock Alert!</strong> Current stock is at or below the minimum threshold.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <!-- Expiry & Dates -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Expiry & Dates</div>
                    <div class="card-body">
                        <p><strong>Manufacture Date:</strong> {{ $product->manufacture_date ?? 'N/A' }}</p>
                        <p><strong>Expiry Date:</strong> {{ $product->expiry_date ?? 'N/A' }}</p>
                        <p><strong>Added Date:</strong>
                            {{ $product->created_at ? $product->created_at->format('M d, Y') : 'N/A' }}</p>
                        @if ($product->expiry_date && \Carbon\Carbon::parse($product->expiry_date)->isPast())
                            <div class="alert alert-danger mb-0">Product Expired!</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Other Details -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Other Details</div>
                    <div class="card-body">
                        <p><strong>Storage Requirements:</strong>
                            <span class="badge bg-dark">{{ $product->storage_requirements ?? 'N/A' }}</span>
                        </p>
                        <p><strong>Prescription Required:</strong>
                            <span class="badge {{ $product->prescription_required ? 'bg-danger' : 'bg-success' }}">
                                {{ $product->prescription_required ? 'Yes' : 'No' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="card shadow-sm mt-3">
            <div class="card-header fw-bold">Description / Notes</div>
            <div class="card-body">
                {{ $product->description ?? 'No description available.' }}
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning me-1">Edit Product</a>
                <a href="#" class="btn btn-info me-1">Print Label</a>
                <a href="#" class="btn btn-success me-1">Add to Sale</a>
                <a href="#" class="btn btn-primary me-1">Copy Details</a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="ms-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>
        </div>
    </div>
@endsection
