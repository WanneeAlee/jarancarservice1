<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?=asset_url()?>" >
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ar-intercool.com</title>
  <link rel="shortcut icon" href=images/logo1.ico>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
  <link href="css/icon.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/bootsnav.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href=css/swiper.css?v=1001 rel=stylesheet>
  <link href='css/ekko-lightbox.css?ver=4.6.1' rel=stylesheet type=text/css media=all />
  <link href=css/magiczoomplus.css rel=stylesheet type=text/css media="screen"/>  
  <link href="css/owl.carousel.css?v=1001" rel="stylesheet">
  <link href="css/snow.css" rel="stylesheet">


</head>

<body>
  <?php include("header.php");?>
  
  <section class="bg">
    <br>
    <div class="container bg-white">
     <?php include("navigator.php");?>

     <div class="row">
      <div class="col-md-12">
        <br><center><h3 style="font-size: 30px; color: #000"><i class="fa fa-location-arrow" aria-hidden="true" style="color: #ff4141"></i>&nbsp;ติดต่อเรา</h3><br></center>            
        <br>
      </div>
    </div>


    <div class="contact-form ">
      <div class="row">
        <div class="col-sm-6">
         <ul class="address" style="list-style: none;padding-left: 0px; font-size: 18px;">
          <h2 class="green"> ar-intercool.com </h2>
          <li><i class="fa fa-home"></i> <span>Address :</span>  285/59 ตำบล บางกระสอ อำเภอ เมือง จังหวัด นนทบุรี 11000 (สำนักงานใหญ่) </li>
          <li><i class="fa fa-phone"></i> <span>Tel :</span> เบอร์โทรศัพท์ : 062-346-4004   </li>
          <li><i class="fa fa-fax"></i> <span>Fax :</span> 02-589-8603  </li>
          <li><i class="fa fa-envelope"></i> <span>E-mail :</span> <a href="proud_engineering_services@hotmail.com"> proud_engineering_services@hotmail.com</a></li>
          
        </ul>
        <br><br>
        <form method="post" enctype="multipart/form-data" action="<?= base_url('contact/send')?>" id="main-contact-form" name="contact-form">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="ชื่อ - นามสกุล" required="required">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="อีเมล์" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="เบอร์โทรศัพท์" required="required">
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="รายละเอียด" required="required"></textarea>
          </div>
          <div class="form-group">            
            <input type="file" name="attach" class="filestyle" data-buttonText="Choose file" id="BSbtnwarning" style="margin-bottom: 10px;">   
          </div>                     
          <div class="form-group" style="    margin-top: 5px;">
          <script>
              function makeaction(){
                document.getElementById('btn_submit').disabled = false;  
              }
            </script>
            <div class="g-recaptcha" data-callback="makeaction" data-sitekey="6LcSEDoUAAAAAHyi5AK_zlZxpvvOX_E1_M81EO2h"></div><br>
            <!-- <div><img src="images/Captcha-demo.gif" width="280" height="76" alt=""/></div><br> -->
            <button type="submit" href="" class="btn btn-warning btn-lg text-uppercase" style="    padding: 4px 40px;">Send</button> 
            <button type="submit" href="" class="btn btn-warning btn-lg text-uppercase" style="    padding: 4px 40px;">Reset</button>
            <br>
            <br>
          </div>
        </form>   
      </div>

      <div class="col-sm-6">
        <div class="contact-info">
          <div class="clearfix"></div>
          <br>
          <?php include("magizoom.php");?>
          <a title="ar-intercool.com" href="upload/map.jpg" class="MagicZoom" onClick="return hs.expand(this)">
            <img src="upload/map.jpg" class="img-responsive">
          </a>
        </div>                            
      </div>

      <div class="col-lg-6">
        <style type="text/css">
          #map {
            height: 330px;
            width: 100%;
          }
        </style>
        <br>
        <div id="map-wrapper"><div id="map"></div></div>
      </div>

    </div>


    <div class="clearfix"></div>
    <br>

  </div>
</div>
</section>

<?php include("footer.php");?>
<!-- jQuery -->

<script src="js/jquery.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootsnav.js"></script>

<script src="js/jquery.touchSwipe.min.js"></script>

<!-- Bootstrap bootstrap-touch-slider Slider Main JS File -->
<script src="js/bootstrap-touch-slider.js"></script>

<script type="text/javascript">
  $('#bootstrap-touch-slider').bsTouchSlider();
</script>
<script src=js/magiczoomplus.js type=text/javascript></script>


<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script> 
<script> 
  $('#BSbtndanger').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
  }); 
  $('#BSbtnsuccess').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
  }); 
  $('#BSbtninfo').filestyle({ 
    buttonName : 'btn-info', 
    buttonText : ' Select a File' 
  }); 
  $('#icondemo').filestyle({ 
    buttonText : 'แกลอรี่', 
    buttonName : 'btn-warning' 
  }); 
</script>



<script src="js/SmoothScroll.min.js"></script>

<?php include("bt.php");?>

<script src='https://www.google.com/recaptcha/api.js'></script>

</body>

</html>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyD0s6nTQGE0Fb0kduJOGAWcTXlVYn-oO_c"></script>
<script type="text/javascript">
 (function($) {
  "use strict";
  var locations = [
   ['<div class="wd_info-contact"><h4 class="text-primary">ห้างหุ้นส่วนจำกัด พราว เอ็นจิเนียริ่ง เซอร์วิส </h4><span style="color: #333;">ที่อยู่ : 285/59 ตำบล บางกระสอ อำเภอ เมือง จังหวัด นนทบุรี 11000 (สำนักงานใหญ่)<br> <br>เบอร์โทรศัพท์ :  062-346-4004 <br>อีเมล์ : proud_engineering_services@hotmail.com  </span></div></div></div>', 13.8700020, 100.5029565]
  ];

  var map = new google.maps.Map(document.getElementById('map'), {
   zoom: 15,
   scrollwheel: false,
   navigationControl: true,
   mapTypeControl: false,
   scaleControl: false,
   draggable: true,
   styles:[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#ffe500"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#9bdffb"},{"visibility":"on"}]}],
   center: new google.maps.LatLng(13.8700020, 100.5029565),
   mapTypeId: google.maps.MapTypeId.ROADMAP
 });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < locations.length; i++) {  

   marker = new google.maps.Marker({ 
    position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
    map: map ,
    icon: 'images/pin01.png?v=1001'
  });


   google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
     infowindow.setContent(locations[i][0]);
     infowindow.open(map, marker);
   }
 })(marker, i));
 }
})(jQuery);
</script>



