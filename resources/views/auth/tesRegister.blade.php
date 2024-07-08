<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="text-center mb-4">
            <img src="avatar.png" alt="Logo" class="img-fluid" style="width: 100px;">
            <h2 class="mt-2">Register </h2>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="no_tlp" class="form-label">Nomor WA</label>
                <input type="no_tlp" name="no_tlp" class="form-control" id="no_tlp" placeholder="Nomor WhatsApp">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="alamat" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
            </div>
            <input type="hidden" name="role" value="user">
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <div class="d-flex justify-content-end mb-3 mt-2">
                <span>Sudah memiliki akun?
                    <a href="/login" class="text-decoration-none">Login disini!</a>
                </span>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
