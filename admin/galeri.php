
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
.RbtnMargin { margin-left: 5px; }
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
<button type="submit" class="btn btn-primary pull-right RbtnMargin" onclick="window.location.href='galeri-ekle.php';"> Yeni Kayıt Ekle</button>
<?php } ?>
<?php
$id=$_SESSION['id'];
$yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");
if(count($yetki)>0) { ?>
<button type="submit" class="btn btn-warning pull-right" onclick="window.location.href='galerionay.php';"> Onay Bekleyenler</button> 
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
       
       $calismalarim=DB::get("SELECT * FROM galeri where durum=1");
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
if(@$_GET["sil"])
{
    $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
    if(count($yetki)!=0){
        $id = $_GET["sil"];
        $update=DB::prepare("UPDATE galeri SET                  
        durum=:durum
WHERE id=:id

");
        $update->execute([
            "durum" =>3, //durum 0 onay bekleyen, durum 1 onaylanan, durum 2 onaylanmadı, durum 3 silme onayı
            "id"=>$id
        ]);
        if($update)
        {   
        
            echo "silme işlemi onaya gönderildi";
            echo "<script>";
            echo "window.location.href='galeri.php';";
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

<?php include 'include/footer.php'; ?>
