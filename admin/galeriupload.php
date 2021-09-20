

<head>


    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="assets/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.css" rel="stylesheet">
</head>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Birden Fazla Resim Yükleme </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>
Çoklu yükleme için birden fazla dosyayı aşağıdaki kutuya sürükleyin veya dosyaları seçmek için tıklayın.</p>
                        <form action="form-upload.php" class="dropzone"></form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- /page content -->



<?php include 'include/footer.php'; ?>

<!-- jQuery -->
<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/ccs/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="assets/vendors/nprogress/nprogress.js"></script>
<!-- Dropzone.js -->
<script src="assets/vendors/dropzone/dist/min/dropzone.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="assets/js/custom.js"></script>
