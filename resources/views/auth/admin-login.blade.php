<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f3f6fb;
            min-height: 100vh;
        }
        .login-card {
            max-width: 400px;
            margin: 60px auto;
            border-radius: 16px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
        .login-logo {
            width: 60px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-card card p-4 mt-5">
        <div class="text-center">
            <h3 class="mb-3">Admin Login</h3>
        </div>
        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            @if($errors->any())
                <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
            @endif
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
