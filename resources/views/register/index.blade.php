<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title> Zonebiz - Business Consulting Bootstrap4 Responsive Template </title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fontawesome CSS -->
	<link href="css/all.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper-main">
	<!-- Top Bar -->
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
        <div class="container">
            <a class="navbar-brand" href="index.html">
				<img src="images/logo.png" alt="logo" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.html">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="services.html">Services</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages <i class="fas fa-sort-down"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
							<a class="dropdown-item" href="faq.html">FAQ</a>
							<a class="dropdown-item" href="404.html">404</a>
							<a class="dropdown-item" href="pricing.html">Pricing Table</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Portfolio <i class="fas fa-sort-down"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
							<a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
							<a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
							<a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <i class="fas fa-sort-down"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
							<a class="dropdown-item" href="blog.html">Blog</a>
							<a class="dropdown-item" href="blog-post.html">Blog Post</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="contact.html">Contact</a>
					</li>
				</ul>
            </div>
        </div>
    </nav>
	<header class="slider-main">
    <div class="col-12 d-flex justify-content-center" style="min-height:auto; background-image: url('images/slider-01.jpg')">
        <div class="card" style="width: auto; margin-top:10%; margin-bottom:10%; opacity:.9; height: 85%">
            <div class="card-body row align-items-center" >
                <form class="col align-self-center" action="{{ route('register.submit') }}" method="POST">
                    <h1 class="text-center mb-5" style="color: #1273eb">Create an account now !</h1>
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}" placeholder="Name">
                            @error('name')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-20">
                        <label for="inputFirstname" class="col-sm-4 col-form-label">Firstname</label>
                        <div class="col-sm-8">
                            <input type="text" name="firstname" class="form-control" id="inputFirstname" value="{{ old('firstname') }}" placeholder="Firstname">
                            @error('firstname')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" id="inputEmail" value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone" class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <select name="country_code" id="select_country" class="form-control" style="width: 80px;">
                                    <option value="">Choose your country</option>
                                    @foreach($countries as $country)
                                    @if (old('country_code') == $country['name'])
                                    <option value="{{$country['name']}}" selected>{{$country['emoji']}} {{$country['name']}}</option>
                                    @else
                                    <option value="{{$country['name']}}">{{$country['emoji']}} {{$country['name']}}</option>
                                    @endif
                                    @endforeach
                                </select>
        
                                <input type="tel" name="phone" class="form-control" id="inputPhone" value="{{ old('phone') }}" placeholder="Phone">
                            </div>
                            @error('phone')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                            @error('country_code')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCivility" class="col-sm-4 col-form-label">Civility</label>
                        <div class="col-sm-8">
                            <select name="civility" id="inputCivility" class="form-control">
                                <option value="">Choose your civility</option>
                                @if(old('civility') == "monsieur")
                                <option value="monsieur" selected>Monsieur</option>
                                @else
                                <option value="monsieur">Monsieur</option>
                                @endif
                                @if(old('civility') == "madame")
                                <option value="madame" selected>Madame</option>
                                @else
                                <option value="madame">Madame</option>
                                @endif
                            </select>
                            @error('civility')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                            @error('password')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPasswordConfirmation" class="col-sm-4 col-form-label">Confirm password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password_confirmed" class="form-control" id="inputPasswordConfirmation" placeholder="Password confirmation">
                            @error('password_confirmed')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                            <div style="font-size:12px;" class="d-flex justify-content-between mt-5">
                                <div>
                                    <p><a href="{{route('login')}}" style="color: #1273eb!important"> Login Now !</a></p>
                                </div>
                                <div class="wthree-text">
                                    <label class="anim">
                                        <input type="checkbox" class="checkbox" required="">
                                        <span>I Agree To The Terms & Conditions</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn" style="background-color: #1273eb!important; color:white">Register</button>
                    </div>
                </form></div>
            </div>
          </div>
</header>
	<!-- full Title -->
	
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/script.js"></script>
</body>
</html>