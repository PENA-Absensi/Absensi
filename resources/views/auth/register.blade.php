<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('auth') }}/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('auth') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('auth') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="{{ route('register') }}" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Register a new onta</p>

    <form action="{{ route('register-proses') }}" method="POST">
        @csrf
        <div class="input-group mt-3">
            <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
        </div>
        @error('username')
                <small>{{ $message }}</small>
        @enderror

        <div class="input-group mt-3">
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}">
        </div>
        @error('alamat')
                <small>{{ $message }}</small>
        @enderror

        <div class="input-group mt-3">
            <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="{{ old('jurusan') }}">
        </div>
        @error('jurusan')
            <small>{{ $message }}</small>
        @enderror

        <div class="input-group mt-3">
            <input type="number" name="angkatan" class="form-control" placeholder="Angkatan" value="{{ old('angkatan') }}">
        </div>
        @error('angkatan')
            <small>{{ $message }}</small>
        @enderror

        <div class="input-group mt-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        @error('password')
            <small>{{ $message }}</small>
        @enderror

        <div class="row">
        <!-- /.col -->
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
        </div>
    </form>

    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('auth') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('auth') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('auth') }}/dist/js/adminlte.min.js"></script>
</body>
</html>
