
<?php 
include 'include/header.php'; 

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
<div class="box-header">Kullanıcılar
<button type="submit" class="btn btn-primary center" onclick="window.location.href='kullanici-ekle.php';"> Yeni Kayıt Ekle</button>

</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>#ID</th>
        <th>Kullanıcı Adı</th>
        <th>Şifre</th>
        <th>Yetki</th>
        <th>Admin-Kullanıcı</th>
        <th>Adı Soyadı</th>
        <th>Mail</th>
        <th>Telefon</th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $calismalarim=DB::get("SELECT * FROM users ");
       foreach($calismalarim as $row)
       {
           ?>
           <tr>
               <td><?=$row->id?></td>
               <td><?=$row->username?></td>
               <td >
<a href="sifre-guncelle.php?id=<?=$row->id?>"><i class="fa fa-key "></i></a>
</td>
               <td><?=$row->permissions?></td>
               <td><?=$row->is_admin?></td>
               <td><?=$row->full_name?></td>
               <td><?=$row->mail?></td>
               <td><?=$row->phone?></td>
               <td>
      
                  <a href="kullanici-guncelle.php?id=<?=$row->id?>"><i class="fa fa-edit text-primary"></i></a>
                    <a href="?sil=<?=$row->id?>" onclick="return confirm('Silmek istediğinize emin misiniz?');"><i class="fa fa-trash text-danger"></i></a>
                    
                    
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
    $id = $_GET["sil"];
    $sil=DB::prepare("DELETE FROM users WHERE id=:silinecekid");
    $sil->execute(["silinecekid"=> $id]);
    $delete=DB::prepare("DELETE FROM user_permissions WHERE userId=:deleteid");
    $delete->execute(["deleteid"=>$id]);
    if($sil&&$delete)
    {   
    
        echo "silme işlemi başarılı";
        echo "<script>";
        echo "window.location.href='kullanici.php';";
        echo "</script>";
    }
    
}


?>

<?php include 'include/footer.php'; ?>
