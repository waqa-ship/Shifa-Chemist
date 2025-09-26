@extends('layouts.app')

<style>
    /* Modern Sales Page Styling */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --info-gradient: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        --warning-gradient: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --card-shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.15);
        --border-radius: 20px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .sales-container {
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Page Header */
    .page-header {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3436;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .page-title i {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 2.5rem;
    }

    .page-subtitle {
        color: #636e72;
        font-size: 1.1rem;
        margin: 0.5rem 0 0 0;
    }

    /* Stats Cards */
    .stats-row {
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        border: none;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        transition: var(--transition);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-shadow-hover);
    }

    .stat-card.revenue::before {
        background: var(--success-gradient);
    }

    .stat-card.orders::before {
        background: var(--info-gradient);
    }

    .stat-card.today::before {
        background: var(--warning-gradient);
    }

    .stat-card.average::before {
        background: var(--primary-gradient);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }

    .stat-card.revenue .stat-icon {
        background: var(--success-gradient);
    }

    .stat-card.orders .stat-icon {
        background: var(--info-gradient);
    }

    .stat-card.today .stat-icon {
        background: var(--warning-gradient);
    }

    .stat-card.average .stat-icon {
        background: var(--primary-gradient);
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3436;
        margin: 0;
    }

    .stat-label {
        color: #636e72;
        font-size: 0.9rem;
        margin: 0;
        font-weight: 500;
    }

    .stat-change {
        font-size: 0.8rem;
        margin-top: 0.5rem;
        font-weight: 500;
    }

    .stat-change.positive {
        color: #00b894;
    }

    .stat-change.negative {
        color: #e17055;
    }

    /* Search and Filter Section */
    .filter-section {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--card-shadow);
    }

    .search-container {
        position: relative;
        margin-bottom: 1rem;
    }

    .search-input {
        padding: 0.75rem 1rem 0.75rem 3rem;
        border-radius: 25px;
        border: 2px solid #e9ecef;
        background: white;
        transition: var(--transition);
        font-size: 0.9rem;
        width: 100%;
    }

    .search-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        outline: none;
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        z-index: 2;
    }

    .filter-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.5rem 1rem;
        border: 2px solid #e9ecef;
        background: white;
        color: #6c757d;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: var(--transition);
        cursor: pointer;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--primary-gradient);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    /* Enhanced Sales Table */
    .sales-table-container {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        transition: var(--transition);
    }

    .sales-table-container:hover {
        box-shadow: var(--card-shadow-hover);
    }

    .table-header {
        background: var(--primary-gradient);
        color: white;
        padding: 1.5rem 2rem;
        display: flex;
        justify-content: between;
        align-items: center;
        border: none;
    }

    .table-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .table-actions {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.85rem;
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .action-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }

    #salesTable {
        margin: 0;
        background: white;
    }

    #salesTable thead th {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        color: #495057;
        border: none;
        padding: 1.25rem 1rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        position: relative;
    }

    #salesTable thead th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--primary-gradient);
        opacity: 0.3;
    }

    #salesTable tbody td {
        padding: 1.25rem 1rem;
        border-color: #f1f3f4;
        vertical-align: middle;
        transition: var(--transition);
    }

    #salesTable tbody tr {
        transition: var(--transition);
        border-left: 3px solid transparent;
    }

    #salesTable tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        border-left-color: #667eea;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Enhanced Buttons */
    .btn-view {
        background: var(--info-gradient);
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: var(--transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-view:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(116, 185, 255, 0.4);
    }

    /* Invoice Badge */
    .invoice-badge {
        background: var(--primary-gradient);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* Customer Info */
    .customer-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .customer-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--success-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .customer-details h6 {
        margin: 0;
        font-size: 0.9rem;
        font-weight: 600;
        color: #2d3436;
    }

    .customer-details small {
        color: #636e72;
        font-size: 0.75rem;
    }

    /* Amount Styling */
    .amount {
        font-weight: 700;
        font-size: 1.1rem;
        color: #00b894;
    }

    /* Date Styling */
    .date-info {
        color: #636e72;
        font-size: 0.85rem;
    }

    .date-badge {
        background: #f1f3f4;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: inline-block;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #636e72;
    }

    .empty-state i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 1rem;
    }

    .empty-state h5 {
        margin-bottom: 0.5rem;
        color: #2d3436;
    }

    /* Pagination Enhancement */
    .pagination {
        justify-content: center;
        margin-top: 2rem;
    }

    .page-link {
        border-radius: 8px;
        margin: 0 0.125rem;
        border: 2px solid #e9ecef;
        color: #667eea;
    }

    .page-link:hover,
    .page-item.active .page-link {
        background: var(--primary-gradient);
        border-color: transparent;
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .sales-container {
            padding: 1rem;
        }

        .page-header {
            padding: 1.5rem;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .stat-card {
            margin-bottom: 1rem;
        }

        .filter-section {
            padding: 1rem;
        }

        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
        }

        #salesTable thead th,
        #salesTable tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.8rem;
        }

        .customer-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .filter-buttons {
            justify-content: center;
        }
    }

    /* Loading Animation */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    /* Slide in animation */
    .slide-in {
        animation: slideIn 0.6s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@section('content')
    <div class="sales-container">
        <!-- Page Header -->
        <div class="page-header slide-in">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="page-title">
                        <i class="fas fa-chart-line"></i>
                        Sales Management
                    </h1>
                    <p class="page-subtitle">Track and manage all your sales transactions</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </button>
                    <a href="{{ route('pos.index') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> New Sale
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row stats-row">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card revenue slide-in">
                    <div class="stat-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h3 class="stat-value">Rs. {{ number_format($sales->sum('grand_total'), 2) }}</h3>
                    <p class="stat-label">Total Revenue</p>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+12.5% from last month
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card orders slide-in" style="animation-delay: 0.1s;">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="stat-value">{{ $sales->count() }}</h3>
                    <p class="stat-label">Total Orders</p>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+8.3% from last month
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card today slide-in" style="animation-delay: 0.2s;">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <h3 class="stat-value">Rs.
                        {{ number_format($sales->filter(function ($sale) {return $sale->created_at->isToday();})->sum('grand_total'),2) }}
                    </h3>
                    <p class="stat-label">Today's Sales</p>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+15.2% from yesterday
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card average slide-in" style="animation-delay: 0.3s;">
                    <div class="stat-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="stat-value">Rs.
                        {{ $sales->count() > 0 ? number_format($sales->avg('grand_total'), 2) : '0.00' }}</h3>
                    <p class="stat-label">Average Order</p>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+5.7% from last month
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="filter-section slide-in" style="animation-delay: 0.4s;">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search by invoice, customer, or amount..."
                            id="searchInput">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-filter="all">All Sales</button>
                        <button class="filter-btn" data-filter="today">Today</button>
                        <button class="filter-btn" data-filter="week">This Week</button>
                        <button class="filter-btn" data-filter="month">This Month</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Sales Table -->
        <div class="sales-table-container slide-in" style="animation-delay: 0.5s;">
            <div class="table-header">
                <h5 class="table-title">
                    <i class="fas fa-list-alt"></i>
                    Sales Transactions
                </h5>
                <div class="table-actions">
                    <button class="action-btn">
                        <i class="fas fa-filter me-1"></i>Filter
                    </button>
                    <button class="action-btn">
                        <i class="fas fa-sort me-1"></i>Sort
                    </button>
                </div>
            </div>

            <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                @if ($sales->count() > 0)
                    <table id="salesTable" class="table">
                        <thead>
                            <tr>
                                <th>
                                    <i class="fas fa-hashtag me-2"></i>Invoice
                                </th>
                                <th>
                                    <i class="fas fa-user me-2"></i>Customer
                                </th>
                                <th>
                                    <i class="fas fa-money-bill-wave me-2"></i>Grand Total
                                </th>
                                <th>
                                    <i class="fas fa-calendar me-2"></i>Date & Time
                                </th>
                                <th>
                                    <i class="fas fa-cog me-2"></i>Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr class="sale-row" data-date="{{ $sale->created_at->format('Y-m-d') }}">
                                    <td>
                                        <span class="invoice-badge">#{{ str_pad($sale->id, 6, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td>
                                        <div class="customer-info">
                                            <div class="customer-avatar">
                                                {{ strtoupper(substr($sale->customer_name, 0, 1)) }}
                                            </div>
                                            <div class="customer-details">
                                                <h6>{{ $sale->customer_name }}</h6>
                                                <small>Customer ID: #{{ $sale->customer_id ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="amount">Rs. {{ number_format($sale->grand_total, 2) }}</span>
                                    </td>
                                    <td>
                                        <div class="date-info">
                                            <div>{{ $sale->created_at->format('M d, Y') }}</div>
                                            <span class="date-badge">{{ $sale->created_at->format('H:i A') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('sales.show', $sale->id) }}" class="btn-view">
                                            <i class="fas fa-eye"></i>
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-shopping-cart"></i>
                        <h5>No Sales Found</h5>
                        <p>Start making sales to see them appear here.</p>
                        <button class="btn btn-primary mt-3">
                            <i class="fas fa-plus me-2"></i>Create First Sale
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('.sale-row');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();

                    tableRows.forEach(row => {
                        const invoice = row.cells[0].textContent.toLowerCase();
                        const customer = row.cells[1].textContent.toLowerCase();
                        const amount = row.cells[2].textContent.toLowerCase();

                        if (invoice.includes(searchTerm) ||
                            customer.includes(searchTerm) ||
                            amount.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }

            // Filter functionality
            const filterButtons = document.querySelectorAll('.filter-btn');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');

                    const filter = this.dataset.filter;
                    const today = new Date().toISOString().split('T')[0];

                    tableRows.forEach(row => {
                        const rowDate = row.dataset.date;
                        const rowDateObj = new Date(rowDate);

                        let show = true;

                        switch (filter) {
                            case 'today':
                                show = rowDate === today;
                                break;
                            case 'week':
                                const weekAgo = new Date();
                                weekAgo.setDate(weekAgo.getDate() - 7);
                                show = rowDateObj >= weekAgo;
                                break;
                            case 'month':
                                const monthAgo = new Date();
                                monthAgo.setMonth(monthAgo.getMonth() - 1);
                                show = rowDateObj >= monthAgo;
                                break;
                            default:
                                show = true;
                        }

                        row.style.display = show ? '' : 'none';
                    });
                });
            });

            // Add hover effects and animations
            tableRows.forEach((row, index) => {
                row.style.animationDelay = `${(index * 0.05)}s`;
                row.classList.add('slide-in');
            });
        });
    </script>
@endsection

@push('styles')
    <link href="{{ asset('css/pharmacy-pos.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush
