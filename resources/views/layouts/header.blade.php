<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="social-media">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-details">
                    <ul>
                        <li><i class="fas fa-phone fa-rotate-90"></i> +01 899 286 777</li>
                        <li><i class="fas fa-map-marker-alt"></i> 8/99 , North khailkoir, NY</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">
    <div class="container justify-content-between">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logo.png')}}" alt="logo" />
        </a>

        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class=" {{ request()->is('about') ? 'active' : '' }} nav-link" href="{{route('about')}}">About
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->is('services') ? 'active' : '' }} nav-link" href="{{route('services')}}">Our
                        Services</a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->is('contact') ? 'active' : '' }} nav-link"
                        href="{{route('contact')}}">Contact Us</a>
                </li>
                @if( !Auth::user())
                <li class="nav-item">
                    <a class="nav-link filled-button" href="{{route('login')}}"><i
                            class="fa-duotone fa-user-secret"></i>Se connecter</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link filled-button" href="{{route('logout')}}"><i
                            class="fa-duotone fa-user-secret"></i>Se déconnecter</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>