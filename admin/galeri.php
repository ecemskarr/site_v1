
<?php 
include 'include/header.php';   
$userId = $_SESSION["userId"];                                
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
<div class="box-header">Galeri 
<?php 
   
$yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 1 ");
if(count ($yetki)>0){
?>
<button type="submit" class="btn btn-primary center" onclick="window.location.href='galeri-ekle.php';"> Yeni Kayıt Ekle</button>
<?php } ?>
</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>#ID</th>
        <th>Açıklama</th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $calismalarim=DB::get("SELECT * FROM galeri ");
       foreach($calismalarim as $row)
       {
           ?>
           <tr>
               <td><?=$row->id?></td>
               <td><?=$row->aciklama?></td>
               <td>
      
                  <a href="galeri-guncelle.php?id=<?=$row->id?>"><i class="fa fa-edit text-primary"></i></a>
                    <?php
         
                    $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
                   
                    if(count ($yetki)>0){
                         ?>
                        <a href="?sil=<?=$row->id?>" onclick="return confirm('Silmek istediğinize emin misiniz?');"><i class="fa fa-trash text-danger"></i></a>
                        <?php
                        } 
                   
                        ?>
                   
                    
                    
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
   
   $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
   if(count($yetki)!=0){ 
  
    
   
if(@$_GET["sil"])
{
    $id = $_GET["sil"];
    $silinecekDosya = DB::getRow("SELECT * FROM galeri WHERE id='$id'");
    unlink("galeri/" . $silinecekDosya->resim);
    $sil=DB::prepare("DELETE FROM galeri WHERE id=:silinecekid");
    $sil->execute(["silinecekid"=> $id]);
    if($sil)
    {   
    
        echo "silme işlemi başarılı";
        echo "<script>";
        echo "window.location.href='galeri.php';";
        echo "</script>";
        
    }
    
}
   }
   
?>

<?php include 'include/footer.php'; ?>
