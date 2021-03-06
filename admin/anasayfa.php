
<?php include 'include/header.php'; 
?>
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
$anasayfa = DB::getRow("SELECT * FROM anasayfa WHERE id=2");


?>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
                <div class="box-header">Anasayfa Ayarları</div>
                <div class="box-body">
                <form action="" method="post">
                <div class="form-group">
                    <label > Başlık</label>
                    <textarea name="baslik" class="form-control"><?=$anasayfa->baslik; ?></textarea>
                </div>
                <div class="form-group">
                    <label > Açıklama</label>
                    <textarea name="aciklama" class="form-control"><?=$anasayfa->aciklama; ?></textarea>
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


    $guncelle= DB::prepare("UPDATE anasayfa SET baslik=:baslik, aciklama=:aciklama WHERE id=:id");
    $guncelle->execute([
        "baslik" => $_POST["baslik"],
        "aciklama" => $_POST["aciklama"],
        "id" => 2
    ]);
    if($guncelle){
        echo "<script>
        Swal.fire(
            'Güncelleme İşlemi başarılı',
            'Butona tıklayın',
            'success'
          )
        </script>";  

    }
    else{
        echo "Bir hata oluştu";
    }
   
}
else{
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
