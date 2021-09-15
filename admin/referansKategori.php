
<?php include 'include/header.php'; ?>
<section class="content-header">
        <h1>
        Admin Paneli
           
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Anasayfa</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
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

    <!-- Main content -->
    
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referanslar
<button type="submit" class="btn btn-primary center" onclick="window.location.href='referansKategori-ekle.php';"> Yeni Kayıt Ekle</button>
</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>Kategori ID</th>
        <th>Kategori Adı</th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $calismalarim=DB::get("SELECT * FROM kategoriler ");
       foreach($calismalarim as $row)
       {
           ?>
           <tr>
               <td><?=$row->id?></td>
               <td><?=$row->kategoriAd?></td>
               <td>
                  <a href="referansKategori-guncelle.php?id=<?=$row->id?>"><i class="fa fa-edit text-primary"></i></a>
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
    $sil=DB::prepare("DELETE  FROM kategoriler WHERE id=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
    }
}






?>



    <!-- /.content -->
<?php include 'include/footer.php'; ?>
