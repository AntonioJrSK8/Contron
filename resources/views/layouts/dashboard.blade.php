<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Contron</title>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/87b3aaa9ba.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-expand-md fixed-top bg-dark flex-md-nowrap p-0 shadow-sm">

        <span class="navbar-brand col-sm-2 col-md-2 mr-auto bg-black text-light" href="#">
            {{ config('app.name') }}
        </span>
        <span class="text-light text-xl-right">Linguagem:</span>
        <span class="navbar-brand col-sm-1 col-md-1 bg-black text-light {{ app()->getLocale() }}">

        </span>

      {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link text-sm-left" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        {{ Auth::user()->name }} </button>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="list-group-item list-group-item-action"
                                    tabindex="-1" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                @endguest
            </ul>

        </li>
      </ul>


    </nav>

    <div class="container-fluid">
      <div class="row">

        {{-- Menu --}}
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

                <li class="nav-item">
                <a class="nav-link active" href="{{ url('dashboard') }}">
                  <span data-feather="home"></span>
                  Dashboard
                  <span class="sr-only">(current)</span>
                </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('empresa') }}">
                        <span data-feather="globe"></span>
                        Empresa
                    </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('produto') }}">
                    <span data-feather="shopping-cart"></span>
                    Produtos
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('cliente') }}">
                    <span data-feather="users"></span>
                    Clientes
                  </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Pedidos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('centrodecusto') }}">
                        <span data-feather="pie-chart"></span>
                         Centro de custo
                    </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Relatórios
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrações
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                      <span data-feather="dollar-sign"></span>
                      Financeiro
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                      <span data-feather="package"></span>
                      Orçamento
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                      <span data-feather="settings"></span>
                      Configurações
                  </a>
                </li>

            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Relatórios Salvos</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Neste mês
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Ultimo trimestre
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Enganjamento social
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Venda no ultimo ano
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <script src="{{ asset('js/app.js') }}"></script>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
            </br>
            @yield('content')

        </main>

      </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script> feather.replace() </script>

    @push('scripts')
    <script type="text/javascript">
        @yield('js')
    </script>
    @endpush
    @stack('scripts')


  </body>
</html>
