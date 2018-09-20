<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Economato - @yield('title')</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Main styles -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('datatables/css/responsive.bootstrap4.min.css') }}">
  <!-- fontawesome -->
  <link rel="stylesheet" href="{{ asset('fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
  <!-- Icono -->
  <link rel="icon" href="{{ asset('images/logo.png') }}">

  <style media="screen">
    .dataTables_scrollHeadInner {
      width: 100% !important;
    }
  </style>
</head>
<body>

  <nav class="navbar bg-info">
  <div class=" navbar-brand text-light">
    <img src="{{ asset('images/navbar.png') }}"  style="width: 140px;" alt="">
  </div>
  <ul class="nav nav-pills">

    <li class="nav-item">
      @if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2)
        <a href="{{ url('panel') }}" style="color: white" class="nav-link"><i class="fa fa-home fa-lg"></i> Inicio</a>
      @endif
    </li>

    <li class="nav-item">
        @if (Auth::user()->rol_id == 2)
          <a href="budgets" style="color: white" class="nav-link"><i class="fab fa-bitcoin"></i> Presupuesto</a>
        @endif
      </li>

    <li class="nav-item">
        @if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3)
        <a href="{{ url('orders') }}" class="nav-link" style="color: white"><i class="fa fa-bell fa-lg"></i> Gestion de pedidos</a>
        @endif
    </li>

    <li class="nav-item">
      <a class="nav-link" style="color: white" href="#"><i class="fa fa-question-circle fa-lg"></i> Ayuda</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="color: white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-lg"></i> {{ Auth::user()->name }} {{ Auth::user()->last_name }} <span class="caret"></span></a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2)
          <a class="dropdown-item" href="{{ url('configurations') }}"><i class="fa fa-cogs"></i> Configuraciones</a>
        @endif
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fa fa-sign-out-alt"></i> Salir</a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

    </div>
  </li>
</ul>
</nav>

  @yield('content')
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
  <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('datatables/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('datatables/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/functions.js') }}"></script>
  <script src="{{ asset('js/moment.js') }}"></script>
  @yield('script')
  @include('sweetalert::cdn')
  @include('sweetalert::view')
</body>
</html>
