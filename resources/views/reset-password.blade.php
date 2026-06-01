<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Reset Password - Langgeng Jaya</title>

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

.input-wrapper {
    position: relative;
}

.input-group input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    outline: none;
}

.input-wrapper input {
    padding-right: 40px;
}

.input-group input:focus {
    border-color: #6c4ccf;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    color: #999;
    font-size: 16px;
    line-height: 1;
}

.toggle-password:hover {
    color: #555;
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
</style>
</head>
<body>

<div class="left"></div>

<div class="right">
    <div class="login-box">

        <div class="logo-text">Langgeng Jaya</div>
        <div class="subtitle">Masukkan PIN baru kamu</div>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            {{-- Token & email tersembunyi --}}
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="input-group">
                <label>PIN Baru</label>
                <div class="input-wrapper">
                    <input type="password" inputmode="numeric" pattern="[0-9]*"
                           name="password" id="pin-new" required>
                    <button type="button" class="toggle-password"
                            onclick="togglePin('pin-new','btn-new')" id="btn-new" title="Lihat PIN">👁</button>
                </div>
            </div>

            <div class="input-group">
                <label>Konfirmasi PIN Baru</label>
                <div class="input-wrapper">
                    <input type="password" inputmode="numeric" pattern="[0-9]*"
                           name="password_confirmation" id="pin-confirm" required>
                    <button type="button" class="toggle-password"
                            onclick="togglePin('pin-confirm','btn-confirm')" id="btn-confirm" title="Lihat PIN">👁</button>
                </div>
            </div>

            <button type="submit" class="btn">Simpan PIN Baru</button>
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

<script>
function togglePin(inputId, btnId) {
    const input = document.getElementById(inputId);
    const btn   = document.getElementById(btnId);
    if (input.type === 'password') {
        input.type = 'text';
        input.inputMode = 'numeric';
        btn.textContent = '🙈';
        btn.title = 'Sembunyikan PIN';
    } else {
        input.type = 'password';
        input.inputMode = 'numeric';
        btn.textContent = '👁';
        btn.title = 'Lihat PIN';
    }
}
</script>
</body>
</html>