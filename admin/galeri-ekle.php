<?php include 'include/header.php'; 

ob_start();

?>
    <html>
        <body>
            <style>
                    .center
{
   position: absolute;

   right: 0px;

   

   
}
            </style>
        </body>
    </html>


<section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Galeri Ayarları
<button type="submit" class="btn btn-primary center" onclick="window.location.href='galeriupload.php';"> Birden Fazla Resim Ekle</button>
</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label > Resim</label>
    <input type="file" name="resim"  >
</div>
<div class="form-group">
    <label > Açıklama</label>
    <textarea name="aciklama" class="form-control" placeholder="Açıklama Giriniz"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Ekle</button>
</div>
</form>
</div>
             </div>
            </div>
        </div>
        
        <!-- /page content -->
    </section>




    

<?php 

if($_POST)
{
if(!file_exists("galeri"))
{
    mkdir("galeri");
}

$dizin="galeri/";
$resimAdi=$_FILES["resim"]["name"];
$yuklenecekResim=$dizin.$resimAdi;

if(move_uploaded_file($_FILES["resim"]["tmp_name"],$yuklenecekResim))
{
    $ekle=DB::prepare("INSERT INTO galeri SET 
    resim=:resim,
   aciklama=:aciklama
  
   ");
$ekle->execute([
"resim"  => $resimAdi,
"aciklama" => $_POST["aciklama"]


]);
}
if($ekle){
    echo "Ekleme işlemi başarılı";

   
   header("location:galeri.php");
   
}
else{
    echo "Bir hata oluştu";
}
}



?>
   <!-- jQuery -->
 
    
    <?php include 'include/footer.php'; ?>