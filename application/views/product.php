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
  <link href="fontawesome-free-5.0.6/on-server/css/fontawesome-all.css" rel="stylesheet">
  <link href="css/icon.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/bootsnav.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/grid.css" rel=stylesheet>
  <link rel="stylesheet" href="css/bg.css">
  <link href="css/snow.css" rel="stylesheet">


</head>

<body>
  <?php include("header.php");?>

  <section class="bg">
    <br>
    <div class="container bg-white">
   <?php include("navigator.php");?>  
    
    <br><center><h3 style="font-size: 30px; color: #000"><i class="fa fa-cart-plus" aria-hidden="true" style="color: #ff4141"></i>&nbsp;สินค้า</h3><br></center>            

      <div class="row">

        <div class="">
          <div class="category-menu">
            <ul>
              <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->

              <li class="cat-active" category="prod-cnt">
                <center>
                  <img class="imgcat"  src="images/box01.png">
                  <h5 class="colorwhite">ดูสินค้าทั้งหมด</h5>
                </center>
              </li>

              <li class="" category="cat-1">
                <center>
                  <img class="imgcat" src="images/box02.png">
                  <h5 class="colorwhite">เครื่องจ่ายน้ำผลไม้</h5>
                </center>
              </li>

              <li class="" category="cat-2">
                <center>
                  <img class="imgcat" src="images/box03.png">
                  <h5 class="colorwhite">ชั้นวางสินค้า</h5>
                </center>
              </li>
              <li class="" category="cat-3">
                <center>
                  <img class="imgcat" src="images/box04.png">
                  <h5 class="colorwhite">ชั้นวางเค้ก</h5>
                </center>
              </li>
              <li class="" category="cat-4">
                <center>
                  <img class="imgcat" src="images/box05.png">
                  <h5 class="colorwhite">ตู้แช่เย็น</h5>
                </center>
              </li>
              <li class="" category="cat-5">
                <center>
                  <img class="imgcat" src="images/box06.png">
                  <h5 class="colorwhite">สแตนเลส</h5>
                </center>
              </li>

            </ul>
          </div>

        </div>
        <div class="clear"></div>

        <br class="hidden-xs">
        <br>
        <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->

        <div class="">
          <?php for($i=1;$i<=4;$i++){ ?>

          <!-- e-com box prod-box -->
          <?php for($s=1;$s<=5;$s++){ ?>
          <a href="<?= base_url('product-detail'); ?>" title="CURVE">
            <div class="">
              <div class="prod-cnt col-md-3  cat-<?=$s?> about-icon">
                <div class="thumbnail">
                  <img src="upload/p0<?=$s?>.jpg" alt="Avatar" class="image img-responsive">
                </div>

                <div class="col-md-12">
                  <h6>ตู้แช่เย็นยืน 2 ประตู<br>
                    SPM,SPE,MPM,SPA</h6>
                    <h5 class="colorred02">฿14,000</h5>
                    <br class="hidden-xs">
                    <br>
                  </div>

                </div>
              </div>
            </a>
            <?php } ?> 

            <!-- end e-com box prod-box -->

            <?php } ?> 

          </div>
          <div class="clearfix"></div>

        </div>

      </div>
      <br>
    </section>

    <?php include("footer.php");?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootsnav.js"></script>


  </body>

  </html>

  <script type="text/javascript" src="js/jquery.cookie.js"></script>

  <script>
    $(function(){
    var default_view = 'grid'; // choose the view to show by default (grid/list)
    
    // check the presence of the cookie, if not create "view" cookie with the default view value
    if($.cookie('view') !== 'undefined'){
      $.cookie('view', default_view, { expires: 7, path: '/' });
    } 
    function get_grid(){
      $('.list').removeClass('list-active');
      $('.grid').addClass('grid-active');
      $('.prod-cnt').animate({opacity:0},function(){
        $('.prod-cnt').removeClass('prod-box-list');
        $('.prod-cnt').addClass('prod-box');
        $('.prod-cnt').stop().animate({opacity:1});
      });
    } // end "get_grid" function
    function get_list(){
      $('.grid').removeClass('grid-active');
      $('.list').addClass('list-active');
      $('.prod-cnt').animate({opacity:0},function(){
        $('.prod-cnt').removeClass('prod-box');
        $('.prod-cnt').addClass('prod-box-list');
        $('.prod-cnt').stop().animate({opacity:1});
      });
    } // end "get_list" function

    if($.cookie('view') == 'list'){ 
        // we dont use the "get_list" function here to avoid the animation
        $('.grid').removeClass('grid-active');
        $('.list').addClass('list-active');
        $('.prod-cnt').animate({opacity:0});
        $('.prod-cnt').removeClass('prod-box');
        $('.prod-cnt').addClass('prod-box-list');
        $('.prod-cnt').stop().animate({opacity:1}); 
      } 

      if($.cookie('view') == 'grid'){ 
        $('.list').removeClass('list-active');
        $('.grid').addClass('grid-active');
        $('.prod-cnt').animate({opacity:0});
        $('.prod-cnt').removeClass('prod-box-list');
        $('.prod-cnt').addClass('prod-box');
        $('.prod-cnt').stop().animate({opacity:1});
      }

      $('#list').click(function(){   
        $.cookie('view', 'list'); 
        get_list()
      });

      $('#grid').click(function(){ 
        $.cookie('view', 'grid'); 
        get_grid();
      });

      $('#list01').click(function(){   
        $.cookie('view', 'list'); 
        get_list()
      });

      $('#grid01').click(function(){ 
        $.cookie('view', 'grid'); 
        get_grid();
      });

      /* filter */
      $('.category-menu ul li').click(function(){
        var CategoryID = $(this).attr('category');
        $('.category-menu ul li').removeClass('cat-active');
        $(this).addClass('cat-active');

        $('.prod-cnt').each(function(){
          if(($(this).hasClass(CategoryID)) == false){
            $(this).css({'display':'none'});
          };
        });
        $('.'+CategoryID).fadeIn(); 

      });
    });
  </script>

  <script src="js/SmoothScroll.min.js"></script>
  <?php include("bt.php");?>