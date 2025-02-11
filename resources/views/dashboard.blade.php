<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Utama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
            color: #72B5F6;
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
            background: #72B5F6;
            color: #000000;
        }

        .menu-item i {
            font-size: 18px;
            y
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: 0.3s;
        }

        .navbar {
            position: sticky;
            top: 20px;
            background: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
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
        <div class="logo">VibeFour</div>
        <hr>
        <a href="/dashboard" class="menu-item collapsed"><i class="bi bi-house-door"></i> Beranda</a>
        <a href="/editor_halaman" class="menu-item"><i class="bi bi-gear"></i> Editor Halaman</a>
        <a href="/manajemen_berita" class="menu-item"><i class="bi bi-newspaper"></i> Manajemen Berita</a>
        <a href="/manajemen_pengguna" class="menu-item"><i class="bi bi-people"></i> Pengguna</a>
        <hr>
        <a href="/logout" class="menu-item"><i class="bi bi-box-arrow-right"></i> Keluar Akun</a>
    </div>

    <div class="content" id="content">
        <div class="navbar bg-transparent" id="navbar">
            <i class="bi bi-list toggle-btn" id="toggleSidebar"></i>
        </div>

        <div class="container mt-4">

            @yield('content')

        </div>
    </div>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById("toggleSidebar").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("sidebar-hidden");
            document.getElementById("content").classList.toggle("content-expanded");
        });

        // Klasifikasi ckeditor untuk setiap class editor
        document.querySelectorAll('.editor').forEach((textarea) => {
            ClassicEditor.create(textarea, {
                // toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'undo', 'redo']
            }).catch(error => console.error(error));
        });

        // CKEditor
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
