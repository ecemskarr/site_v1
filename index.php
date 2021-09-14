<?php include 'header.php'; ?>

<?php 
$anasayfa=DB::getRow("SELECT * FROM anasayfa WHERE id=2");


?>

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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
        rel="stylesheet">

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



    <!-- Start Slider Area -->
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="img/slider/slider1.jpg" alt="" title="#slider-direction-1" />
                <img src="img/slider/slider2.jpg" alt="" title="#slider-direction-2" />
                <img src="img/slider/slider3.jpg" alt="" title="#slider-direction-3" />
            </div>

            <!-- direction 1 -->
            <div id="slider-direction-1" class="slider-direction slider-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <h2 class="title1"><?= $anasayfa->baslik ?> </h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2"><?= $anasayfa->aciklama ?></h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">Hizmetlerimizi
                                        Görüntüleyin</a>
                                    <a class="ready-btn page-scroll" href="#about">Daha fazla bilgi edinin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content text-center">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <!--<h2 class="title1">The Best Business Information </h2> -->
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <!-- <h1 class="title2">We're In The Business Of Get Quality Business Service</h1> -->
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">Hizmetlerimizi Görüntüleyin</a>
                                    <a class="ready-btn page-scroll" href="#about">Daha Fazla Bilgi Edinin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 3 -->
            <div id="slider-direction-3" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <!-- <h2 class="title1">The Best business Information </h2> -->
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <!--    <h1 class="title2">Helping Business Security  & Peace of Mind for Your Family</h1> -->
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">Hizmetlerimizi Görüntüleyin</a>
                                    <a class="ready-btn page-scroll" href="#about">Daha fazla bilgi edinin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->
    <?php 
   $hakkimizda=DB::getRow("SELECT * FROM hakkimizda WHERE id=1");
   

?>
    <!-- Start About area -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Hakkımızda</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <!-- <a href="#">
								  <img src="admin/assets/upload/" alt="">
								</a> -->
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/<?= $hakkimizda->video ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <a href="#">
                                <!--    <h4 class="sec-head">project Maintenance</h4> -->
                            </a>
                            <p> <?= $hakkimizda->aciklama ?></p>
                            <!-- <ul>
                <li>
                  <i class="fa fa-check"></i> Interior design Package
                </li>
                <li>
                  <i class="fa fa-check"></i> Building House
                </li>
                <li>
                  <i class="fa fa-check"></i> Reparing of Residentail Roof
                </li>
                <li>
                  <i class="fa fa-check"></i> Renovaion of Commercial Office
                </li>
                <li>
                  <i class="fa fa-check"></i> Make Quality Products
                </li>
              </ul> -->
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div>
    <!-- End About area -->
    <?php 
$calismalarim=DB::get("SELECT * FROM hizmetlerimiz");

?>
    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>Hizmetlerimiz</h2>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="services-contents">
                    <!-- Start Left services -->

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?php 
								
								foreach($calismalarim as $row){
								
								?>
                        <div class="about-move">

                            <div class="services-details">
                                <div class="single-services">

                                    <a class="services-icon" href="#">
                                        <!--   <i class="fa fa-code"></i> -->
                                    </a>
                                    <h4><?= $row->hizmetAdi?></h4>
                                    <p>
                                        <?= $row->hizmetAciklama?>
                                    </p>
                                </div>

                            </div>

                            <!-- end about-details -->
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- End Service area -->


    <?php 
$calismalarim=DB::get("SELECT * FROM galeri");

?>

    <!-- Start team Area -->
    <div id="team" class="our-team-area area-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Galeri</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
								
								foreach($calismalarim as $row){
								
								?>
                <div class="team-top">
                    <div class="col-md-3 col-sm-3 col-xs-12">

                        <div class="single-team-member">
                            <div class="team-img">
                                <a href="#">
                                    <img src="admin/assets/upload/<?= $row->resim ?>" alt="">
                                </a>

                            </div>
                            <div class="team-content text-center">
                                <h4><?= $row->aciklama ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- End column -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Team Area -->

    <!-- Start reviews Area -->
    <div class="reviews-area hidden-xs" style="position: relative; top:25px!important;">
        <div class="work-us">
            <div class="work-left-text">
                <a href="#">
                    <img src="img/about/2.jpg" alt="">
                </a>
            </div>
            <div class="work-right-text text-center">
                <h2>Step Soft Yazılım</h2>
                <h5>Amacımız, şirketlerin yaratılan yazılım programlarından yararlanabilmesi ve uzun süre başarılı olabilmesi için doğru zamanda doğru iş büyütme hizmetlerini sunmaktır.</h5>
                <a href="iletisim.php" class="ready-btn">Bizimle İletişime Geçin</a>
            </div>
        </div>
    </div>
    <!-- End reviews Area -->
    <?php

$categories = DB::get("select * from kategoriler"); 

?>
    <!-- Start portfolio Area -->
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Referanslarımız</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Portfolio -page -->
                <div class="awesome-project-1 fix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="awesome-menu ">
                            <ul class="project-menu">
                                <li>
                                    <a href="#" class="active" data-filter="*">Tümü</a>
                                </li>
                                <?php 
								
								foreach($categories as $row){
                  ?>
                                <li>
                                    <a href="#" data-filter="<?=".kategori_".$row->id?>"><?=$row->kategoriAd?></a>
                                </li>
                                <?php 
                }
								?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
          $calismalarim=DB::get("SELECT * FROM referans ");
?>
                <div class="awesome-project-content">
                    <!-- single-awesome-project start -->
                    <?php 
								
								foreach($calismalarim as $row){
                  ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 <?php echo "kategori_" . $row->kategori_id ?>">
                        <div class="single-awesome-project">
                            <div class="awesome-img">
                                <a href="#"><img src="admin/assets/upload/<?=$row->resim?>" alt="" /></a>
                                <div class="add-actions text-center">
                                    <div class="project-dec">
                                        <a class="venobox" data-gall="myGallery"
                                            href="admin/assets/upload/<?=$row->resim?>">

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                    <!-- single-awesome-project end -->
                    <!-- single-awesome-project start -->

                </div>
            </div>
        </div>
    </div>
    <!-- awesome-portfolio end -->

    
    <!-- Start Blog Area -->
    <?php
$calismalarim=DB::get("select * from haber")
?>
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Haberler</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Left Blog -->
                    <?php 
foreach($calismalarim as $row){

?>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="blog.php">
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
                                    <a href="blog.php"><?= $row->baslik ?></a>
                                </h4>
                                <p>
                                <?= $row->aciklama ?>
                                </p>
                            </div>
                            <span>
                                <a href="blog.php" class="ready-btn">Devamını Oku</a>
                            </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    <?php } ?>
                    <!-- End Left Blog-->
                    <!-- Start Left Blog -->

                    <!-- End Left Blog-->
                    <!-- Start Right Blog-->

                    <!-- End Right Blog-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->


    


    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  
    <?php include 'footer.php'; ?>
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