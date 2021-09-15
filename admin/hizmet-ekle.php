<?php include 'include/header.php';  ?>
<section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Hizmetlerimiz Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">







<div class="form-group">
    <label >Hizmet Adı</label>
    <textarea name="hizmetAdi" class="form-control" placeholder="Hizmet Adı Giriniz"></textarea>
</div>
<div class="form-group">
    <label >Hizmet Açıklama</label>
    <textarea name="hizmetAciklama" class="form-control" placeholder="Hizmet Açıklama Giriniz"></textarea>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary">Ekle</button>
</div>
</form>
</div>
             </div>
            </div>
        </div>

    </section>


 <?php 
 if($_POST)
 {
 
 
     $ekle=DB::prepare("INSERT INTO hizmetlerimiz SET 
                     
                     hizmetAdi=:hizmetAdi,
                     hizmetAciklama=:hizmetAciklama
                    
                     ");
 $ekle->execute([
     
     "hizmetAdi" => $_POST["hizmetAdi"],
     "hizmetAciklama" => $_POST["hizmetAciklama"]
    
  
 ]);
 if($ekle){
     echo "Ekleme işlemi başarılı";
     header("location:hizmet.php");
 }
 else{
     echo "Bir hata oluştu";
 }
 
 
 
 }
 
 
 ?>   
    <?php include 'include/footer.php'; ?>