<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BPOM Service</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #444;
            color: white;
            position: fixed;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #666;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .status-box {
            padding: 20px;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            color: black;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>BPOM SERVICE</h3>
        <a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="/umkms/create"><i class="bi bi-ticket-perforated"></i> Tiket</a>
        <a href="/meet"><i class="bi bi-camera-video"></i> Zoom</a>
        <a href="/send-wa"><i class="bi bi-whatsapp"></i> Statistik</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-light bg-primary p-2">
            <div class="container-fluid">
                <div class="ms-auto d-flex align-items-center">
                    <span class="navbar-text text-white me-3">Hello, {{ Auth::user()->name }}</span>
                    <a class="btn btn-light btn-sm" href="{{ route('account.logout') }}">Logout</a>
                </div>
            </div>
        </nav>

        {{-- Konten halaman individual --}}
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
