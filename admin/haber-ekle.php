<?php include 'include/header.php'; 
require 'class.upload.php'; 
$userId = $_SESSION["userId"]; 
?>
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
    $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 1 ");
    if(count ($yetki)>0){
        $image=new upload($_FILES['resim']);
        if($image->uploaded){
            $image->image_resize = true;
            $image->image_ratio_crop = true;
            $image->image_x = 360;
            $image->image_y = 360;
            $image->Process('haberler/');
            if($image->processed){
              $image_name=$image->file_dst_name;
    $ekle=DB::prepare("INSERT INTO haber SET 
                     resim=:resim,
                     baslik=:baslik,
                     aciklama=:aciklama,
                     durum=:durum
                   
                    ");
$ekle->execute([
    "resim"  => $image_name,
    "baslik" => $_POST["baslik"],
    "aciklama" => $_POST["aciklama"],
    "durum" =>1
   
 
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
<?php include 'include/footer.php'; ?>