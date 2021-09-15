<?php include 'include/header.php'; 

ob_start();

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
$resimAdi=$_FILES["resim"]["name"];
$resimYolu="assets/upload/".$resimAdi;
if(move_uploaded_file($_FILES["resim"]["tmp_name"],$resimYolu))
{
    $ekle=DB::prepare("INSERT INTO referans SET 
                     resim=:resim,
                     kategori_id=:kategori_id,
                     referansAd=:referansAd
                   
                    ");
$ekle->execute([
    "resim"  => $resimAdi,
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


}

?>


    <?php include 'include/footer.php'; ?>