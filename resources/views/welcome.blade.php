<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background: white;
            height: 100vh;
            position: fixed;
            padding: 20px;
            transition: all 0.3s;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo {
            font-size: 22px;
            font-weight: bold;
            color: #6c5ce7;
        }

        .sidebar .menu-item {
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar .menu-item:hover,
        .menu-item.active {
            background: #e3e3ff;
            color: #4b0082;
        }

        .menu-item i {
            font-size: 18px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: 0.3s;
        }

        .navbar {
            background: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .toggle-btn {
            font-size: 24px;
            cursor: pointer;
        }

        .sidebar-hidden {
            margin-left: -250px;
        }

        .content-expanded {
            margin-left: 0 !important;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo">Vibe<span style="color:blueviolet;">Four</span></div>
        <hr>
        <a href="#" class="menu-item active"><i class="bi bi-house-door"></i> Beranda</a>
        <a href="#" class="menu-item"><i class="bi bi-gear"></i> Editor Halaman</a>
        <a href="#" class="menu-item"><i class="bi bi-newspaper"></i> Manajemen Berita</a>
        <a href="#" class="menu-item"><i class="bi bi-people"></i> Pengguna</a>
        <hr>
        <a href="#" class="menu-item"><i class="bi bi-box-arrow-right"></i> Keluar Akun</a>
    </div>

    <!-- Navbar -->
    <div class="content" id="content">
        <div class="navbar">
            <i class="bi bi-list toggle-btn" id="toggleSidebar"></i>
            <span class="fw-bold">Beranda</span>
        </div>
        <div class="container mt-4">
            <h3>Beranda</h3>
            <p>Selamat datang di dashboard Anda!</p>
        </div>
    </div>

    <script>
        document.getElementById("toggleSidebar").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("sidebar-hidden");
            document.getElementById("content").classList.toggle("content-expanded");
        });
    </script>

</body>

</html>
