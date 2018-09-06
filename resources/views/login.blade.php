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
                <label>
                  <input type="checkbox" name="remember_token"> Recordarme
                </label>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-outline-info btn-block">Ingresar</button>
              </div>

            </form>
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
