<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Economato | Login</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <!-- Icono -->
  <link rel="icon" href="{{ asset('images/logo.png') }}">
</head>
<body>

  <div class="container">
    <br>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card signIn">
          <div class="card-body">
            <div class="text-center img">
              <img src="{{ asset('images/logoLogin.png') }}" alt="Logo" class="img-responsive"><hr>
            </div>
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="">Correo Electrónico</label>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off" value="{{ old('email') }}">
                <strong class="invalid-feedback">{{ $errors->first('email') }}</strong>
              </div>

              <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                <strong class="invalid-feedback">{{ $errors->first('password') }}</strong>
              </div>

              <div class="form-group">
                <input type="checkbox" id="checkbox" name="remember_token"> Recordarme
                <label for="checkbox"><span></span></label>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-outline-info btn-block">Ingresar</button>
              </div>

            </form>

            <style>
              .github{
                display: flex !important;
                justify-content: space-between !important;
              }
            </style>

            <h6>Developed by: </h4>
            <div class="row">
              <div class="col col-6">
                <div class="github">
                  <a href="https://github.com/McTraque"><i class="fab fa-github"> /McTraque </i></a>
                </div>
              </div>
              <div class="col col-6">
                <a href="https://github.com/viictorestrada"><i class="fab fa-github"> /viictorestrada </i></a>
              </div>
            </div>

            <div class="row">
              <div class="col col-6">
                <div class="github">
                  <a href="https://github.com/JulianFlorez12"><i class="fab fa-github"> /JulianFlorez12 </i></a>
                </div>
              </div>
              <div class="col col-6">
                <a href="https://github.com/ctabares06"><i class="fab fa-github"> /ctabares06 </i></a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  @if(session()->has('flash'))
    <script>
    toastr.options = {
      "progressBar": true
    }
    toastr.info("{{ session('flash') }}")</script>
  @endif
</body>
</html>
