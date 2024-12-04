<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aerosense</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('../css/register.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Admin Log In</h2>
        <p>Silahkan isi dengan Username dan Password yang sudah terdaftar</p>
        <div class="formContainer">
            <form action="{{ route('registerlogin') }}" method="post">
                {{ csrf_field() }}
                
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="name" class="form-control">
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                
                <button class="btn btn-primary" type="submit">Sign In</button>
            </form>
            @if (session('gagal'))
                <p class="text-danger">{{ session('gagal') }}</p>
            @endif
        </div>
    </div>
</body>

</html>