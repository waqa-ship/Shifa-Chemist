@extends('layouts.app')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --dark-bg: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        --hover-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-container {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        margin: 20px;
        padding: 30px;
        box-shadow: var(--card-shadow);
    }

    .page-header {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .page-header h2 {
        color: white;
        font-weight: 700;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        margin: 0;
    }

    .page-header .subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        margin: 0;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s;
    }

    .stat-card:hover::before {
        left: 100%;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--hover-shadow);
    }

    .stat-card i {
        font-size: 2.5rem;
        margin-bottom: 15px;
        opacity: 0.8;
    }

    .stat-card h4 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 5px;
        color: #2c3e50;
    }

    .stat-card small {
        color: #6c757d;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .chart-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: var(--card-shadow);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .chart-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow);
    }

    .chart-card .card-header {
        background: var(--primary-gradient);
        color: white;
        border: none;
        padding: 20px 25px;
        font-weight: 600;
    }

    .chart-card .card-header h5,
    .chart-card .card-header h6 {
        margin: 0;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .chart-card .card-body {
        padding: 25px;
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .fade-in {
        animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-pills {
        background: var(--primary-gradient);
    }

    .stat-sales {
        background: var(--success-gradient);
    }

    .stat-users {
        background: var(--info-gradient);
    }

    .stat-prescriptions {
        background: var(--warning-gradient);
    }

    .gradient-text {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .metric-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50px;
        padding: 5px 12px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #28a745;
    }

    @media (max-width: 768px) {
        .dashboard-container {
            margin: 10px;
            padding: 20px;
        }

        .page-header {
            padding: 20px;
            text-align: center;
        }

        .stat-card {
            margin-bottom: 20px;
        }
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="dashboard-container">
            <!-- Enhanced Page Header -->
            <div class="page-header fade-in">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h2 class="floating">
                            <i class="fas fa-clinic-medical me-3 text-danger"></i>
                            Shifa Chemist Dashboard
                        </h2>
                        <p class="subtitle mt-2">Real-time pharmacy performance analytics</p>
                    </div>
                    <div class="text-end">
                        <div class="badge bg-success px-3 py-2">
                            <i class="fas fa-circle text-success me-2" style="font-size: 0.6rem;"></i>
                            Live Data
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Quick Stats -->
            <div class="row g-4 mb-5 fade-in">
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card stat-pills pulse">
                        <div class="metric-badge">+12%</div>
                        <i class="fas fa-pills text-primary"></i>
                        <h4 class="gradient-text">1,247</h4>
                        <small>Total Medicines</small>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card stat-sales pulse" style="animation-delay: 0.2s;">
                        <div class="metric-badge">+₨5,200</div>
                        <i class="fas fa-dollar-sign text-success"></i>
                        <h4>₨85,320</h4>
                        <small>Today's Sales</small>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card stat-users pulse" style="animation-delay: 0.4s;">
                        <div class="metric-badge">+8</div>
                        <i class="fas fa-users text-info"></i>
                        <h4>156</h4>
                        <small>Active Customers</small>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card stat-prescriptions pulse" style="animation-delay: 0.6s;">
                        <div class="metric-badge" style="color: #dc3545;">High</div>
                        <i class="fas fa-prescription text-warning"></i>
                        <h4>23</h4>
                        <small>Pending Prescriptions</small>
                    </div>
                </div>
            </div>

            <!-- Enhanced Charts Section -->
            <div class="row mb-5 fade-in">
                <!-- Sales Line Chart -->
                <div class="col-lg-8 mb-4">
                    <div class="chart-card">
                        <div class="card-header">
                            <h5>
                                <i class="fas fa-chart-line me-2"></i>
                                Sales Analytics
                                <span class="badge bg-light text-dark ms-2">Weekly</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" height="120"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Customer Doughnut Chart -->
                <div class="col-lg-4 mb-4">
                    <div class="chart-card">
                        <div class="card-header" style="background: var(--success-gradient);">
                            <h6>
                                <i class="fas fa-users me-2"></i>
                                Customer Insights
                            </h6>
                        </div>
                        <div class="card-body">
                            <canvas id="customerChart" height="180"></canvas>
                            <div class="text-center mt-3">
                                <div class="row">
                                    <div class="col-6">
                                        <strong class="text-success">65%</strong>
                                        <br><small>New</small>
                                    </div>
                                    <div class="col-6">
                                        <strong class="text-warning">35%</strong>
                                        <br><small>Returning</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row fade-in">
                <!-- Top Medicines Bar Chart -->
                <div class="col-lg-6 mb-4">
                    <div class="chart-card">
                        <div class="card-header" style="background: var(--warning-gradient);">
                            <h6>
                                <i class="fas fa-pills me-2"></i>
                                Top Selling Medicines
                            </h6>
                        </div>
                        <div class="card-body">
                            <canvas id="medicineChart" height="180"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Monthly Sales Area Chart -->
                <div class="col-lg-6 mb-4">
                    <div class="chart-card">
                        <div class="card-header" style="background: var(--info-gradient);">
                            <h6>
                                <i class="fas fa-calendar-alt me-2"></i>
                                Monthly Revenue Trends
                            </h6>
                        </div>
                        <div class="card-body">
                            <canvas id="monthlySalesChart" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        // Enhanced Chart Configurations
        Chart.defaults.font.family = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
        Chart.defaults.font.size = 12;

        // Sales Line Chart with Gradient
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesGradient = salesCtx.createLinearGradient(0, 0, 0, 400);
        salesGradient.addColorStop(0, 'rgba(102, 126, 234, 0.6)');
        salesGradient.addColorStop(1, 'rgba(102, 126, 234, 0.1)');

        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'Daily Sales (₨)',
                    data: [12000, 19000, 15000, 17000, 22000, 30000, 25000],
                    borderColor: '#667eea',
                    backgroundColor: salesGradient,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '₨' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Enhanced Customer Doughnut Chart
        new Chart(document.getElementById('customerChart'), {
            type: 'doughnut',
            data: {
                labels: ['New Customers', 'Returning Customers'],
                datasets: [{
                    data: [65, 35],
                    backgroundColor: [
                        'linear-gradient(45deg, #11998e, #38ef7d)',
                        'linear-gradient(45deg, #f093fb, #f5576c)'
                    ],
                    borderColor: ['#11998e', '#f093fb'],
                    borderWidth: 3,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '60%'
            }
        });

        // Enhanced Top Medicines Bar Chart
        new Chart(document.getElementById('medicineChart'), {
            type: 'bar',
            data: {
                labels: ['Paracetamol', 'Amoxicillin', 'Aspirin', 'Vitamin C', 'Ibuprofen'],
                datasets: [{
                    label: 'Units Sold',
                    data: [120, 90, 75, 60, 50],
                    backgroundColor: [
                        'rgba(102, 126, 234, 0.8)',
                        'rgba(17, 153, 142, 0.8)',
                        'rgba(240, 147, 251, 0.8)',
                        'rgba(79, 172, 254, 0.8)',
                        'rgba(220, 53, 69, 0.8)'
                    ],
                    borderColor: [
                        '#667eea',
                        '#11998e',
                        '#f093fb',
                        '#4facfe',
                        '#dc3545'
                    ],
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Enhanced Monthly Sales Area Chart
        const monthlyCtx = document.getElementById('monthlySalesChart').getContext('2d');
        const monthlyGradient = monthlyCtx.createLinearGradient(0, 0, 0, 400);
        monthlyGradient.addColorStop(0, 'rgba(79, 172, 254, 0.6)');
        monthlyGradient.addColorStop(1, 'rgba(0, 242, 254, 0.1)');

        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August'],
                datasets: [{
                    label: 'Monthly Revenue (₨)',
                    data: [50000, 60000, 55000, 70000, 75000, 80000, 95000, 87000],
                    borderColor: '#4facfe',
                    backgroundColor: monthlyGradient,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#4facfe',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '₨' + (value / 1000) + 'K';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(50px)';
                    card.style.transition = 'all 0.6s ease';

                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 200);
            });
        });
    </script>
@endpush
