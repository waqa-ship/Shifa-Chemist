@extends('layouts.app')

@section('content')
<div class="product-index-container">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <div class="page-title">
                    <div class="icon-wrapper">
                        <i class="fas fa-pills"></i>
                    </div>
                    <div>
                        <h1>Medicine Inventory</h1>
                        <p class="subtitle">Manage your pharmaceutical products</p>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <a href="{{ route('products.create') }}" class="btn-primary-custom">
                    <i class="fas fa-plus"></i>
                    <span>Add New Medicine</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert-success-custom">
            <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="alert-content">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Search Section -->
    <div class="search-section">
        <div class="search-container">
            <div class="search-input-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="searchInput" placeholder="Search medicines by name..." />
            </div>
        </div>
    </div>

    <!-- Products Table Section -->
    <div class="table-section">
        <div class="table-header">
            <h3><i class="fas fa-list me-2"></i>Product List</h3>
        </div>

        <div class="table-container">
            @if($products->count() > 0)
                <table class="products-table">
                    <thead>
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
                            <tr class="product-row">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <span class="category-badge">
                                        {{ $product->medicineCategory->name?? 'N/A' }}
                                    </span>
                                </td>
                                <td>{{ $product->barcode ?? 'N/A' }}</td>
                                <td>{{ $product->purchase_price ?? 'N/A' }}</td>
                                <td>${{ number_format($product->selling_price, 2) }}</td>
                                <td>
                                    @php
                                        $stockClass = $product->quantity_in_stock <= 10 ? 'stock-low' : 
                                                     ($product->quantity_in_stock <= 50 ? 'stock-medium' : 'stock-high');
                                    @endphp
                                    <span class="stock-badge {{ $stockClass }}">
                                        {{ $product->quantity_in_stock }} units
                                        @if($product->quantity_in_stock <= 10)
                                            <i class="fas fa-exclamation-triangle"></i>
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $product->manufacture_date ?? 'N/A' }}</td>
                                <td>
                                    @if($product->expiry_date)
                                        @php
                                            $expiryDate = \Carbon\Carbon::parse($product->expiry_date);
                                            $isExpiringSoon = $expiryDate->diffInDays(now()) <= 90 && $expiryDate->isFuture();
                                            $isExpired = $expiryDate->isPast();
                                        @endphp
                                        <span class="expiry-date {{ $isExpired ? 'expired' : ($isExpiringSoon ? 'expiring' : '') }}">
                                            {{ $expiryDate->format('M d, Y') }}
                                            @if($isExpired || $isExpiringSoon)
                                                <i class="fas fa-exclamation-triangle"></i>
                                            @endif
                                        </span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <span class="prescription-badge {{ $product->prescription_required ? 'required' : 'not-required' }}">
                                        @if($product->prescription_required)
                                            <i class="fas fa-prescription-bottle-alt"></i>
                                            Required
                                        @else
                                            <i class="fas fa-shopping-cart"></i>
                                            OTC
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('products.show', $product->id) }}" 
                                           class="btn-action view" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" 
                                           class="btn-action edit" title="Edit Product">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirmDelete('{{ $product->name }}');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-action delete" type="submit" title="Delete Product">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="empty-state-cell">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="fas fa-pills"></i>
                                        </div>
                                        <h3>No products found.</h3>
                                        <a href="{{ route('products.create') }}" class="btn-primary-custom">
                                            <i class="fas fa-plus"></i>
                                            Add First Medicine
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <h3>No medicines found</h3>
                    <p>Start by adding your first medicine to the inventory</p>
                    <a href="{{ route('products.create') }}" class="btn-primary-custom">
                        <i class="fas fa-plus"></i>
                        Add First Medicine
                    </a>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="pagination-section">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>

<style>
:root {
    --primary-color: #2c5aa0;
    --secondary-color: #34495e;
    --success-color: #27ae60;
    --warning-color: #f39c12;
    --danger-color: #e74c3c;
    --info-color: #3498db;
    --light-bg: #f8f9fa;
    --border-color: #dee2e6;
    --text-color: #2c3e50;
    --text-muted: #6c757d;
    --shadow: 0 2px 10px rgba(0,0,0,0.1);
    --shadow-hover: 0 4px 20px rgba(0,0,0,0.15);
    --border-radius: 12px;
    --transition: all 0.3s ease;
}

.product-index-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
}

/* Header Styles */
.page-header {
    background: white;
    border-radius: var(--border-radius);
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: var(--shadow);
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.page-title {
    display: flex;
    align-items: center;
    gap: 20px;
}

.icon-wrapper {
    background: linear-gradient(135deg, var(--primary-color), #3d6db0);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.page-title h1 {
    margin: 0;
    color: var(--text-color);
    font-size: 2.5rem;
    font-weight: 700;
}

.subtitle {
    margin: 0;
    color: var(--text-muted);
    font-size: 1.1rem;
}

.btn-primary-custom {
    background: linear-gradient(135deg, var(--success-color), #2ecc71);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: var(--border-radius);
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: var(--transition);
    box-shadow: var(--shadow);
}

.btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
    color: white;
    text-decoration: none;
}

/* Alert Styles */
.alert-success-custom {
    background: white;
    border: 1px solid var(--success-color);
    border-radius: var(--border-radius);
    padding: 20px;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: var(--shadow);
}

.alert-icon {
    color: var(--success-color);
    font-size: 24px;
}

.alert-content {
    flex: 1;
    color: var(--text-color);
}

/* Search Section */
.search-section {
    margin-bottom: 30px;
}

.search-container {
    background: white;
    border-radius: var(--border-radius);
    padding: 30px;
    box-shadow: var(--shadow);
}

.search-input-wrapper {
    position: relative;
    max-width: 500px;
}

.search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 18px;
}

#searchInput {
    width: 100%;
    padding: 15px 15px 15px 50px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 16px;
    transition: var(--transition);
    background: var(--light-bg);
}

#searchInput:focus {
    outline: none;
    border-color: var(--primary-color);
    background: white;
    box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
}

/* Table Section */
.table-section {
    background: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
}

.table-header {
    background: linear-gradient(135deg, var(--light-bg), white);
    padding: 25px 30px;
    border-bottom: 1px solid var(--border-color);
}

.table-header h3 {
    margin: 0;
    color: var(--text-color);
    font-size: 1.5rem;
    font-weight: 600;
}

.table-container {
    overflow-x: auto;
    max-height: 70vh;
}

.products-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1200px;
}

.products-table th {
    background: var(--light-bg);
    color: var(--text-color);
    font-weight: 600;
    padding: 20px 15px;
    text-align: left;
    border-bottom: 2px solid var(--border-color);
    position: sticky;
    top: 0;
    z-index: 10;
    white-space: nowrap;
}

.products-table td {
    padding: 20px 15px;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
}

.product-row {
    transition: var(--transition);
}

.product-row:hover {
    background: var(--light-bg);
}

/* Badges and Status */
.category-badge {
    background: linear-gradient(135deg, var(--info-color), #5dade2);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
    display: inline-block;
}

.stock-badge {
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.stock-badge.stock-high {
    background: rgba(39, 174, 96, 0.1);
    color: var(--success-color);
    border: 1px solid rgba(39, 174, 96, 0.2);
}

.stock-badge.stock-medium {
    background: rgba(243, 156, 18, 0.1);
    color: var(--warning-color);
    border: 1px solid rgba(243, 156, 18, 0.2);
}

.stock-badge.stock-low {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger-color);
    border: 1px solid rgba(231, 76, 60, 0.2);
}

.expiry-date {
    padding: 6px 10px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.expiry-date.expiring {
    background: rgba(243, 156, 18, 0.1);
    color: var(--warning-color);
    border: 1px solid rgba(243, 156, 18, 0.2);
}

.expiry-date.expired {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger-color);
    border: 1px solid rgba(231, 76, 60, 0.2);
}

.prescription-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
}

.prescription-badge.required {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger-color);
    border: 1px solid rgba(231, 76, 60, 0.2);
}

.prescription-badge.not-required {
    background: rgba(39, 174, 96, 0.1);
    color: var(--success-color);
    border: 1px solid rgba(39, 174, 96, 0.2);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 5px;
    align-items: center;
}

.btn-action {
    width: 35px;
    height: 35px;
    border: none;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    font-size: 14px;
}

.btn-action.view {
    background: var(--info-color);
    color: white;
}

.btn-action.edit {
    background: var(--warning-color);
    color: white;
}

.btn-action.delete {
    background: var(--danger-color);
    color: white;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    color: white;
    text-decoration: none;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 80px 40px;
    color: var(--text-muted);
}

.empty-state-cell {
    text-align: center;
    padding: 0;
}

.empty-icon {
    font-size: 80px;
    margin-bottom: 20px;
    opacity: 0.3;
}

.empty-state h3 {
    margin-bottom: 10px;
    color: var(--text-color);
}

.empty-state p {
    margin-bottom: 30px;
}

/* Pagination */
.pagination-section {
    padding: 25px 30px;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: center;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .table-container {
        overflow-x: auto;
    }
}

@media (max-width: 768px) {
    .product-index-container {
        padding: 15px;
    }
    
    .header-content {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }
    
    .page-title {
        flex-direction: column;
        gap: 15px;
    }
    
    .page-title h1 {
        font-size: 2rem;
    }
    
    .products-table th,
    .products-table td {
        padding: 15px 10px;
        font-size: 14px;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 3px;
    }
    
    .btn-action {
        width: 30px;
        height: 30px;
        font-size: 12px;
    }
}

@media (max-width: 576px) {
    .products-table {
        font-size: 12px;
        min-width: 800px;
    }
    
    .btn-primary-custom {
        padding: 12px 20px;
        font-size: 14px;
    }
    
    .page-title h1 {
        font-size: 1.8rem;
    }
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $("#searchInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").each(function () {
            var name = $(this).find("td:eq(1)").text().toLowerCase();
            if (name.indexOf(value) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

function confirmDelete(productName) {
    return confirm('Are you sure you want to delete "' + productName + '"? This action cannot be undone.');
}
</script>
@endsection

@push('styles')
    <link href="{{ asset('css/product-index.css') }}" rel="stylesheet">
@endpush