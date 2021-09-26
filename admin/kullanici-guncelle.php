<?php include 'include/header.php';
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
        <li><a href="#"><i class="fa fa-dashboard"></i>Kullanıcı Ayarları</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<?php 

if($_GET["id"]){
    $Id = $_GET["id"];
$calismaDetay=DB::getRow("SELECT * FROM users WHERE id=$Id");

}
// KULLANICI GUNCELLEME

if($_POST)
 { $yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");;
    if(count ($yetki)>0){
    
    //MEVCUT YETKİLERİ GETİR
    $userPermissions = DB::get("select * from user_permissions where userId=$Id");
    if(count($userPermissions) > 0) {
        //MEVCUT YETKİLERİ VARSA SİL
        DB::prepare("delete from user_permissions where userId='$calismaDetay->id'")->execute();
    }
    
    if(isset($_POST['yetkiler']) && $_POST['yetkiler']) {
        foreach($_POST['yetkiler'] as $elem) {
            DB::insert("INSERT INTO user_permissions SET 
            userId='$calismaDetay->id',
            permissionId='$elem'
        ");        
        }
    }

    $update=DB::prepare("UPDATE users SET                  
                     username=:username,
                     is_admin=:is_admin,
                     full_name=:full_name,
                     mail=:mail,
                     phone=:phone
    WHERE id=:id

");
$update->execute([

    "username" => $_POST["username"] ? $_POST["username"] : $calismaDetay->username,
    "is_admin" => $_POST["is_admin"]? $_POST["is_admin"] : $calismaDetay->is_admin,
    "full_name"=> $_POST["full_name"]? $_POST["full_name"] : $calismaDetay->full_name,
    "mail" => $_POST["mail"]? $_POST["mail"] : $calismaDetay->mail,
    "phone" => $_POST["phone"] ? $_POST["phone"] : $calismaDetay->phone,
    "id"=>$Id


]);
if($update){
    echo "Güncelleme işlemi başarılı";
    sleep(2);
    header("location:kullanici.php");
}
else{
    echo "Bir hata oluştu";
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

<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box">
                <div class="box-header">Kullanıcı Ayarları</div>
                <div class="box-body">
                    <form action="" method="post">
                        <div class="form-group">

                            <label>Kullanıcı Adı</label>
                            <textarea name="username" class="form-control"><?=$calismaDetay->username?></textarea>
                        </div>

                        <h4> Yetkileri </h4>
                        <?php 
								$yetki = DB::get("SELECT * FROM permissions"); //3 kayıt var diziler 0 dan başlar [0,1,2]
                                $userPermissions = DB::get("select * from user_permissions where userId=$Id");
								for($i = 0; $i < count($yetki); $i++){
                                    $counter = 0;
                                    for($j = 0; $j < count($userPermissions); $j++){
                                        if($yetki[$i]->id === $userPermissions[$j]->permissionId) {
                                            $counter++;
                                        }
                                    }
                                    if($counter > 0) {
                                        ?>
                        <input type="checkbox" value="<?php echo $yetki[$i]->id; ?>" name="yetkiler[]" checked /><?php echo $yetki[$i]->title; ?>
                        <?php
                                    } else {
                                        ?>
                        <input type="checkbox" value="<?php echo $yetki[$i]->id; ?>" name="yetkiler[]" /><?php echo $yetki[$i]->title; ?>
                        <?php
                                    }
                                    $counter = 0;
                                }
                        ?>
                        <div class="form-group">
                        </div>
                        <br> <br>
                        <div class="form-group">
                            <label>Admin-Kullanıcı</label>
                            <textarea name="is_admin" class="form-control"><?=$calismaDetay->is_admin?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Adı Soyadı</label>
                            <textarea name="full_name" class="form-control"><?=$calismaDetay->full_name?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mail</label>
                            <textarea name="mail" class="form-control"><?=$calismaDetay->mail?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Telefon</label>
                            <textarea name="phone" class="form-control"><?=$calismaDetay->phone?></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- /.content -->
<?php include 'include/footer.php'; ?>