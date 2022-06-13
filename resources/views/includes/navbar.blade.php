<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{ url('./images/logo.svg') }}" alt="Logo" />
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link active">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories') }}" class="nav-link">Categories</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Rewards</a>
          </li>
          @guest
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-success text-white px-4">Sign In</a>
          </li>
          @endguest
        </ul>
        @auth
        <ul class="navbar-nav d-none d-lg-flex">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img src="./images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture" />
              Hi, Angga
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
              <a class="dropdown-item" href="{{ route('dashboard-setting-account') }}">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
              <img src="./images/icon-cart-filled.svg" alt="" />
              <div class="card-badge">3</div>
            </a>
          </li>
        </ul>

        <!-- mobile nav -->
        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a class="nav-link" href="#">
              Hi, Angga
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-inline-block" href="#">
              Cart
            </a>
          </li>
        </ul>      
        @endauth
      </div>
    </div>
  </nav>