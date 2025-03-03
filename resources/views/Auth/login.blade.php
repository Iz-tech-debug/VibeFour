<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Masuk Akun</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 850px;
            max-width: 100%;
            height: 500px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .login-left {
            background-image: url("{{ asset('images/fluid.gif') }}");
            background-size: cover;
            background-position: center;
            height: 100%;
        }

        .login-right {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .input-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">

        <div class="login-container">

            <div class="row h-100">

                <div class="col-md-6 login-left d-none d-md-block p-0"></div>

                <div class="col-md-6 login-right">
                    <h4 class="mb-3"><strong style="color: #72B5F6">Selamat datang kembali 👋</strong></h4>
                    <p class="mb-4">Masuk menggunakan akun anda</p>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('login.check') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="text" name="username" class="form-control"
                                placeholder="Masukkan username atau email" required>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key"></i></span>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Masukkan kata sandi" required>
                            <span class="input-group-text">
                                <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </span>
                        </div>

                        <button type="submit" class="btn w-100 mt-3"
                            style="color: white; background-color: #72B5F6">Masuk akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                let passwordInput = $("#password");
                let type = passwordInput.attr("type") === "password" ? "text" : "password";
                passwordInput.attr("type", type);
                $(this).toggleClass("bi-eye bi-eye-slash");
            });
        });
    </script>
</body>

</html>
