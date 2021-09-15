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

<!-- Main content -->
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
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box">
                <div class="box-header">Haberler Listesi</div>
                <div class="box-body">
                    <table class="table table-sprited">
                        <thead>
                            <th>Haber ID</th>
                            <th>Haber Resim </th>
                            <th>Haber Başlık</th>
                            <th>Haber İçerik</th>
                            <th>Haber Tarih</th>
                            <th>İşlem</th>
                        </thead>
                        <tbody>
                            <?php 
       
       $calismalarim = DB::get("select * from haber");
       foreach($calismalarim as $row)
       {
           ?>
                            <tr>
                                <td><?=$row->id?></td>
                                <td><img src="assets/upload/<?= $row->resim ?>" width=100></td>
                                <td><?=$row->baslik?></td>
                                <td><?=$row->aciklama?></td>
                                <td><?=$row->zaman?></td>
                                <td>
                                    <a href="haber-guncelle.php?id=<?=$row->id?>"><i
                                            class="fa fa-edit text-primary"></i></a>
                                    <a href="?sil=<?=$row->id?>"><i class="fa fa-trash text-danger"></i></a>

                                </td>
                            </tr>
                            <?php
       }
       
       ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>


<?php 

if(@$_GET["sil"])
{
    $sil=DB::prepare("DELETE  FROM haber WHERE id=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
    }
}



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
}
else{
    echo "Bir hata oluştu";
}
}


}



?>



<!-- /.content -->
<?php include 'include/footer.php'; ?>