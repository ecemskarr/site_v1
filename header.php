<?php require 'connection.php'; ?>

<header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                  <!--<h1><span>e</span>Business</h1> -->
                  <!-- Uncomment below if you prefer to use an image logo -->
                   <img src="admin/assets/upload/<?= $ayar->site_logo ?> "  alt="" height="40" width="40"> 
                  
                
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="index.php">Anasayfa</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="index.php#about">Hakkımızda</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="index.php#services">Hizmetlerimiz</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="index.php#team">Galeri</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="index.php#portfolio">Referanslarımız</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="index.php#blog">Haberler</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="iletisim.php">İletişim</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->