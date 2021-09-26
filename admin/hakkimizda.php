<?php include 'include/header.php'; ?>

<head>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>


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
$anasayfa = DB::getRow("SELECT * FROM hakkimizda WHERE id=1");


?>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Hakkımızda Ayarları</div>
<div class="box-body">
<form action="" method="post" >

<!--
<div class="form-group">
    <label > Açıklama</label>
    <textarea name="aciklama" class="form-control" ><?=$anasayfa->aciklama; ?> </textarea>
</div> -->


<div class="form-group">
    <label > İçerik </label>
    <textarea id="editor1" class="ckeditor" name="aciklama"><?=$anasayfa->aciklama; ?> </textarea>
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
    <label > Video</label>
    <textarea name="video" class="form-control" ><?=$anasayfa->video; ?> </textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary" >Güncelle</button>
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
    $guncelle= DB::prepare("UPDATE hakkimizda SET aciklama=:aciklama, video=:video WHERE id=:id");
    $guncelle->execute([
        
        "aciklama" => $_POST["aciklama"],
        "video" => $_POST["video"],
        "id" => 1
        
    ]);
    if($guncelle){
        echo "Güncelleme işlemi başarılı";

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
include 'include/footer.php';

?>





   