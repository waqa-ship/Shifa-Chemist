<div class="sidebar">
    <div class="logo-section">
        <div class="logo-icon">
            <i class="fas fa-pills"></i>
        </div>
        <div class="logo-text">Shifa Chemist</div>
        <div class="logo-subtitle">pathalogist</div>
        <div style="color: rgb(8, 159, 111); font-weight: bold;">Muzamil Shah</div>
    </div>

    <nav class="nav-section">
        <div class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('categories.index') }}"
                class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
                <i class="fas fa-pills"></i>
                <span>Medicine Categories</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                <i class="fas fa-prescription"></i>
                <span>Add Products</span>
                <span class="badge">5</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ url('/inventory') }}" class="nav-link {{ request()->is('inventory*') ? 'active' : '' }}">
                <i class="fas fa-boxes"></i>
                <span>Inventory</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ url('/sales') }}" class="nav-link {{ request()->is('sales*') ? 'active' : '' }}">
                <i class="fas fa-cash-register"></i>
                <span>Sales</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('pos.index') }}" class="nav-link {{ request()->is('pos*') ? 'active' : '' }}">
                <i class="fas fa-cash-register"></i>
                <span>POS</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('customers.index') }}"
                class="nav-link {{ request()->is('customers*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Customers</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ url('/suppliers') }}" class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}">
                <i class="fas fa-truck"></i>
                <span>Suppliers</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ url('/reports') }}" class="nav-link {{ request()->is('reports*') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ url('/settings') }}" class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </div>
    </nav>
</div>
