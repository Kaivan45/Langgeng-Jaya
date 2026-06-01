<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Lupa Password - Langgeng Jaya</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    height: 100vh;
    display: flex;
}

.left {
    width: 50%;
    background: url('/images/Logo-Langgeng-Jaya.png') no-repeat center;
    background-size: cover;
}

.right {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to right, #ffffff 2%, #3E7B27 98%);
}

.login-box {
    width: 320px;
    text-align: center;
}

.logo-text {
    font-size: 30px;
    font-weight: bold;
    color: #000000;
    margin-bottom: 8px;
    transform: translateY(-30px);
}

.subtitle {
    font-size: 13px;
    color: #555;
    margin-bottom: 20px;
    transform: translateY(-25px);
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    font-size: 13px;
    color: #666;
}

.input-group input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    outline: none;
}

.input-group input:focus {
    border-color: #6c4ccf;
}

.btn {
    width: 100%;
    padding: 10px;
    border: none;
    background: #00a8ff;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    margin-top: 5px;
}

.btn:hover {
    background: #0097e6;
}

.links {
    margin-top: 15px;
    font-size: 12px;
    color: #777;
}

.links a {
    display: block;
    color: #555;
    text-decoration: none;
    margin-top: 5px;
}

.links a:hover {
    text-decoration: underline;
}

.alert-danger p {
    color: #cc0000;
    font-size: 12px;
    margin-top: 8px;
}

.alert-success {
    color: #2d6a2d;
    font-size: 13px;
    background: #f0faf0;
    border: 1px solid #b2dfb2;
    border-radius: 4px;
    padding: 10px;
    margin-bottom: 15px;
}
</style>
</head>
<body>

<div class="left"></div>

<div class="right">
    <div class="login-box">

        <div class="logo-text">Langgeng Jaya</div>
        <div class="subtitle">Masukkan email untuk menerima link reset password</div>

        {{-- Pesan sukses --}}
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="input-group">
                <label>Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
            </div>

            <button type="submit" class="btn">Kirim Link Reset</button>
        </form>

        {{-- Error --}}
        @if ($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="links">
            <a href="{{ route('login') }}">← Kembali ke Login</a>
        </div>

    </div>
</div>

</body>
</html>