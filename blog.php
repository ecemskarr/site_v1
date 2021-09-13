
<?php include 'header.php'; ?>





<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=$ayar->site_baslik ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

 

  <!-- Start Bottom Header -->
 
  <!-- END Header -->
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="page-head-blog">
            <div class="single-blog-page">
             
            </div>
            <?php 
            $haber=DB::get("select * from haber");
            ?>
            <div class="single-blog-page">
              <!-- recent start -->
              <div class="left-blog">
                <h4>Son Haberler</h4>
                <div class="recent-post">
                  <!-- start single post -->
<?php 
foreach($haber as $row){

?>
                  <div class="recent-single-post">
                    <div class="post-img">
                      <a href="#">
												   <img src="admin/assets/upload/<?= $row->resim ?>" alt="" hight="67" width="108">
												</a>
                    </div>
                    <div class="pst-content">
                      <p><a href="#"> <?= $row->baslik ?></a></p>
                    </div>
                  </div>
                  <!-- End single post -->
                  <!-- start single post -->
                 <?php } ?> 
                </div>
              </div>
              <!-- recent end -->
            </div>
            <?php
$calismalarim=DB::get("select * from haber")
?> 
            <div class="single-blog-page">
              <div class="left-blog">
                <h4>Arşiv</h4>
                <ul>
                <?php 
foreach($calismalarim as $row){

?>
                  <li>
                    <a href="#" ><?=$row->zaman?></a>
                  </li>
                 <?php } ?>
                </ul>
              </div>
            </div>
            <div class="single-blog-page">
              <div class="left-tags blog-tags">
                
              </div>
            </div>
          </div>
        </div>
        <?php
$calismalarim=DB::get("select * from haber")
?>
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
        <?php 
        
        foreach($calismalarim as $row){
  
        ?> 
        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog-details.php">
											<img src="admin/assets/upload/<?= $row->resim ?>" alt="">
										</a>
                </div>
                <div class="blog-meta">
                
                  <span class="date-type">
											<i class="fa fa-calendar"></i><?= $row->zaman ?>
										</span>
                </div>
                <div class="blog-text">
                  <h4>
											<a href="#"><?= $row->baslik ?></a>
										</h4>
                  <p>
                  <?= $row->aciklama ?>
                  </p>
                </div>
                <span>
										<a href="blog-details.php?id=<?=$row->id?>" class="ready-btn">Devamını Oku</a>
									</span>
              </div>
            </div>

            
            <!-- End single blog -->
            
            <!-- End single blog -->
           
<?php } ?>
<div class="blog-pagination">
              <ul class="pagination">
                <li><a href="#">&lt;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->

  <div class="clearfix"></div>

<?php include 'footer.php' ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
