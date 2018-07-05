<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<?=asset_url()?>" >
	<title> jarun carservice </title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Construct Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //custom-theme -->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<!-- stylesheet -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="css/chocolat.css"	type="text/css" media="all">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- //stylesheet -->
		<!-- online fonts-->
		<link href="//fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
		<!-- //online fonts -->
		<!-- font-awesome-icons -->
		<link href="css/font-awesome.css" type="text/css" rel="stylesheet"> 
		<!-- //font-awesome-icons -->
		<link href="css/owl.carousel.css?v=1001" rel="stylesheet">
		<link href="css/bootstrap-touch-slider.css" rel="stylesheet" media="all">
	</head>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top"> 

		<?php include("slider.php");?>
		<?php include("header.php");?>

		<section class="bg04">
			<br>
			<div class="container">
				<center><h1 style="font-size: 50px; color: #000"><i class="fa fa-search" aria-hidden="true" style="color: #ffa100">&nbsp;</i>ตรวจสถานะการซ่อม</h1></center>
				<br><br>
				<div class="row">
					
				</div>
			</div>
		</section>


		<?php include("footer.php");?>



		<!-- Popup-Box-JavaScript -->
		<script src="js/jquery.chocolat.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.w3portfolioaits-item a').Chocolat();
			});
		</script>
		<!-- //Popup-Box-JavaScript -->
		<script src="js/jarallax.js"></script>
		<script src="js/SmoothScroll.min.js"></script>
		<script type="text/javascript">
			/* init Jarallax */
			$('.jarallax').jarallax({
				speed: 0.5,
				imgWidth: 1366,
				imgHeight: 768
			})
		</script>
		<!-- here starts scrolling icon -->
		<script type="text/javascript">
			$(document).ready(function() {
				/*
					var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
					};
					*/
					
					$().UItoTop({ easingType: 'easeOutQuart' });
					
				});
			</script>
			
			<!-- start-smooth-scrolling -->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
			</script>
			<!-- /ends-smooth-scrolling -->
			<!-- //here ends scrolling icon -->
			<script src="js/owl.carousel.js?v=1001"></script>
			<script>
				$(document).ready(function() {
					$("#owl-demo").owlCarousel({
						items : 7,
						lazyLoad : true,
						autoPlay : true,
						navigation : false,
						navigationText :  false,
						pagination : false,
					});
				});
			</script>

			<script src="js/bootstrap-touch-slider.js"></script>
			
		</body>
		</html>