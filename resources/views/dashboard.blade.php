<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Halaman Dashboard')</title>


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
            font-size: 31px;
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

        .sub-menu-item {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        #buka {
            transition: transform 0.3s ease;
        }

        #buka.rotate-up {
            transform: rotate(180deg);
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
        <a href="/halaman_utama" class="menu-item"><i class="bi bi-house-door"></i> Beranda</a>
        <a href="/editor_halaman" class="menu-item mt-2 mb-2" data-bs-toggle="collapse" data-bs-target="#menu_editor"
            data-taget="#menu_editor" aria-expanded="false"><i class="bi bi-gear"></i> Editor
            Halaman
            <i class="bi bi-chevron-down ms-2" id="buka"></i>
        </a>

        <div class="collapse" id="menu_editor">
            <ul class="list-unstyled">
                <li class="menu-item ms-3"><a href="/editor_beranda" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> Beranda</a></li>
                <li class="menu-item ms-3"><a href="/editor_header" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> Header</a></li>
                <li class="menu-item ms-3"><a href="/editor_produk" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> Produk</a></li>
                <li class="menu-item ms-3"><a href="/editor_footer" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> Footer</a></li>
                <li class="menu-item ms-3"><a href="/editor_tentang" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> Tentang</a></li>
                <li class="menu-item ms-3"><a href="/editor_s&k" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> Syarat & Ketentuan</a></li>
                <li class="menu-item ms-3"><a href="/editor_faq" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> F.A.Q</a></li>
                <li class="menu-item ms-3"><a href="/editor_kontak" class="sub-menu-item"><i class="bi bi-circle"
                            style="font-size: 7px;"></i> Kontak</a></li>
            </ul>
        </div>

        <a href="/manajemen_berita" class="menu-item mb-2"><i class="bi bi-newspaper"></i> Manajemen Berita</a>
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
        document.addEventListener("DOMContentLoaded", function() {
            const chevronIcon = document.getElementById("buka");
            const collapseMenu = document.getElementById("menu_editor");

            collapseMenu.addEventListener("show.bs.collapse", function() {
                chevronIcon.classList.add("rotate-up");
            });

            collapseMenu.addEventListener("hide.bs.collapse", function() {
                chevronIcon.classList.remove("rotate-up");
            });
        });

        document.getElementById("toggleSidebar").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("sidebar-hidden");
            document.getElementById("content").classList.toggle("content-expanded");
        });

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
