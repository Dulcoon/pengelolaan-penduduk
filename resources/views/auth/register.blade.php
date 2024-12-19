<!DOCTYPE html>
<html>

<head>
  <title>Register Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
  <style>
    /* Styling untuk Modal Error */
    .modal-error {
      display: none;
      position: fixed;
      top: 4%;
      left: 50%;
      transform: translate(-50%, 0);
      width: 90%;
      max-width: 400px;
      background: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      z-index: 1000;
      padding: 20px;
    }

    .modal-error h2 {
      font-size: 20px;
      margin-bottom: 15px;
      color: red;
      text-align: center;
    }

    .modal-error ul {
      padding-left: 20px;
      list-style-type: disc;
    }

    .modal-error ul li {
      margin-bottom: 8px;
      color: #333;
      font-size: 14px;
    }

    .modal-error button {
      background-color: #f44336;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      margin: 15px auto 0;
      display: block;
    }

    .modal-error button:hover {
      background-color: #d32f2f;
    }

    .modal-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
      .modal-error {
        width: 90%;
      }
    }
  </style>
</head>

<body>
  <img class="wave" src="img/wave.png">
  <div class="container">
    <div class="img">
      <img src="img/ependuduk.png">
    </div>
    <div class="login-content">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2 class="title">Daftar</h2>

        <!-- Name -->
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Nama</h5>
            <input id="name" autocomplete="off" type="text" name="name" class="input" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama">
          </div>
        </div>

        <!-- Email -->
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-envelope"></i>
          </div>
          <div class="div">
            <h5>Email</h5>
            <input id="email" autocomplete="off" type="email" name="email" class="input" value="{{ old('email') }}" required autocomplete="username" placeholder="Email">
          </div>
        </div>

        <!-- Password -->
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <h5>Password</h5>
            <input id="password" autocomplete="off" type="password" name="password" class="input" required autocomplete="new-password" placeholder="Password">
          </div>
        </div>

        <!-- Confirm Password -->
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <h5>Konfirmasi Password</h5>
            <input id="password_confirmation" autocomplete="off" type="password" name="password_confirmation" class="input" required autocomplete="new-password" placeholder="Konfirmasi Password">
          </div>
        </div>

        <input type="submit" class="btn" value="Daftar">
        <a href="{{ route('login') }}">Sudah punya akun? Masuk disini</a>

      </form>
    </div>
  </div>

  <!-- Modal Error -->
  <div class="modal-overlay"></div>
  <div class="modal-error" id="errorModal">
    <h2>Oops! Ada Kesalahan</h2>
    <ul id="errorList"></ul>
    <button onclick="closeModal()">Tutup</button>
  </div>

  <!-- JavaScript untuk Menampilkan Modal -->
  <script>
    // Cek jika ada error dari server
    @if ($errors->any())
      const errorMessages = @json($errors->all());
      const modal = document.getElementById('errorModal');
      const overlay = document.querySelector('.modal-overlay');
      const errorList = document.getElementById('errorList');

      // Tampilkan semua pesan error dalam list
      errorMessages.forEach(message => {
        const li = document.createElement('li');
        li.textContent = message;
        errorList.appendChild(li);
      });

      // Tampilkan modal dan overlay
      modal.style.display = 'block';
      overlay.style.display = 'block';

      // Fungsi untuk menutup modal
      function closeModal() {
        modal.style.display = 'none';
        overlay.style.display = 'none';
      }
    @endif
  </script>
</body>

</html>
