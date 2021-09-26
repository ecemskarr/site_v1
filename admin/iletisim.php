<?php include 'include/header.php'; ?>
<section class="content-header">
        <h1>
        Admin Paneli
           
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Anasayfa</a></li>
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
                            <label> Harita </label>
                            <textarea name="map" class="form-control"><?=$iletisim->map; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label> Facebook </label>
                            <textarea name="facebook" class="form-control"><?=$iletisim->facebook; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label> Twitter </label>
                            <textarea name="twitter" class="form-control"><?=$iletisim->twitter; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label> Google </label>
                            <textarea name="google" class="form-control"><?=$iletisim->google; ?></textarea>
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
    $id=$_SESSION['id'];
    $permissions=DB::get("select * from user_permissions where userId=$id and permissionId=5 ");
    $deger=count($permissions);
    if($deger>=1){
    $guncelle= DB::prepare("UPDATE iletisim SET tel=:tel, email=:email, adres=:adres, facebook=:facebook, twitter=:twitterr, google=:google WHERE id=:id");
    $guncelle->execute([
        "tel" => $_POST["tel"],
        "email" => $_POST["email"],
        "adres" => $_POST["adres"],
        "facebook" => $_POST["facebook"],
        "twitter" => $_POST["twitter"],
        "google" => $_POST["google"],
        "id" => 1
    ]);
    if($guncelle){
        echo "Güncelleme işlemi başarılı";

    }
    else{
        echo "Bir hata oluştu";
    }
}else{
    echo "<script>
    Swal.fire({
       
        icon: 'error',
        title: 'Yetkisiz işlem',
        showConfirmButton: false
      
      })
    </script>";  
}
}
?>




<!-- /.content -->
<?php include 'include/footer.php'; ?>