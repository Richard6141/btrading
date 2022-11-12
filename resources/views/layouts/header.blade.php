<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Bank Trading</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#top">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class=" {{ request()->is('about') ? 'active' : '' }} nav-link" href="{{route('about')}}">About Us</a>
              </li>  
              <li class="nav-item">
                <a class="{{ request()->is('services') ? 'active' : '' }} nav-link" href="{{route('services')}}">Our Services</a>
              </li>                          
              <li class="nav-item">
                <a class="{{ request()->is('contact') ? 'active' : '' }} nav-link" href="{{route('contact')}}">Contact Us</a>
              </li>
              @if( !Auth::user())
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}"><i class="fa-duotone fa-user-secret"></i>Se connecter</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}"><i class="fa-duotone fa-user-secret"></i>Se déconnecter</a>
              </li>
              @endif
              <!-- <li class="nav-item">
                <a class="nav-link" href="one-page.html">One Page</a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <script>
    <script src="https://kit.fontawesome.com/9525013788.js" crossorigin="anonymous"></script>
    </script>