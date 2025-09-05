@extends('layouts.app')

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
            <!-- Left side: Search + Medicine List -->
            <div class="col-xl-8 col-lg-7">
                <div class="card h-100">
                    <div class="card-header text-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">
                                <i class="fas fa-pills me-2"></i>
                                Medicine Inventory
                            </h5>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light btn-sm">
                                    <i class="fas fa-filter me-1"></i>Filter
                                </button>
                                <button class="btn btn-light btn-sm">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Enhanced Search -->
                        <div class="search-container">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control search-input" placeholder="Search medicines by name, category, or manufacturer..." id="searchInput">
                        </div>

                        <!-- Category Filters -->
                        <div class="mb-4">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-outline-primary btn-sm active" data-category="all">All</button>
                                <button class="btn btn-outline-primary btn-sm" data-category="tablet">Tablets</button>
                                <button class="btn btn-outline-primary btn-sm" data-category="syrup">Syrups</button>
                                <button class="btn btn-outline-primary btn-sm" data-category="injection">Injections</button>
                                <button class="btn btn-outline-primary btn-sm" data-category="drops">Drops</button>
                                <button class="btn btn-outline-primary btn-sm" data-category="ointment">Ointments</button>
                            </div>
                        </div>

                        <!-- Medicines Grid/List -->
                        <div class="medicines-container" style="max-height: 500px; overflow-y: auto;">
                            <!-- Medicine Card 1 -->
                            <div class="medicine-card" data-category="tablet">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="medicine-image">
                                            <i class="fas fa-pills"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-9">
                                        <h6 class="mb-1 fw-bold">Paracetamol 500mg</h6>
                                        <p class="mb-1 text-muted small">Tablet • GSK Pharmaceuticals</p>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-stock bg-success">In Stock (250)</span>
                                            <span class="badge bg-info">Prescription</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-center">
                                        <div class="fw-bold text-primary fs-5">Rs. 120</div>
                                        <small class="text-muted">per strip</small>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-end">
                                        <button class="btn btn-add-cart btn-success w-100" onclick="addToCart(1)">
                                            <i class="fas fa-cart-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Medicine Card 2 -->
                            <div class="medicine-card" data-category="syrup">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="medicine-image">
                                            <i class="fas fa-prescription-bottle-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-9">
                                        <h6 class="mb-1 fw-bold">Amoxicillin Syrup</h6>
                                        <p class="mb-1 text-muted small">Syrup • Pfizer Inc.</p>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-stock bg-warning text-dark">Low Stock (15)</span>
                                            <span class="badge bg-danger">Prescription</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-center">
                                        <div class="fw-bold text-primary fs-5">Rs. 285</div>
                                        <small class="text-muted">per bottle</small>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-end">
                                        <button class="btn btn-add-cart btn-success w-100" onclick="addToCart(2)">
                                            <i class="fas fa-cart-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Medicine Card 3 -->
                            <div class="medicine-card" data-category="drops">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="medicine-image">
                                            <i class="fas fa-eye-dropper"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-9">
                                        <h6 class="mb-1 fw-bold">Eye Drops Relief</h6>
                                        <p class="mb-1 text-muted small">Eye Drops • Johnson & Johnson</p>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-stock bg-success">In Stock (80)</span>
                                            <span class="badge bg-secondary">OTC</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-center">
                                        <div class="fw-bold text-primary fs-5">Rs. 450</div>
                                        <small class="text-muted">per bottle</small>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-end">
                                        <button class="btn btn-add-cart btn-success w-100" onclick="addToCart(3)">
                                            <i class="fas fa-cart-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Medicine Card 4 -->
                            <div class="medicine-card" data-category="ointment">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="medicine-image">
                                            <i class="fas fa-tube"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-9">
                                        <h6 class="mb-1 fw-bold">Antibiotic Cream</h6>
                                        <p class="mb-1 text-muted small">Ointment • Novartis</p>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-stock bg-danger">Out of Stock</span>
                                            <span class="badge bg-info">Prescription</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-center">
                                        <div class="fw-bold text-muted fs-5">Rs. 220</div>
                                        <small class="text-muted">per tube</small>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-end">
                                        <button class="btn btn-secondary w-100" disabled>
                                            <i class="fas fa-ban me-1"></i>Unavailable
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Medicine Card 5 -->
                            <div class="medicine-card" data-category="injection">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="medicine-image">
                                            <i class="fas fa-syringe"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-9">
                                        <h6 class="mb-1 fw-bold">Insulin Injection</h6>
                                        <p class="mb-1 text-muted small">Injection • Sanofi</p>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-stock bg-success">In Stock (45)</span>
                                            <span class="badge bg-danger">Prescription</span>
                                            <span class="badge bg-warning text-dark">Cold Chain</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-center">
                                        <div class="fw-bold text-primary fs-5">Rs. 1,250</div>
                                        <small class="text-muted">per vial</small>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-end">
                                        <button class="btn btn-add-cart btn-success w-100" onclick="addToCart(5)">
                                            <i class="fas fa-cart-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side: Cart + Checkout -->
            <div class="col-xl-4 col-lg-5">
                <div class="card h-100">
                    <div class="card-header text-white" style="background: linear-gradient(135deg, #28a745, #20c997) !important;">
                        <h5 class="mb-0">
                            <i class="fas fa-shopping-cart me-2"></i>
                            Shopping Cart
                            <span class="badge bg-light text-dark ms-2" id="cartCount">0</span>
                        </h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <!-- Cart Items -->
                        <div class="cart-items" id="cartItems" style="flex: 1; max-height: 400px; overflow-y: auto;">
                            <div class="empty-cart">
                                <div class="stat-icon mx-auto mb-3" style="background: linear-gradient(135deg, #6c757d, #495057);">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <h6>Your cart is empty</h6>
                                <p class="text-muted small">Add medicines from the inventory to get started</p>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="cart-summary mt-auto">
                            <div class="cart-total" id="cartTotal" style="display: none;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-5 fw-bold">Total Amount:</span>
                                    <span class="fs-4 fw-bold" id="totalAmount">Rs. 0</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span>Items: <span id="totalItems">0</span></span>
                                    <span>Discount: Rs. <span id="discount">0</span></span>
                                </div>
                            </div>

                            <!-- Checkout Buttons -->
                            <div class="checkout-buttons d-grid gap-2" id="checkoutButtons" style="display: none !important;">
                                <button class="btn btn-success btn-lg">
                                    <i class="fas fa-cash-register me-2"></i>Process Payment
                                </button>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <button class="btn btn-info w-100">
                                            <i class="fas fa-print me-1"></i>Print
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-danger w-100" onclick="clearCart()">
                                            <i class="fas fa-trash-alt me-1"></i>Clear
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
   
@endsection

@push('styles')
<link href="{{ asset('css/pharmacy-pos.css') }}" rel="stylesheet">
@endpush
 <script>
        // Cart functionality
        let cart = [];
        let medicines = [
            { id: 1, name: 'Paracetamol 500mg', price: 120, stock: 250, category: 'tablet' },
            { id: 2, name: 'Amoxicillin Syrup', price: 285, stock: 15, category: 'syrup' },
            { id: 3, name: 'Eye Drops Relief', price: 450, stock: 80, category: 'drops' },
            { id: 4, name: 'Antibiotic Cream', price: 220, stock: 0, category: 'ointment' },
            { id: 5, name: 'Insulin Injection', price: 1250, stock: 45, category: 'injection' }
        ];

        function addToCart(medicineId) {
            const medicine = medicines.find(m => m.id === medicineId);
            if (!medicine || medicine.stock === 0) return;

            const existingItem = cart.find(item => item.id === medicineId);
            
            if (existingItem) {
                if (existingItem.quantity < medicine.stock) {
                    existingItem.quantity++;
                }
            } else {
                cart.push({
                    id: medicineId,
                    name: medicine.name,
                    price: medicine.price,
                    quantity: 1,
                    stock: medicine.stock
                });
            }
            
            updateCartDisplay();
        }

        function removeFromCart(medicineId) {
            cart = cart.filter(item => item.id !== medicineId);
            updateCartDisplay();
        }

        function updateQuantity(medicineId, change) {
            const item = cart.find(item => item.id === medicineId);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeFromCart(medicineId);
                } else if (item.quantity > item.stock) {
                    item.quantity = item.stock;
                }
            }
            updateCartDisplay();
        }

        function updateCartDisplay() {
            const cartItems = document.getElementById('cartItems');
            const cartCount = document.getElementById('cartCount');
            const cartTotal = document.getElementById('cartTotal');
            const checkoutButtons = document.getElementById('checkoutButtons');
            const totalAmount = document.getElementById('totalAmount');
            const totalItems = document.getElementById('totalItems');

            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="empty-cart">
                        <div class="stat-icon mx-auto mb-3" style="background: linear-gradient(135deg, #6c757d, #495057);">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h6>Your cart is empty</h6>
                        <p class="text-muted small">Add medicines from the inventory to get started</p>
                    </div>
                `;
                cartTotal.style.display = 'none';
                checkoutButtons.style.display = 'none';
                cartCount.textContent = '0';
            } else {
                let total = 0;
                let itemCount = 0;
                
                cartItems.innerHTML = cart.map(item => {
                    total += item.price * item.quantity;
                    itemCount += item.quantity;
                    
                    return `
                        <div class="cart-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">${item.name}</h6>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${item.id}, -1)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="fw-bold">${item.quantity}</span>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${item.id}, 1)" ${item.quantity >= item.stock ? 'disabled' : ''}>
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <span class="text-muted ms-2">× Rs. ${item.price}</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-success">Rs. ${item.price * item.quantity}</div>
                                    <button class="btn btn-sm btn-outline-danger mt-1" onclick="removeFromCart(${item.id})">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                }).join('');
                
                cartTotal.style.display = 'block';
                checkoutButtons.style.display = 'block';
                cartCount.textContent = itemCount;
                totalAmount.textContent = `Rs. ${total.toLocaleString()}`;
                totalItems.textContent = itemCount;
            }
        }

        function clearCart() {
            cart = [];
            updateCartDisplay();
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const medicineCards = document.querySelectorAll('.medicine-card');
            
            medicineCards.forEach(card => {
                const medicineName = card.querySelector('h6').textContent.toLowerCase();
                const medicineCategory = card.getAttribute('data-category');
                
                if (medicineName.includes(searchTerm) || medicineCategory.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Category filter functionality
        document.querySelectorAll('[data-category]').forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                
                // Update active button
                document.querySelectorAll('[data-category]').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Filter medicine cards
                const medicineCards = document.querySelectorAll('.medicine-card');
                medicineCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    
                    if (category === 'all' || cardCategory === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Add some animation effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats cards on load
            const statsCards = document.querySelectorAll('.stats-card');
            statsCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s ease';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });

        // Add pulse animation to low stock items
        setInterval(() => {
            document.querySelectorAll('.badge.bg-warning').forEach(badge => {
                badge.classList.add('animate-pulse');
                setTimeout(() => {
                    badge.classList.remove('animate-pulse');
                }, 1000);
            });
        }, 3000);
    </script>