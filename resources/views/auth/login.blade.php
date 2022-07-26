<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>Login</title>

      <link rel="icon" href="{{ asset('img/icon.png') }}">

      <!-- General CSS Files -->
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

      <!-- Template CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
      <!-- Start GA -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  </head>
  <body>
    <div id="app">
      <section class="section">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
              <div class="login-brand">
                <img src="{{ asset('img/login.png') }}" alt="logo" width="100">
              </div>

              <div class="card card-primary">
                <div class="card-header"><a href="{{ route('landingPage') }}" title="Kembali"><img src="{{ asset('img/back.png') }}" alt=""></a>&nbsp;&nbsp;<h4 style="font-weight: 700; font-size: 24px; color: #064E3B">SIKAT - Login</h4></div>

                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}" class="needs-validation @error("email") was-validated @enderror" novalidate="">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email') }}" name="email" tabindex="1" required autofocus>
                      <div class="invalid-feedback">
                        E-mail anda tidak dikenal
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                          <a href="{{ route('forgot') }}" class="text-small">
                            Lupa Password?
                          </a>
                        </div>
                      </div>
                      <input id="password" type="password" class="form-control" placeholder="Masukkan Password" name="password" tabindex="2" required>
                      <div class="invalid-feedback">
                        Password anda tidak dikenal
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                      </button>
                    </div>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

      <!-- General JS Scripts -->
      <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/modules/popper.js') }}"></script>
      <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
      <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
      <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
      <script src="{{ asset('assets/js/stisla.js') }}"></script>
      
      <!-- Template JS File -->
      <script src="{{ asset('assets/js/scripts.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
  </body>
</html>