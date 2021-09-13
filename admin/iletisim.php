<?php include 'include/header.php'; ?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<?php 
$iletisim = DB::getRow("SELECT * FROM iletisim WHERE id=1");
?>
<!-- Main content -->
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box">
                <div class="box-header">İletişim Ayarları</div>
                <div class="box-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label> Telefon</label>
                            <textarea name="tel" class="form-control"><?=$iletisim->tel; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label> Email</label>
                            <textarea name="email" class="form-control"><?=$iletisim->email; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label> Adres </label>
                            <textarea name="adres" class="form-control"><?=$iletisim->adres; ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<?php 

if($_POST){
    $guncelle= DB::prepare("UPDATE iletisim SET tel=:tel, email=:email, adres=:adres WHERE id=:id");
    $guncelle->execute([
        "tel" => $_POST["tel"],
        "email" => $_POST["email"],
        "adres" => $_POST["adres"],

        "id" => 1
    ]);
    if($guncelle){
        echo "Güncelleme işlemi başarılı";

    }
    else{
        echo "Bir hata oluştu";
    }
}

?>




<!-- /.content -->
<?php include 'include/footer.php'; ?>