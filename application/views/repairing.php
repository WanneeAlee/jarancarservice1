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
				<center><h1 style="font-size: 50px; color: #000"><i class="fa fa-calendar-plus-o" aria-hidden="true" style="color: #ffa100">&nbsp;</i>จองการซ่อม</h1></center>
				<br><br>
				<div class="row">
					<div class="col-md-6"><br><br><br><br>
						<!-- <img src="images/r1.jpg" title="r&j" width="100%"><br><br> -->
						<img src="images/g8.jpg" title="r&j" width="100%"><br>
					</div>
					<div class="col-md-6">
						<br><br><br><br>
						<div class="alert alert-success">
							<form id="main-contact-form" name="contact-form" method="post" action="<?= base_url('repairing/insert_car');?>">
								<center><span style="font-size: 25px">จองซ่อม</span></center><br><br>
								<div class="row ">
									<div class="col-lg-6" >
										<div class="form-group">
											<input type="text" name="name" class="form-control" placeholder="ชื่อ" required="required">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" name="subject" class="form-control" placeholder="นามสกุล" required="required">
										</div>
									</div>
								</div>
								<div class="row ">
									<div class="col-lg-6" >
										<div class="form-group" >
											<input type="text" name="name" class="form-control" placeholder="เบอร์โทรศัพท์" required="required">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" name="subject" class="form-control" placeholder="อีเมลล์" required="required">
										</div>
									</div>  
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" name="subject" class="form-control" placeholder="ทะเบียนรถ" required="required">
										</div>
									</div> 
									<div class="col-lg-12">
										<div class="form-group">
											<input type="file" name="subject" class="form-control" placeholder="ทะเบียนรถ" required="required">
										</div>
									</div>                                
								</div>

								<div class="form-group">
									<textarea name="message" id="message" class="form-control" rows="4" placeholder="อาการเบื้องต้น" required="required" style="height: 100px;" ></textarea>
								</div>



								<div class="row ">
									<div class="col-lg-6" >

									</div>
									<div class="col-lg-6" ></div>
								</div>
								<div class="row ">
									<div class="col-lg-6" >

									</div>
									<div class="col-lg-6">

									</div>
								</div>

								<!-- <div class="form-group">
									<textarea name="message" id="message" class="form-control" rows="4" placeholder="ที่อยู่" required="required" style="height: 100px;" ></textarea>
								</div> --> 

								<p style="color: #ff0000">*วันที่จะนำรถมาซ่อม </p> 


             <div class="row">
                 <div class="col-lg-2 col-md-2 col-sm-2">
                     <div class="form-group">
                     <select name="Date" class="form-control">
                            <option value="" selected="">วัน</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="form-group">
                    <select name="Month" class="form-control" size="1"> 
                        <option value="" selected="">เดือน</option> 
                        <option value="1">มกราคม</option><option value="2">กุมภาพันธ์</option><option value="3">มีนาคม</option><option value="4">เมษายน</option><option value="5">พฤษภาคม</option><option value="6">มิถุนายน</option><option value="7">กรกฎาคม</option><option value="8">สิงหาคม</option><option value="9">กันยายน</option><option value="10">ตุลาคม</option><option value="11">พฤศจิกายน</option><option value="12">ธันวาคม</option>  </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="form-group">
                    <select name="Year" class="form-control" size="1"> 
                      <option value="2561">2561</option>
                      


                  </select>
              </div>
          </div>

								<div class="form-group" style="    margin-top: 5px;">
									<center>
										<div><img src="images/Captcha-demo.gif" width="280" height="76" alt=""/></div><br>
										<button type="submit" href="" class="btn btn-warning btn-lg text-uppercase" style="    padding: 4px 30px;">ส่ง</button> 
										<button type="submit" href="" class="btn btn-warning btn-lg text-uppercase" style="    padding: 4px 30px;">ยกเลิก</button>
									</center>
									
								</div>
							</form>  
						</div>
					</div>
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