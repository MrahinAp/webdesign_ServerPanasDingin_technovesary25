<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk EcoBank</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-body">
  <div class="login-container">
    <div class="login-card">
      <h1>🌿 EcoBank</h1>
      <h2>Masuk ke Akun Kamu</h2>
      
      {{-- 🟩 tampilkan pesan error kalau login gagal --}}
      @if(session('error'))
        <div class="error-message" style="color: red; text-align:center; margin-bottom: 10px;">
          {{ session('error') }}
        </div>
      @endif

      {{-- 🛡️ penting banget: CSRF token biar POST aman --}}
      <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="username">Nama Pengguna</label>
          <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn-login">Masuk</button>
      </form>

      <p class="register-text">Belum punya akun? <a href="#">Daftar</a></p>
    </div>
  </div>
</body>
</html>
