<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            <h2 class="mt-2">Administrator</h2>
        </div>
        <form method="POST" action="{{ route('administrator') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                @if ($errors->has('general'))
                    <div class="text-danger fst-italic">
                        {{ $errors->first('general') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                @if ($errors->has('general'))
                    <div class="text-danger fst-italic">
                        {{ $errors->first('general') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="d-flex justify-content-end mb-3 mt-2">
                <span>Belum memiliki akun?
                    <a href="/register" class="text-decoration-none">Register disini!</a>
                </span>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
