<div class="container">
      <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{route('/')}}" class="navbar-brand">
          <img src="{{url('frontend/images/logo_assets/logo_assets/nomads_logo/drawable-hdpi/logo_nomads.png')}}" width="120">
          <!-- <img src="" class="logo nomads"> -->
        </a>
        <button type="button" 
                class="navbar-toggler navbar-toggler-right"
                data-toggle="collapse"
                data-target="#navb">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
          <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item mx-md-2">
              <a href="{{route('/')}}" class="nav-link active">Home</a>
            </li>
            <li class="nav-item mx-md-2">
              <a href="#popular" class="nav-link">Paket Travel</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" 
                  class="nav-link dropdown-toggle" 
                  id="navbardrop" 
                  data-toggle="dropdown">
                  Service
              </a>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">link</a>
                <a href="#" class="dropdown-item">link2</a>
                <a href="#" class="dropdown-item">link3</a>
                </form>
              </div>
            </li>
            <li class="nav-item mx-md-2">
              <a href="#testimonialheading" class="nav-link">Testimonial</a>
            </li>
            @auth
            @if(Auth::user()->roles == 'ADMIN')
            <li class="nav-item mx-md-2">
              <a href="{{route('dashboard')}}" class="nav-link">Admin</a>
            </li>
            @endif
            @endauth
          </ul> 
            @guest
            <!-- mobile button -->
            <!-- hanya muncul di mobile -->
            <form class="form-inline d-sm-block d-md-none">
              <button class="btn btn-login my-2 my-sm-0" type="submit" onclick="event.preventDefault(); location.href='{{url('login')}}';">
                Masuk
              </button>
            </form>
            <!-- desktop button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
              <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit" onclick="event.preventDefault(); location.href='{{url('login')}}';">
                Masuk
              </button>
            </form>
            @endguest

            @auth
            <!-- mobile button -->
            <!-- hanya muncul di mobile -->
            <form class="form-inline d-sm-block d-md-none" action="{{url('logout')}}" method="post">
                @csrf
              <button class="btn btn-login my-2 my-sm-0" type="submit">
                Logout
              </button>
            </form>
            <!-- desktop button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{url('logout')}}" method="post">
                @csrf
              <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                Logout
              </button>
            </form>
            @endauth
        </div>
      </nav>
    </div> 