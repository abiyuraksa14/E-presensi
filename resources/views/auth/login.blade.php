<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - E-Presensi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('template/assets/img/pei.png')}}" rel="icon">
  <link href="{{asset('template/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('template/assets/css/style.css')}}" rel="stylesheet">

  <style>
    .bg-carousel {
      height: 100vh;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      z-index: -1;
      overflow: hidden;
    }
    .bg-carousel .carousel-inner {
      height: 100%;
    }
    .bg-carousel .carousel-item {
      height: 100%;
    }
    .bg-carousel .carousel-item img {
      height: 100%;
      width: 100%;
      object-fit: cover;
      opacity: 0.7;
    }
    .login-container {
      z-index: 1;
      position: relative;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: 0.3s;
    }
    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 50px;
      padding: 10px 20px;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .form-check-label {
      cursor: pointer;
    }
    .input-group-text {
      background-color: #007bff;
      color: white;
    }
  </style>

</head>

<body>

  <div id="bg-carousel" class="carousel slide bg-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('template/assets/img/trpl1.jpg')}}" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="{{asset('template/assets/img/trpl2.jpg')}}" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="{{asset('template/assets/img/trpl3.jpg')}}" class="d-block w-100" alt="Slide 3">
      </div>
    </div>
  </div>

  <main class="login-container">
    <div class="container">

      <section class="py-4 section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="py-4 d-flex justify-content-center">
                <a href="index.html" class="w-auto logo d-flex align-items-center">
                  <img src="{{asset('template/assets/img/pei.png')}}" alt="">
                  <span class="d-none d-lg-block" style="color: rgb(255, 255, 255)">E-Presensi</span>
                </a>
              </div><!-- End Logo -->

              <div class="mb-3 card">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="pb-0 text-center card-title fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                          <i class="bi bi-eye-fill"></i>
                        </span>
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('template/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('template/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template/assets/js/main.js')}}"></script>

  <!-- Custom JS for toggling password visibility -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const togglePassword = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      togglePassword.addEventListener("click", function () {
        // Toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // Toggle the eye / eye slash icon
        this.classList.toggle("bi-eye-fill");
        this.classList.toggle("bi-eye-slash-fill");
      });
    });
  </script>

</body>

</html>
