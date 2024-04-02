<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/css/about.css?<?php echo time(); ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<div class="nav">
		<?php loadPartial('navbar'); ?>
	</div>
	<!-- start first section -->
	<section class="container-xxl py-5">
		<div class="container">
			<div class="row g-5 align-items-center">
				<div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
					<div class="row g-0 about-bg rounded overflow-hidden">
						<div class="col-6 text-start">
							<img class="img-fluid w-100" src="img/about-1.jpg">
						</div>
						<div class="col-6 text-start">
							<img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
						</div>
						<div class="col-6 text-end">
							<img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
						</div>
						<div class="col-6 text-end">
							<img class="img-fluid w-100" src="img/about-4.jpg">
						</div>
					</div>
				</div>

				<div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
					<h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
					<p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
					<p><i class="fa fa-check color me-3"></i>Tempor erat elitr rebum at clita</p>
					<p><i class="fa fa-check color me-3"></i>Aliqu diam amet diam et eos</p>
					<p><i class="fa fa-check color me-3"></i>Clita duo justo magna dolore erat amet</p>
					<a href=""><button class="cvbtn">Read More</button></a>
				</div>
			</div>
		</div>
	</section><br><br>
	<!-- End first section -->

	<!-- start service section -->
	<section class="service-area section-gap" id="service">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 pb-40 header-text">
					<h1>Why Choose Us</h1>
					<p>
						Who are in extremely love with eco friendly system.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<h4><span class="lnr lnr-user"></span>Expert Technicians</h4>
						<p>
							Usage of the Internet is becoming more common due to rapid advancement of technology and power.
						</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<h4><span class="lnr lnr-license"></span>Professional Service</h4>
						<p>
							Usage of the Internet is becoming more common due to rapid advancement of technology and power.
						</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<h4><span class="lnr lnr-phone"></span>Great Support</h4>
						<p>
							Usage of the Internet is becoming more common due to rapid advancement of technology and power.
						</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<h4><span class="lnr lnr-rocket"></span>Technical Skills</h4>
						<p>
							Usage of the Internet is becoming more common due to rapid advancement of technology and power.
						</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<h4><span class="lnr lnr-diamond"></span>Highly Recomended</h4>
						<p>
							Usage of the Internet is becoming more common due to rapid advancement of technology and power.
						</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<h4><span class="lnr lnr-bubble"></span>Positive Reviews</h4>
						<p>
							Usage of the Internet is becoming more common due to rapid advancement of technology and power.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End service section -->
	<?php loadPartial('footer'); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>