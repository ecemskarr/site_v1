<?php include 'include/header.php'; 
$userId = $_SESSION["userId"];  
$id=$_SESSION['id'];
$yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");
if(count($yetki)==0)
{
 
    header("location:anasayfa.php");
    exit;
}

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

<!-- Main content -->
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
                <div class="box-header">Haberler
                </div>
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
       
       $calismalarim = DB::get("select * from haber where durum=0");
       foreach($calismalarim as $row)
       {
           ?>
                            <tr>
                                 <td><?=$row->id?></td>
                                <td><img src="haberler/<?= $row->resim ?>" width=100></td>
                                <td><?=$row->baslik?></td>
                                <td><?=$row->aciklama?></td>
                                <td><?=$row->zaman?></td>
                                <td>
                                    <a href="?guncelle=<?=$row->id?>"><i
                                            class="fa fa-check fa-lg"></i></a>
       
                                    <a href="?sil=<?=$row->id?>"onclick="return confirm('Silmek istediğinize emin misiniz?');"><i class="fa fa-times fa-lg text-red"></i></a>

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
    if(count($yetki)>0)
{
        $id = $_GET["sil"];
        $update=DB::prepare("UPDATE haber SET                  
        durum=:durum
WHERE id=:id

");
        $update->execute([
            "durum" =>2, //durum 0 onay bekleyen, durum 1 onaylanan, durum 2 onaylanmadı.
            "id"=>$id
        ]);
        if($update)
        {   
            echo "Onaylanmadı!!";
            echo "<script>";
            echo "window.location.href='haber.php';";
            echo "</script>";
            
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
if(@$_GET["guncelle"])
{        if(count($yetki)>0)
 {
        $id = $_GET["guncelle"];
        $update=DB::prepare("UPDATE haber SET                  
        durum=:durum
WHERE id=:id

");
        $update->execute([
            "durum" =>1, //durum 0 onay bekleyen, durum 1 onaylanan, durum 2 onaylanmadı.
            "id"=>$id
        ]);
        if($update)
        {   
            echo "Onaylandı!!";
            echo "<script>";
            echo "window.location.href='haber.php';";
            echo "</script>";
            
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