<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shifa Chemist - Pharmacy Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @stack('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 50%, #1d4ed8 100%);
            backdrop-filter: blur(10px);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="pharmacy-pattern" patternUnits="userSpaceOnUse" width="20" height="20"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23pharmacy-pattern)"/></svg>');
            pointer-events: none;
        }

        .logo-section {
            padding: 30px 25px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 2;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #10b981, #059669);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .logo-icon i {
            font-size: 24px;
            color: white;
        }

        .logo-text {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .logo-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-section {
            padding: 20px 0;
            position: relative;
            z-index: 2;
        }

        .nav-item {
            margin: 8px 20px;
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .nav-link.active {
            background: linear-gradient(45deg, #10b981, #059669);
            color: white;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
        }

        .nav-link i {
            margin-right: 12px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .nav-link .badge {
            margin-left: auto;
            background: #ef4444;
            color: white;
            font-size: 10px;
            padding: 4px 8px;
            border-radius: 10px;
            animation: bounce 1s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .content {
            flex: 1;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            margin: 20px;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow-y: auto;
        }

        .content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="pill-pattern" patternUnits="userSpaceOnUse" width="50" height="50"><circle cx="25" cy="25" r="2" fill="rgba(59,130,246,0.03)"/><rect x="20" y="15" width="10" height="5" rx="2" fill="rgba(16,185,129,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23pill-pattern)"/></svg>');
            pointer-events: none;
            opacity: 0.5;
        }

        .page-header {
            position: relative;
            z-index: 2;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e5e7eb;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 16px;
        }

        .quick-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            margin-bottom: 15px;
        }

        .stat-icon.medicines {
            background: linear-gradient(45deg, #3b82f6, #2563eb);
        }

        .stat-icon.sales {
            background: linear-gradient(45deg, #10b981, #059669);
        }

        .stat-icon.customers {
            background: linear-gradient(45deg, #f59e0b, #d97706);
        }

        .stat-icon.prescriptions {
            background: linear-gradient(45deg, #8b5cf6, #7c3aed);
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .user-profile {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(45deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .user-name {
            color: white;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-role {
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
        }

        .floating-action {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #10b981, #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .floating-action:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.6);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: fixed;
                bottom: 0;
                left: 0;
                z-index: 1001;
                padding: 10px 0;
            }

            .nav-section {
                display: flex;
                justify-content: space-around;
                padding: 0;
            }

            .nav-item {
                margin: 0;
                flex: 1;
            }

            .nav-link {
                flex-direction: column;
                padding: 10px 5px;
                margin: 0;
                text-align: center;
                font-size: 12px;
            }

            .nav-link i {
                margin: 0 0 5px 0;
                font-size: 16px;
            }

            .content {
                margin: 20px 20px 100px 20px;
            }

            .logo-section {
                display: none;
            }

            .user-profile {
                display: none;
            }
        }
    </style>
</head>

<body>

    @include('layouts.includes.sidebar')
    <div class="content">
        <div class="card-body">
         
                @yield('content')
            
        </div>
    </div>
    <!-- Floating Action Button -->
    <div class="floating-action" title="Quick Sale">
        <i class="fas fa-plus"></i>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling and interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add click handlers for navigation
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Remove active class from all links
                    navLinks.forEach(l => l.classList.remove('active'));
                    // Add active class to clicked link
                    this.classList.add('active');
                });
            });

            // Floating action button click
            document.querySelector('.floating-action').addEventListener('click', function() {
                alert('Quick Sale feature - This would open a new sale dialog');
            });

            // Add hover effects to stat cards
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.background = 'linear-gradient(135deg, #ffffff 0%, #f8fafc 100%)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.background = 'white';
                });
            });
        });
    </script>
</body>

</html>
