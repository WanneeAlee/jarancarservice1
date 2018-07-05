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
  
  <section class="bg-gray">
 
    <div class="container">
    <?php include("navigator.php");?> 
      <br>
      <div class="row">

        <?php include("magizoom.php");?>

        <div class="col-lg-3">
         <?php include("menu-left.php");?>
       </div>


       <div class="col-lg-9 bg-white">

         <div class="col-lg-7 col-md-7 col-sm-12">

          <div class=app-figure id=zoom-fig>
            <a id=Zoom-1 class=MagicZoom title="Product Name" href=upload/p01.jpg>
              <img title="Choose the right  product every time!" src=upload/p01.jpg alt="Product Name" title="Product Name"/>
            </a>

            <div class=selectors>
              <div id="o02" class="owl-carousel">

                <div class="item" style="padding: 0px 0px;">
                  <a data-zoom-id=Zoom-1 title="Product Name" href=upload/p02.jpg data-image=upload/p02.jpg>
                    <img title="Choose the right  product every time!" srcset=upload/p02.jpg src=upload/p02.jpg title="Product Name" alt="Product Name"/>
                  </a>
                </div>

                <div class="item" style="padding: 0px 0px;">
                  <a data-zoom-id=Zoom-1 title="Product Name" href=upload/p03.jpg data-image=upload/p03.jpg>
                    <img title="Choose the right  product every time!" srcset=upload/p03.jpg src=upload/p03.jpg title="Product Name" alt="Product Name"/>
                  </a>
                </div>

                <div class="item" style="padding: 0px 0px;">
                  <a data-zoom-id=Zoom-1 title="Product Name" href=upload/p04.jpg data-image=upload/p04.jpg>
                    <img title="Choose the right  product every time!" srcset=upload/p04.jpg src=upload/p04.jpg title="Product Name" alt="Product Name"/>
                  </a>
                </div>

                <div class="item" style="padding: 0px 0px;">
                  <a data-zoom-id=Zoom-1 title="Product Name" href=upload/p05.jpg data-image=upload/p05.jpg>
                    <img title="Choose the right  product every time!" srcset=upload/p05.jpg src=upload/p05.jpg title="Product Name" alt="Product Name"/>
                  </a>
                </div>

                <div class="item" style="padding: 0px 0px;">
                  <a data-zoom-id=Zoom-1 title="Product Name" href=upload/p05.jpg data-image=upload/p05.jpg>
                    <img title="Choose the right  product every time!" srcset=upload/p05.jpg src=upload/p05.jpg title="Product Name" alt="Product Name"/>
                  </a>
                </div>

              </div> <!--  close owl -->
            </div>
          </div>

        </div> <!-- close col7 -->

        <div class="col-lg-5 col-md-5">
          <br>
          <h6>ตู้แช่เย็นยืน 2 ประตู<br>
          SPM,SPE,MPM,SPA</h6>
          <h5 class="colorred02">฿14,000</h5>
          <a title="Wear strip Profile" href="upload/cat01.pdf" class="btn btn-primary btn-sm " target="_blank" style="margin-top:5px"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
          <br>
          <br class="hidden-lg">
          <h5 class="back" style="margin-bottom: 5px;">เเชร์</h5>
          <a href="https://www.facebook.com/" target="_blank"><span><img src="images/s1.png" alt="facebook" title="facebook"></span></a>
          <a href="https://www.instagram.com/?hl=th" target="_blank"><span><img src="images/s2.png" alt="instagram" title="instagram"></span></a>
          <a href="https://lineit.line.me/" target="_blank"><span><img src="images/s3.png" alt="line" title="line"></span></a>
          <a href="https://plus.google.com/" target="_blank"><span><img src="images/s4.png" alt="google +" title="google +"></span></a>
          <div class="clearfix"></div>
          <br>
        </div>

        <br class="visible-sm visible-xs">

        <div class="col-lg-12 col-xs-12">
          <br>
          <p class=page-header style="margin:0 0 18px"></p>
          <h4>รายละเอียดของสินค้า</h4>
          <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h6>
          <br>
          <br>
        </div>
        <div class="clearfix"></div>

      </div> <!-- close col9 -->

    </div> <!-- close row -->

  </div><!-- close container -->

  <br>
  <br>

</section>

<?php include("footer.php");?>

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootsnav.js"></script>


</body>

</html>

<script src="js/swiper.jquery.js"></script>

<script>
  var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    paginationClickable: true,
    spaceBetween: 0,
    centeredSlides: true,
    speed: 1500,
    autoplay: 2500,
    autoplayDisableOnInteraction: false,
         effect: 'slide', // 'slide' or 'fade' or 'cube' or 'coverflow' or 'flip'
         coverflow: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows : true
        },
        flip: {
          slideShadows : true,
          limitRotation: true
        },
        cube: {
          slideShadows: true,
          shadow: true,
          shadowOffset: 20,
          shadowScale: 0.94
        },
        fade: {
          crossFade: false
        },
        loop: true,
      });
    </script>

    <script src="js/owl.carousel.js"></script>


    <script type="text/javascript">

      $('#o02').owlCarousel({
        rtl:false,
        loop:true,
        margin:10,
        nav:true,
        navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsive:{
          0:{
            items:3
          },
          600:{
            items:3
          },
          1000:{
            items:3
          }
        }
      })
    </script>

    <script src=js/magiczoomplus.js type=text/javascript></script>
    <script src=js/ekko-lightbox.js></script>
    <script type=text/javascript>$(document).on("click",'[data-toggle="lightbox"]',function(a){a.preventDefault();$(this).ekkoLightbox()});</script>

    <script src="js/SmoothScroll.min.js"></script>
    <?php include("bt.php");?>