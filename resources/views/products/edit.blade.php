@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <!-- Product Overview -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Product Overview</div>
                    <div class="card-body text-center">
                        @if($product->product_image)
                            <img src="{{ asset('storage/'.$product->product_image) }}" 
                                 class="img-fluid rounded mb-2" style="max-height:150px">
                        @endif
                        <input type="file" name="product_image" class="form-control mt-2">
                        <div class="mt-3">
                            <label class="form-label">Barcode</label>
                            <input type="text" name="barcode" value="{{ $product->barcode }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory & Pricing -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Inventory & Pricing</div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Purchase Price</label>
                                <input type="number" step="0.01" name="purchase_price" value="{{ $product->purchase_price }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Discount (%)</label>
                                <input type="number" step="0.01" name="discount" value="{{ $product->discount }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity in Stock</label>
                                <input type="number" name="quantity_in_stock" value="{{ $product->quantity_in_stock }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Selling Price</label>
                                <input type="number" step="0.01" name="selling_price" value="{{ $product->selling_price }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Minimum Stock Alert</label>
                                <input type="number" name="minimum_stock_alert" value="{{ $product->minimum_stock_alert }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expiry & Dates + Other Details -->
        <div class="row g-3 mt-1">
            <!-- Expiry & Dates -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Expiry & Dates</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Manufacture Date</label>
                            <input type="date" name="manufacture_date" value="{{ $product->manufacture_date }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expiry Date</label>
                            <input type="date" name="expiry_date" value="{{ $product->expiry_date }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Details -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Other Details</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Storage Requirements</label>
                            <input type="text" name="storage_requirements" value="{{ $product->storage_requirements }}" class="form-control">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="prescription_required" value="1" class="form-check-input" 
                                {{ $product->prescription_required ? 'checked' : '' }}>
                            <label class="form-check-label">Prescription Required?</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="card shadow-sm mt-3">
            <div class="card-header fw-bold">Description / Notes</div>
            <div class="card-body">
                <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div>
                <button type="submit" class="btn btn-primary me-2">Update Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </form>
</div>
@endsection
                                                                                                                                                                                            