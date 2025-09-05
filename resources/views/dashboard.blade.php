@extends('layouts.app')

@section('content')
    <h1>Welcome to Shifa Chemist</h1>
     <!-- Main Content -->
   
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-chart-line text-primary me-3"></i>
                Pharmacy Dashboard
            </h1>
            <p class="page-subtitle">Welcome back! Here's what's happening at your pharmacy today.</p>
        </div>

        <!-- Quick Stats -->
        <div class="quick-stats">
            <div class="stat-card">
                <div class="stat-icon medicines">
                    <i class="fas fa-pills"></i>
                </div>
                <div class="stat-value">1,247</div>
                <div class="stat-label">Total Medicines</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon sales">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-value">₨85,320</div>
                <div class="stat-label">Today's Sales</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon customers">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value">156</div>
                <div class="stat-label">Active Customers</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon prescriptions">
                    <i class="fas fa-prescription"></i>
                </div>
                <div class="stat-value">23</div>
                <div class="stat-label">Pending Prescriptions</div>
            </div>
        </div>

        <!-- Dynamic Content Area -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-chart-area text-primary me-2"></i>
                            Sales Analytics
                        </h5>
                    </div>
                   


                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h6 class="mb-0">
                            <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                            Low Stock Alerts
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <i class="fas fa-pill text-danger"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">Paracetamol 500mg</div>
                                <small class="text-muted">Only 15 left</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <i class="fas fa-capsules text-warning"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">Amoxicillin 250mg</div>
                                <small class="text-muted">Only 8 left</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-tablets text-info"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">Aspirin 75mg</div>
                                <small class="text-muted">Only 12 left</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h6 class="mb-0">
                            <i class="fas fa-clock text-info me-2"></i>
                            Recent Activities
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="d-flex mb-3">
                                <div class="me-3 mt-1">
                                    <div class="bg-success rounded-circle" style="width: 8px; height: 8px;"></div>
                                </div>
                                <div>
                                    <div class="fw-semibold">New prescription received</div>
                                    <small class="text-muted">5 minutes ago</small>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="me-3 mt-1">
                                    <div class="bg-primary rounded-circle" style="width: 8px; height: 8px;"></div>
                                </div>
                                <div>
                                    <div class="fw-semibold">Sale completed - ₨2,150</div>
                                    <small class="text-muted">12 minutes ago</small>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-3 mt-1">
                                    <div class="bg-warning rounded-circle" style="width: 8px; height: 8px;"></div>
                                </div>
                                <div>
                                    <div class="fw-semibold">Stock alert: Insulin</div>
                                    <small class="text-muted">30 minutes ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    
@endsection