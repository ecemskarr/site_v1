 <!-- Start Footer bottom Area -->
 <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2>Step Soft Yazılım</h2>
                </div>

                <p>Amacımız, şirketlerin yaratılan yazılım programlarından yararlanabilmesi ve uzun süre başarılı olabilmesi için doğru zamanda doğru iş büyütme hizmetlerini sunmaktır.</p>
                <div class="footer-icons">
                  <ul>
                  <?php 
$iletisim = DB::getRow("SELECT * FROM iletisim ");
?>
                    <li>
                      <a href="<?=$iletisim->facebook?>"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="<?=$iletisim->twitter?>"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="<?=$iletisim->google?>"><i class="fa fa-google"></i></a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>İletişim</h4>
                <p>
                 7/24 Destek
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> <?=$iletisim->tel; ?></p>
                  <p><span>Email:</span> <?=$iletisim->email; ?></p>
                  <p><span>Çalışma Saatleri:</span> 8:30-17:30</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy;Copyright  <strong>2020 Tüm Hakları Saklıdır</strong> 
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
            <!--  Designed by <a href="index.php">BootstrapMade</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>