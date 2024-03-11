<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RevBid | Maximize your Revenue through our Bidding! </title>
	<meta name="description" content="Orixy - Digital Agency HTML Template
	">
	<meta name="keywords" content="advertising, advertising agency, agency, agency theme, business, creative agency, digital, digital advertising, digital agency, digital marketing, digital marketing agency, digital theme, marketing, startup">
	<meta name="author" content="Themexriver">
	<link rel="shortcut icon" href="{{asset('index/img/logo/ficon.png') }}" type="image/x-icon">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="{{asset('index/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{asset('index/css/fontawesome-all.css') }}">
	<link rel="stylesheet" href="{{asset('index/css/animate.css') }}">
	<link rel="stylesheet" href="{{asset('index/css/video.min.css') }}">
	<link rel="stylesheet" href="{{asset('index/css/slick-theme.css') }}">
	<link rel="stylesheet" href="{{asset('index/css/slick.css') }}">
	<link rel="stylesheet" href="{{asset('index/css/global.css') }}">
	<link rel="stylesheet" href="{{asset('index/css/style.css') }}">
<style>

    .form-group {
        background-color: #171717;
    }
    
    .card-body {
        background-color: #171717;
    }
    .form-control {
        background-color: black;
        color: white; /* Change user text input color to black */
        border: 1px solid #555;
    }
        .form-control:focus {
        background-color: #333;
        color: white;
        border-color: #888;
        box-shadow: none;
    }

</style>
</head>
<body class="ori-digital-studio">
	<div id="preloader"></div>
	<div class="up">
		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
	</div>
	<div class="cursor"></div>
<!-- Start of header section
	============================================= -->
	<header id="ori-header" class="ori-header-section header-style-one">
		<div class="ori-header-content-area">
			<div class="ori-header-content d-flex align-items-center justify-content-between">
				<div class="brand-logo">
<a href="#"><img src="{{ asset('/storage/revbid_large.png') }}" alt="" width="5%" height="5%"></a>
				</div>
				<div class="ori-main-navigation-area">
					<nav class="ori-main-navigation clearfix ul-li">
						<ul id="main-nav" class="nav navbar-nav clearfix">
							<li class="dropdown ori-megamenu">
								<a href="https://revbid.net">Home</a>
								
							</li>
							<li class="dropdown ori-megamenu">
								<a href="/login">Login</a>
								
							</li>
							<li class="dropdown ori-megamenu">
								<a href="#">Contact</a>
								
							</li>
							
							
						</ul>
					</nav>
				</div>
			</div>
			<div class="mobile_menu position-relative">
				<div class="mobile_menu_button open_mobile_menu">
					<i class="fal fa-bars"></i>
				</div>
				<div class="mobile_menu_wrap">
					<div class="mobile_menu_overlay open_mobile_menu"></div>
					<div class="mobile_menu_content">
						<div class="mobile_menu_close open_mobile_menu">
							<i class="fal fa-times"></i>
						</div>
						<div class="m-brand-logo">
							<a  href="https://revbid.net"><img src="{{ asset('index/img/logo/logo1.png') }}" alt=""></a>
						</div>
						<nav class="mobile-main-navigation  clearfix ul-li">
							<ul id="m-main-nav" class="nav navbar-nav clearfix">
									<a href="https://revbid.net">Home</a>
								<ul id="m-main-nav" class="nav navbar-nav clearfix"><a  href="/login">Login</a></ul>
								<ul id="m-main-nav" class="nav navbar-nav clearfix"><a href="/contact">Contact</a></ul>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /Mobile-Menu -->
			</div>
		</div>
	</header><!-- /header -->
	

<section id="ori-team-1" class="ori-team-section-1 position-relative">
    <div class="ori-team-content-area">
        <div class="container">
            <div class="ori-team-top-content-1 d-flex justify-content-between align-items-center">
                <div class="ori-section-title-1 text-uppercase wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <h2>Contact <span>Us</span></h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form method="POST" action="{{ route('contact.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="website">Website:</label>
                                    <input type="website" class="form-control" id="website" name="website" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="monthly">Monthly Traffic:</label>
                                    <input type="monthly" class="form-control" id="monthly" name="monthly" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="telegram">Telegram Username:</label>
                                    <input type="telegram" class="form-control" id="telegram" name="telegram">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line_animation">
        <div class="line_area"></div>
        <div class="line_area"></div>
        <div class="line_area"></div>
        <div class="line_area"></div>
        <div class="line_area"></div>
        <div class="line_area"></div>
        <div class="line_area"></div>
        <div class="line_area"></div>
    </div>
</section>

<!-- End of Team section
	============================================= -->


<!-- Start of Footer section
	============================================= -->
	<footer id="ori-footer" class="ori-footer-section footer-style-one">
		<div class="container">
			<div class="ori-footer-title text-center text-uppercase">
				<a href="/contact"><h2>Get In <span>Touch</span> <i class="fas fa-arrow-right"></i></h2>
			</div>
			<div class="ori-footer-widget-wrapper">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="ori-footer-widget">
							<div class="logo-widget">
								<a href="#"><img src="{{ asset('index/img/logo/logo1.png') }}" alt=""></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="ori-footer-widget">
							<div class="menu-location-widget ul-li-block">
								<h2 class="widget-title text-uppercase">Our Offices</h2>
								<ul>
									<li>Austria</a></li>
									<li>Italy</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="ori-footer-widget">
							<div class="contact-widget ul-li-block">
								<h2 class="widget-title text-uppercase">Contact info</h2>
								<div class="contact-info">
									<span>Leipzigerstrasse 48 </span>
									<span>1200 Vienna</span>
									<a href="mailto:support@revbid.net">support@revbid.net</a>
									<span>Office Hours: 09 - 16 CET</span>
									<span>Monday - Friday Day</span>
								</div>
							</div>
						</div>
					</div>
					<!--<div class="col-lg-3 col-md-6">
						<div class="ori-footer-widget">
							<div class="newslatter-widget ul-li-block">
								<h2 class="widget-title text-uppercase">Newslatter</h2>
								<div class="newslatter-form">
									<form action="#" method="get">
										<input type="email" name="email" placeholder="Enter mail">
										<button type="submit">Subscribe <i class="fas fa-paper-plane"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>-->
				</div>
			</div>
			<div class="ori-footer-copyright d-flex justify-content-between">
				<div class="ori-copyright-text">
					© 2022 All Right Recived - RevBid
				</div>
				<div class="ori-copyright-social">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-youtube"></i></a>
				</div>
			</div>
		</div>
	</footer>
<!-- End of Footer section
	============================================= -->		

	<!-- For Js Library -->
	<script src="{{ asset('index/js/jquery.min.js') }}"></script>
	<script src="{{ asset('index/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('index/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('index/js/popper.min.js') }}"></script>
	<script src="{{ asset('index/js/appear.js') }}"></script>
	<script src="{{ asset('index/js/slick.js') }}"></script>
	<script src="{{ asset('index/js/twin.js') }}"></script>
	<script src="{{ asset('index/js/wow.min.js') }}"></script>
	<script src="{{ asset('index/js/knob.js') }}"></script>
	<script src="{{ asset('index/js/jquery.filterizr.js') }}"></script>
	<script src="{{ asset('index/js/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('index/js/rbtools.min.js') }}"></script>
	<script src="{{ asset('index/js/rs6.min.js') }}"></script>
	<script src="{{ asset('index/js/jarallax.js') }}"></script>
	<script src="{{ asset('index/js/jquery.inputarrow.js') }}"></script>
	<script src="{{ asset('index/js/swiper.min.js') }}"></script>
	<script src="{{ asset('index/js/jquery.counterup.min.js') }}"></script>
	<script src="{{ asset('index/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('index/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('index/js/jquery.marquee.min.js') }}"></script>
	<script src="{{ asset('index/js/script.js') }}"></script>
</body>
</html>			