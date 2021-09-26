<?php include 'include/header.php'; 
require 'class.upload.php';
ob_start();
$userId = $_SESSION["userId"];
?>
 <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referans Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label > Resim</label>
    <input type="file" name="resim" >
</div>

<?php

$categories = DB::get("select * from kategoriler"); // tüm kategorileri listeleme
/* $firstCategory = DB::getRow("select * from kategoriler where id=1");
echo $firstCategory->id;
echo $firstCategory->kategoriAd;
$title = DB::getVar("select kategoriAd from kategoriler where id=1");
echo $title; */
?>



<div class="form-group">
    <label > Kategori Seç</label>
  <select name="kategori_id" >

<?php 

foreach($categories as $item) {
    ?>
    <option value="<?php echo $item->id; ?>"> <?php echo $item->kategoriAd; ?> </option>
    <?php
}

?>

  </select>
</div>
<div class="form-group">
    <label >Referans Adı</label>
    <textarea name="referansAd" class="form-control" placeholder="Referans Adı Giriniz"></textarea>
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
    $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 1 ");
if(count ($yetki)>0){
    $image=new upload($_FILES['resim']);
    if($image->uploaded){
        $image->image_resize = true;
        $image->image_ratio_crop = true;
        $image->image_x = 330;
        $image->image_y = 340;
        $image->Process('referanslar/');
 
if($image->processed)
{   $image_name=$image->file_dst_name;
    $ekle=DB::prepare("INSERT INTO referans SET 
                     resim=:resim,
                     kategori_id=:kategori_id,
                     referansAd=:referansAd
                   
                    ");
$ekle->execute([
    "resim"  => $image_name,
    "kategori_id" => $_POST["kategori_id"],
    "referansAd" => $_POST["referansAd"],
   
 
]);
if($ekle){
    echo "Ekleme işlemi başarılı";
    header("location:referans.php");
}
else{
    echo "Bir hata oluştu";
}
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
}
?>


    <?php include 'include/footer.php'; ?>