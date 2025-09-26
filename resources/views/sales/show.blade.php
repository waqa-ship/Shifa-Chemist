@extends('layouts.app')

<style>
    /* Modern Invoice Design */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --info-gradient: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        --warning-gradient: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
        --card-shadow: 0 15px 35px rgba(0,0,0,0.1);
        --card-shadow-hover: 0 20px 45px rgba(0,0,0,0.15);
        --border-radius: 20px;
        --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        min-height: 100vh;
    }

    .invoice-container {
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Invoice Card Enhancement */
    .invoice-card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        border: none;
        transition: var(--transition);
        position: relative;
    }

    .invoice-card:hover {
        box-shadow: var(--card-shadow-hover);
        transform: translateY(-3px);
    }

    .invoice-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--success-gradient);
        z-index: 1;
    }

    /* Enhanced Header */
    .invoice-header {
        background: var(--success-gradient);
        color: white;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    .invoice-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.1), transparent);
        border-radius: 50%;
    }

    .invoice-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(255,255,255,0.05), transparent);
        border-radius: 50%;
    }

    .invoice-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
        position: relative;
        z-index: 2;
    }

    .invoice-number {
        background: rgba(255,255,255,0.2);
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .back-btn {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.3);
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 12px;
        font-weight: 500;
        text-decoration: none;
        transition: var(--transition);
        backdrop-filter: blur(10px);
        position: relative;
        z-index: 2;
    }

    .back-btn:hover {
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.5);
        color: white;
        transform: translateY(-2px);
    }

    /* Enhanced Body */
    .invoice-body {
        padding: 2.5rem;
    }

    /* Customer Details Enhancement */
    .customer-section {
        background: linear-gradient(135deg, #f8f9ff, #ffffff);
        border: 2px solid #e3f2fd;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .customer-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--info-gradient);
    }

    .customer-title {
        color: #2d3436;
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .customer-title i {
        background: var(--info-gradient);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .customer-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: var(--transition);
    }

    .detail-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .detail-icon {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
    }

    .detail-icon.name {
        background: var(--success-gradient);
    }

    .detail-icon.id {
        background: var(--warning-gradient);
    }

    .detail-icon.date {
        background: var(--info-gradient);
    }

    .detail-content h6 {
        margin: 0;
        font-size: 0.85rem;
        color: #636e72;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .detail-content p {
        margin: 0.25rem 0 0 0;
        font-size: 1.1rem;
        font-weight: 600;
        color: #2d3436;
    }

    /* Enhanced Table */
    .table-container {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        border: 1px solid #f1f3f4;
    }

    .table-header {
        background: var(--primary-gradient);
        color: white;
        padding: 1.5rem 2rem;
        border: none;
    }

    .table-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .items-table {
        margin: 0;
        background: white;
    }

    .items-table thead th {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        color: #495057;
        border: none;
        padding: 1.25rem 1rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.8px;
        position: relative;
    }

    .items-table thead th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--primary-gradient);
        opacity: 0.4;
    }

    .items-table tbody td {
        padding: 1.25rem 1rem;
        border-color: #f8f9fa;
        vertical-align: middle;
        font-size: 0.9rem;
    }

    .items-table tbody tr {
        transition: var(--transition);
        border-left: 3px solid transparent;
    }

    .items-table tbody tr:hover {
        background: linear-gradient(135deg, #f8f9ff, #ffffff);
        transform: scale(1.01);
        border-left-color: #667eea;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }

    .item-name {
        font-weight: 600;
        color: #2d3436;
    }

    .item-number {
        background: var(--primary-gradient);
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .amount-cell {
        font-weight: 700;
        color: #00b894;
    }

    .quantity-badge {
        background: var(--info-gradient);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .tax-amount {
        color: #e17055;
        font-weight: 600;
    }

    .discount-amount {
        color: #fd79a8;
        font-weight: 600;
    }

    /* Grand Total Enhancement */
    .grand-total-section {
        background: var(--success-gradient);
        color: white;
        padding: 2rem;
        border-radius: 18px;
        margin: 2rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(17, 153, 142, 0.3);
    }

    .grand-total-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .grand-total-title {
        font-size: 1.2rem;
        font-weight: 500;
        opacity: 0.9;
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .grand-total-amount {
        font-size: 3rem;
        font-weight: 800;
        margin: 0.5rem 0 0 0;
        text-shadow: 0 4px 8px rgba(0,0,0,0.1);
        position: relative;
        z-index: 2;
    }

    /* Footer Enhancement */
    .invoice-footer {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        padding: 2rem;
        text-align: center;
        border-top: 1px solid #e9ecef;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .action-btn {
        padding: 0.8rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.95rem;
    }

    .btn-print {
        background: var(--info-gradient);
        color: white;
        box-shadow: 0 8px 25px rgba(116, 185, 255, 0.3);
    }

    .btn-print:hover {
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(116, 185, 255, 0.4);
    }

    .btn-download {
        background: var(--warning-gradient);
        color: white;
        box-shadow: 0 8px 25px rgba(253, 203, 110, 0.3);
    }

    .btn-download:hover {
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(253, 203, 110, 0.4);
    }

    .btn-email {
        background: var(--primary-gradient);
        color: white;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-email:hover {
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }

    /* Status Badge */
    .status-badge {
        position: absolute;
        top: 2rem;
        right: 2rem;
        background: rgba(255,255,255,0.9);
        color: #00b894;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.3);
        z-index: 10;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .invoice-container {
            padding: 1rem;
        }

        .invoice-header {
            padding: 1.5rem;
        }

        .invoice-title {
            font-size: 1.3rem;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .invoice-body {
            padding: 1.5rem;
        }

        .customer-details {
            grid-template-columns: 1fr;
        }

        .grand-total-amount {
            font-size: 2rem;
        }

        .action-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .action-btn {
            justify-content: center;
        }

        .items-table thead th,
        .items-table tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.8rem;
        }

        .detail-item {
            flex-direction: column;
            text-align: center;
            gap: 0.75rem;
        }
    }

    /* Print Styles */
    @media print {
        body {
            background: white;
        }

        .invoice-container {
            padding: 0;
            max-width: none;
        }

        .invoice-card {
            box-shadow: none;
            border: 1px solid #ddd;
        }

        .invoice-footer,
        .back-btn,
        .action-buttons {
            display: none;
        }

        .status-badge {
            position: static;
            display: inline-block;
            margin-bottom: 1rem;
        }
    }

    /* Loading Animation */
    .slide-in {
        animation: slideInUp 0.8s ease-out;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Hover Effects */
    .hover-effect {
        transition: var(--transition);
    }

    .hover-effect:hover {
        transform: translateY(-2px);
    }
</style>

@section('content')
    <div class="invoice-container">
        <div class="invoice-card slide-in">
            <!-- Status Badge -->
            <div class="status-badge">
                <i class="fas fa-check-circle me-1"></i>PAID
            </div>

            <!-- Enhanced Header -->
            <div class="invoice-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="invoice-title">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Invoice 
                        <span class="invoice-number">#{{ str_pad($sale->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <a href="{{ route('sales.index') }}" class="back-btn hover-effect">
                        <i class="fas fa-arrow-left me-2"></i>Back to Sales
                    </a>
                </div>
            </div>

            <div class="invoice-body">
                <!-- Enhanced Customer Section -->
                <div class="customer-section hover-effect">
                    <h5 class="customer-title">
                        <i class="fas fa-user-circle"></i>
                        Customer Information
                    </h5>
                    <div class="customer-details">
                        <div class="detail-item">
                            <div class="detail-icon name">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="detail-content">
                                <h6>Customer Name</h6>
                                <p>{{ $sale->customer_name ?? 'Walk-in Customer' }}</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon id">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <div class="detail-content">
                                <h6>Customer ID</h6>
                                <p>{{ $sale->customer_id ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon date">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="detail-content">
                                <h6>Purchase Date</h6>
                                <p>{{ $sale->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Items Table -->
                <div class="table-container hover-effect" id="sales-table">
                    <div class="table-header">
                        <h5>
                            <i class="fas fa-list-alt"></i>
                            Purchased Items
                        </h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table items-table text-center align-middle">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag me-1"></i>#</th>
                                    <th><i class="fas fa-capsules me-1"></i>Medicine Name</th>
                                    <th><i class="fas fa-tag me-1"></i>MRP</th>
                                    <th><i class="fas fa-sort-numeric-up me-1"></i>Qty</th>
                                    <th><i class="fas fa-money-bill me-1"></i>Rate</th>
                                    <th><i class="fas fa-calculator me-1"></i>Total</th>
                                    <th><i class="fas fa-percent me-1"></i>Disc</th>
                                    <th><i class="fas fa-receipt me-1"></i>Tax Amt</th>
                                    <th>CGST</th>
                                    <th>SGST</th>
                                    <th><i class="fas fa-coins me-1"></i>Final Amt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->items as $index => $item)
                                    <tr>
                                        <td>
                                            <div class="item-number">{{ $index + 1 }}</div>
                                        </td>
                                        <td class="text-start">
                                            <div class="item-name">{{ $item->name }}</div>
                                        </td>
                                        <td class="amount-cell">Rs. {{ number_format($item->mrp, 2) }}</td>
                                        <td>
                                            <span class="quantity-badge">{{ $item->qty }}</span>
                                        </td>
                                        <td class="amount-cell">Rs. {{ number_format($item->rate, 2) }}</td>
                                        <td class="amount-cell">Rs. {{ number_format($item->total, 2) }}</td>
                                        <td class="discount-amount">Rs. {{ number_format($item->disc ?? 0, 2) }}</td>
                                        <td class="tax-amount">Rs. {{ number_format($item->tax_amt ?? 0, 2) }}</td>
                                        <td class="tax-amount">Rs. {{ number_format($item->cgst ?? 0, 2) }}</td>
                                        <td class="tax-amount">Rs. {{ number_format($item->sgst ?? 0, 2) }}</td>
                                        <td class="amount-cell fw-bold">Rs. {{ number_format($item->total_amt, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Enhanced Grand Total -->
                <div class="grand-total-section hover-effect">
                    <h4 class="grand-total-title">Grand Total Amount</h4>
                    <h2 class="grand-total-amount">Rs. {{ number_format($sale->grand_total, 2) }}</h2>
                    <p class="mb-0 opacity-75">
                        <i class="fas fa-info-circle me-1"></i>
                        All taxes and charges included
                    </p>
                </div>
            </div>

            <!-- Enhanced Footer -->
            <div class="invoice-footer">
                <div class="action-buttons">
                    <button onclick="printInvoice()" class="action-btn btn-print">
                        <i class="fas fa-print"></i>Print Invoice
                    </button>
                    <button onclick="downloadPDF()" class="action-btn btn-download">
                        <i class="fas fa-download"></i>Download PDF
                    </button>
                    <button onclick="emailInvoice()" class="action-btn btn-email">
                        <i class="fas fa-envelope"></i>Email Invoice
                    </button>
                </div>
                
                <div class="mt-3 text-muted">
                    <small>
                        <i class="fas fa-shield-alt me-1"></i>
                        This is a computer generated invoice and does not require signature
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
<script>
    function printInvoice() {
        $("#sales-table").printThis({
            importCSS: true,
            importStyle: true,
            loadCSS: "",
            header: `
                <div style="text-align: center; margin-bottom: 2rem; padding: 1rem; background: linear-gradient(135deg, #11998e, #38ef7d); color: white; border-radius: 10px;">
                    <h2 style="margin: 0; font-size: 1.5rem;">📋 Sales Invoice</h2>
                    <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Invoice #{{ str_pad($sale->id, 6, '0', STR_PAD_LEFT) }} - {{ $sale->created_at->format('d M Y') }}</p>
                </div>
                <div style="margin-bottom: 2rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; border-left: 4px solid #11998e;">
                    <h4 style="margin: 0 0 1rem 0; color: #2d3436;">Customer Details</h4>
                    <p style="margin: 0; line-height: 1.6;">
                        <strong>Name:</strong> {{ $sale->customer_name ?? 'Walk-in Customer' }}<br>
                        <strong>Customer ID:</strong> {{ $sale->customer_id ?? 'N/A' }}<br>
                        <strong>Date:</strong> {{ $sale->created_at->format('d M Y, h:i A') }}
                    </p>
                </div>
            `,
            footer: `
                <div style="text-align: center; margin-top: 2rem; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                    <h3 style="color: #00b894; margin: 0;">Grand Total: Rs. {{ number_format($sale->grand_total, 2) }}</h3>
                    <p style="margin: 1rem 0 0 0; color: #636e72; font-size: 0.9rem;">
                        🛡️ This is a computer generated invoice and does not require signature
                    </p>
                </div>
            `,
            removeInline: false,
            printDelay: 333,
            header: null,
            formValues: true
        });
    }

    function downloadPDF() {
        // Simulate PDF download
        const link = document.createElement('a');
        link.href = '#'; // Replace with actual PDF generation endpoint
        link.download = `invoice_{{ str_pad($sale->id, 6, '0', STR_PAD_LEFT) }}.pdf`;
        
        // Show loading feedback
        const btn = event.target;
        const originalContent = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.disabled = false;
            
            // Show success message
            const toast = document.createElement('div');
            toast.style.cssText = `
                position: fixed; top: 20px; right: 20px; z-index: 9999;
                background: linear-gradient(135deg, #11998e, #38ef7d); color: white;
                padding: 1rem 1.5rem; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.3);
                font-weight: 600; animation: slideInRight 0.3s ease-out;
            `;
            toast.innerHTML = '<i class="fas fa-check me-2"></i>PDF Ready for Download!';
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.animation = 'slideOutRight 0.3s ease-in forwards';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }, 2000);
    }

    function emailInvoice() {
        const btn = event.target;
        const originalContent = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending Email...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.disabled = false;
            
            // Show success message
            const toast = document.createElement('div');
            toast.style.cssText = `
                position: fixed; top: 20px; right: 20px; z-index: 9999;
                background: linear-gradient(135deg, #667eea, #764ba2); color: white;
                padding: 1rem 1.5rem; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.3);
                font-weight: 600; animation: slideInRight 0.3s ease-out;
            `;
            toast.innerHTML = '<i class="fas fa-envelope me-2"></i>Invoice Sent Successfully!';
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.animation = 'slideOutRight 0.3s ease-in forwards';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }, 1500);
    }

    // Add CSS animations for toasts
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(100%); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideOutRight {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100%); }
        }
    `;
    document.head.appendChild(style);

    // Add smooth scroll and hover effects on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Add stagger animation to table rows
        const tableRows = document.querySelectorAll('.items-table tbody tr');
        tableRows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';
            row.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, (index + 1) * 100);
        });

        // Add click ripple effect to buttons
        document.querySelectorAll('.action-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute; border-radius: 50%; background: rgba(255,255,255,0.6);
                    width: ${size}px; height: ${size}px; left: ${x}px; top: ${y}px;
                    animation: ripple 0.6s ease-out; pointer-events: none;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple animation
        const rippleStyle = document.createElement('style');
        rippleStyle.textContent = `
            @keyframes ripple {
                0% { opacity: 1; transform: scale(0); }
                100% { opacity: 0; transform: scale(2); }
            }
        `;
        document.head.appendChild(rippleStyle);
    });

    // Smooth scrolling for any anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + P for print
        if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
            e.preventDefault();
            printInvoice();
        }
        
        // Ctrl/Cmd + D for download
        if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
            e.preventDefault();
            downloadPDF();
        }
        
        // Ctrl/Cmd + E for email
        if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
            e.preventDefault();
            emailInvoice();
        }
        
        // ESC to go back
        if (e.key === 'Escape') {
            window.location.href = "{{ route('sales.index') }}";
        }
    });

    // Show keyboard shortcuts tooltip
    function showShortcuts() {
        const tooltip = document.createElement('div');
        tooltip.style.cssText = `
            position: fixed; bottom: 20px; left: 20px; z-index: 9999;
            background: rgba(0,0,0,0.9); color: white; padding: 1rem 1.5rem;
            border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            font-size: 0.85rem; max-width: 250px;
            animation: fadeInUp 0.3s ease-out;
        `;
        tooltip.innerHTML = `
            <div style="font-weight: 600; margin-bottom: 0.5rem;">⌨️ Keyboard Shortcuts</div>
            <div>Ctrl + P: Print Invoice</div>
            <div>Ctrl + D: Download PDF</div>
            <div>Ctrl + E: Email Invoice</div>
            <div>ESC: Go Back</div>
        `;
        
        document.body.appendChild(tooltip);
        
        setTimeout(() => {
            tooltip.style.animation = 'fadeOutDown 0.3s ease-in forwards';
            setTimeout(() => tooltip.remove(), 300);
        }, 5000);
    }

    // Show shortcuts on page load
    setTimeout(showShortcuts, 2000);

    // Add fade animations
    const fadeStyle = document.createElement('style');
    fadeStyle.textContent = `
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeOutDown {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(20px); }
        }
    `;
    document.head.appendChild(fadeStyle);
</script>
@endpush

@push('styles')
    <link href="{{ asset('css/pharmacy-pos.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
@endpush
@push('styles')
<style>
@media print {
    /* force flex content to print */
    .d-flex, .customer-info { display: block !important; }
    .customer-avatar {
        display: inline-block !important;
        background: #0d6efd !important; /* force blue circle */
        color: #fff !important;
        width: 30px; height: 30px;
        text-align: center; line-height: 30px;
        border-radius: 50%;
        font-weight: bold;
    }
    /* make sure text always shows */
    .customer-details { display: inline-block !important; vertical-align: middle; margin-left: 4px; }
}
</style>
@endpush