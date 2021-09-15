<?php include 'include/header.php';  ?>
<head>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box">
                <div class="box-header">Haber Ayarları</div>
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Resim</label>
                            <input type="file" name="resim">
                        </div>

                        <div class="form-group">
                            <label>Haber Başlığı</label>
                            <textarea name="baslik" class="form-control"
                               ></textarea>
                        </div>
                        <div class="form-group">
    <label > Haber İçerik </label>
    <textarea id="editor1" class="ckeditor" name="aciklama"></textarea>
</div>
<script type="text/javascript">
CKEDITOR.reeplace('editor1',
{
filebrowserBrowserUrl:'ckfinder/ckfinder.html',
filebrowserImageBrowserUrl:'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowserUrl:'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
forcePasteAsPlainText: true
}

);

</script>

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
    $ekle=DB::prepare("INSERT INTO haber SET 
                     resim=:resim,
                     baslik=:baslik,
                     aciklama=:aciklama
                   
                    ");
$ekle->execute([
    "resim"  => $resimAdi,
    "baslik" => $_POST["baslik"],
    "aciklama" => $_POST["aciklama"]
   
 
]);
if($ekle){
    echo "Ekleme işlemi başarılı";
    header("location:haber.php");
}
else{
    echo "Bir hata oluştu";
}
}


}


?>
<?php include 'include/footer.php'; ?>