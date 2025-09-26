@extends('layouts.app')
<style>
    /* Filter animations */
    .medicine-card.hidden {
        display: none !important;
    }

    .medicine-card.fade-out {
        opacity: 0;
        transform: scale(0.95);
        transition: all 0.3s ease;
    }

    .search-container {
        position: relative;
        margin-bottom: 1rem;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        z-index: 2;
        cursor: pointer;
    }

    .search-input {
        padding-left: 35px;
        border-radius: 25px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        border-color: #007bff;
    }

    .btn-outline-primary.active {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
</style>
@section('content')
    <!-- Main Container -->
    <div class="main-container">
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon me-3" style="background: linear-gradient(135deg, #28a745, #20c997);">
                            <i class="fas fa-pills"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Total Medicines</h6>
                            <h4 class="mb-0 fw-bold">1,247</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon me-3" style="background: linear-gradient(135deg, #17a2b8, #20c997);">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Today's Sales</h6>
                            <h4 class="mb-0 fw-bold">Rs. 45,670</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon me-3" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Low Stock</h6>
                            <h4 class="mb-0 fw-bold">23</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon me-3" style="background: linear-gradient(135deg, #dc3545, #e74c3c);">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Expiring Soon</h6>
                            <h4 class="mb-0 fw-bold">8</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <!-- Left side: Shopping Cart (Increased Size) -->
            <div class="col-xl-8 col-lg-7">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center text-white"
                        style="background: linear-gradient(135deg, #28a745, #20c997) !important;">

                        <!-- Left: Title + Cart Count -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Left: Cart Title -->
                            <h5 class="mb-0 d-flex align-items-center gap-2">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Shopping Cart
                                <span class="badge bg-light text-dark ms-2" id="cartCount">0</span>
                            </h5>

                            <!-- Right: Customer Dropdown -->
                            <div class="d-flex align-items-end gap-2">
                                <label for="customerSelect" class="form-label mb-0 fw-bold">Select Customer:</label>
                                <select id="customerSelect" class="form-select form-select-sm w-auto">
                                    <option value="">-- Select Customer --</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->name }} ({{ $customer->phone }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <!-- Right: Customer Dropdown -->

                    </div>

                    <div class="card-body d-flex flex-column">
                        <!-- Cart Items -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle text-center">
                                <thead class="table-success">
                                    <tr>
                                        <th>Name</th>
                                        <th>MRP</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Total</th>
                                        <th>Disc</th>
                                        <th>Tax Amt</th>
                                        <th>CGST</th>
                                        <th>SGST</th>
                                        <th>Total Amt</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cartTableBody">
                                    <tr>
                                        <td colspan="11" class="text-muted">Cart is empty</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <h5>Grand Total: Rs. <span id="grandTotal">0.00</span></h5>
                        </div>


                        <button class="btn btn-success btn-lg" onclick="checkout()">Process Payment</button>


                        <!-- Discount Section -->
                        <div class="discount-section" id="discountSection" style="display: none;">
                            <h6 class="mb-3"><i class="fas fa-percent me-2"></i>Discount</h6>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label small">Discount Type</label>
                                    <select class="form-select discount-input" id="discountType">
                                        <option value="percentage">Percentage (%)</option>
                                        <option value="fixed">Fixed Amount (Rs.)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small">Discount Value</label>
                                    <input type="number" class="form-control discount-input" id="discountValue"
                                        min="0" step="0.01" placeholder="0">
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-sm btn-success" onclick="applyDiscount()">
                                    <i class="fas fa-check me-1"></i>Apply
                                </button>
                                <button class="btn btn-sm btn-outline-secondary ms-2" onclick="clearDiscount()">
                                    <i class="fas fa-times me-1"></i>Clear
                                </button>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="cart-summary" id="cartTotal" style="display: none;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex justify-content-between">
                                        <span>Subtotal:</span>
                                        <span id="subtotalAmount">Rs. 0</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Discount:</span>
                                        <span class="text-success" id="discountAmount">Rs. 0</span>
                                    </div>
                                    <hr class="my-2">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Total:</span>
                                        <span class="fw-bold fs-5 text-primary" id="totalAmount">Rs. 0</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div class="small text-muted">Items: <span id="totalItems">0</span></div>
                                        <div class="small text-muted">Tax: Rs. <span id="taxAmount">0</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Checkout Buttons -->
                        <div class="checkout-buttons d-grid gap-2" id="checkoutButtons"
                            style="display: none !important;">
                            <button class="btn btn-success btn-lg">
                                <i class="fas fa-cash-register me-2"></i>Process Payment
                            </button>
                            <div class="row g-2">
                                <div class="col-4">
                                    <button class="btn btn-info w-100">
                                        <i class="fas fa-print me-1"></i>Print
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-warning w-100" onclick="holdTransaction()">
                                        <i class="fas fa-pause me-1"></i>Hold
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-danger w-100" onclick="clearCart()">
                                        <i class="fas fa-trash-alt me-1"></i>Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side: Medicine Inventory (Decreased Size) -->
            <div class="col-xl-4 col-lg-5">
                <div class="card h-100">
                    <div class="card-header text-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0">
                                <i class="fas fa-pills me-2"></i>
                                Medicine Inventory
                            </h6>
                            <div class="d-flex gap-1">
                                <button class="btn btn-light btn-sm">
                                    <i class="fas fa-filter"></i>
                                </button>
                                <button class="btn btn-light btn-sm">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4" style="background: #f9fafc; border-radius: 15px;">

                        <!-- Search bar -->
                        <div class="search-container mb-3 position-relative">
                            <input type="text" id="searchInput" placeholder="🔍 Search medicines..."
                                class="form-control shadow-sm rounded-pill ps-4">
                        </div>

                        <!-- Filter buttons -->
                        <div class="filter-buttons mb-4 text-center">
                            <button data-category="all"
                                class="btn btn-sm btn-outline-primary rounded-pill px-4 me-2 active">All</button>
                            @foreach ($categories as $category)
                                <button data-category="{{ $category->id }}"
                                    class="btn btn-sm btn-outline-secondary rounded-pill px-4 me-2">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </div>

                        <!-- Medicines List -->
                        <div class="medicines-container" style="max-height: 500px; overflow-y: auto;">
                            @foreach ($products as $product)
                                <div class="medicine-card filter-item mb-3 p-3 shadow-sm rounded d-flex align-items-center"
                                    style="background: #fff; transition: 0.3s; cursor: pointer;"
                                    data-category="{{ $product->medicineCategory->id ?? '' }}"
                                    data-name="{{ $product->name }}" data-description="{{ $product->description ?? '' }}"
                                    onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.1)'"
                                    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 6px rgba(0,0,0,0.05)'">

                                    <!-- Image -->
                                    <div class="medicine-image me-3">
                                        @if ($product->product_image)
                                            <img src="{{ asset('storage/' . $product->product_image) }}"
                                                alt="{{ $product->name }}"
                                                style="width:65px; height:65px; border-radius: 10px; object-fit: cover;">
                                        @else
                                            <i class="fas fa-pills fa-2x text-primary"></i>
                                        @endif
                                    </div>

                                    <!-- Info -->
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold text-dark">{{ $product->name }}</h6>
                                        <p class="mb-1 text-muted small">
                                            {{ $product->description ?? 'No description available' }}</p>

                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <span
                                                class="badge {{ $product->quantity_in_stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                                Stock: {{ $product->quantity_in_stock }}
                                            </span>
                                            <span
                                                class="badge {{ $product->prescription_required ? 'bg-danger' : 'bg-secondary' }}">
                                                {{ $product->prescription_required ? 'Rx' : 'OTC' }}
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="fw-bold text-primary fs-6">
                                                Rs. {{ $product->selling_price }}
                                            </div>
                                            <button class="btn btn-success btn-sm rounded-circle"
                                                onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->selling_price }})"
                                                {{ $product->quantity_in_stock > 0 ? '' : 'disabled' }}>
                                                <i class="fas fa-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- No results -->
                        <div id="no-results"
                            style="display: none; text-align: center; padding: 40px 20px; color: #6c757d;">
                            <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                            <h5>No medicines found</h5>
                            <p>Try adjusting your search or filter criteria.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5.3 JS -->
    <script src="{{ asset('js/medicine-filter.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection

@push('styles')
    <link href="{{ asset('css/pharmacy-pos.css') }}" rel="stylesheet">
@endpush
