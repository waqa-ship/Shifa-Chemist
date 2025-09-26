@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add New Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Basic Product Information Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Product Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Product Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $product->name ?? '') }}" required>
                        </div>

                        
                        <!-- Product Category -->
                        <div class="col-md-6 mb-3">
                            <label for="medicine_category_id" class="form-label">Product Category</label>
                            <select class="form-control" id="medicine_category_id" name="category" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('medicine_category_id', $product->medicine_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Product Number/ID -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Product Number/ID</label>
                            <input type="text" name="product_number" class="form-control"
                                placeholder="Auto-generated if empty">
                        </div>

                        <!-- Barcode / QR Code -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Barcode / QR Code</label>
                            <input type="text" name="barcode" class="form-control"
                                placeholder="Enter barcode or QR code">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory & Pricing Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Inventory & Pricing</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Purchase Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="purchase_price" class="form-control" required
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Selling Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="selling_price" class="form-control" required
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Discount (%)</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="discount" class="form-control" placeholder="0"
                                    min="0" max="100">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Quantity in Stock</label>
                            <input type="number" name="quantity_in_stock" class="form-control" required placeholder="0"
                                min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Minimum Stock Alert</label>
                            <input type="number" name="minimum_stock_alert" class="form-control" required placeholder="5"
                                min="0">
                            <div class="form-text">Alert when stock falls below this level</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expiry & Dates Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Expiry & Dates</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Manufacture Date</label>
                            <input type="date" name="manufacture_date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Expiry Date</label>
                            <input type="date" name="expiry_date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Added Date</label>
                            <input type="date" name="added_date" class="form-control" value="{{ date('Y-m-d') }}"
                                readonly>
                            <div class="form-text">Automatically set to today</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Details Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Other Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Storage Requirements</label>
                            <select name="storage_requirements" class="form-select">
                                <option value="">Select storage type</option>
                                <option value="Room Temperature">Room Temperature</option>
                                <option value="Refrigerated (2-8°C)">Refrigerated (2-8°C)</option>
                                <option value="Frozen (-20°C)">Frozen (-20°C)</option>
                                <option value="Cool & Dry Place">Cool & Dry Place</option>
                                <option value="Dark Place">Dark Place</option>
                                <option value="Custom">Custom</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Custom Storage Requirements</label>
                            <input type="text" name="custom_storage_requirements" class="form-control"
                                placeholder="Enter if custom selected">
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="prescription_required" value="1"
                                    class="form-check-input" id="prescriptionCheck">
                                <label class="form-check-label" for="prescriptionCheck">
                                    <strong>Prescription Required?</strong>
                                </label>
                                <div class="form-text">Check if this product requires a prescription</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Image & Description Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Image & Description</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="product_image" class="form-control" accept="image/*">
                            <div class="form-text">Accepted formats: JPG, PNG, GIF (Max: 5MB)</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image Preview</label>
                            <div class="border rounded p-3 text-center bg-light" style="min-height: 120px;">
                                <small class="text-muted">Image preview will appear here</small>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description / Notes</label>
                            <textarea name="description" class="form-control" rows="4"
                                placeholder="Enter product description, usage instructions, side effects, or any other relevant notes..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Save Product
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="bi bi-eye"></i> Save & Preview
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back to Products
                        </a>
                        <button type="reset" class="btn btn-outline-warning">
                            <i class="bi bi-arrow-clockwise"></i> Reset Form
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Image preview functionality
        document.querySelector('input[name="product_image"]').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.querySelector('.border.rounded.p-3');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML =
                        `<img src="${e.target.result}" class="img-fluid" style="max-height: 100px;">`;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '<small class="text-muted">Image preview will appear here</small>';
            }
        });

        // Auto-calculate final price with discount
        document.querySelector('input[name="selling_price"]').addEventListener('input', calculateFinalPrice);
        document.querySelector('input[name="discount"]').addEventListener('input', calculateFinalPrice);

        function calculateFinalPrice() {
            const sellingPrice = parseFloat(document.querySelector('input[name="selling_price"]').value) || 0;
            const discount = parseFloat(document.querySelector('input[name="discount"]').value) || 0;
            const finalPrice = sellingPrice - (sellingPrice * discount / 100);

            // You can display this calculation somewhere if needed
            console.log('Final Price after discount:', finalPrice.toFixed(2));
        }
    </script>
@endsection
