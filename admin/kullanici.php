<?php include 'include/header.php'; ?>
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

if($_SESSION['id']){
    $Id = $_SESSION['id'];
$kullanici=DB::getRow("SELECT * FROM users WHERE id=$Id");



}
if($_POST){

    $password=$_POST["password"];
    $kullanici_password=md5($password);  
 $update=DB::prepare("UPDATE users SET                  
                  username=:username,
                  password=:password,
                  is_admin=:is_admin,
                  full_name=:full_name,
                  mail=:mail,
                  phone=:phone
  Where id=:id                


");
$update->execute([

 "username" => $_POST["username"] ? $_POST["username"] : $kullanici->username,
 "password" =>$kullanici_password ? $kullanici_password : $kullanici->password,
 "is_admin" => $_POST["is_admin"]? $_POST["is_admin"] : $kullanici->is_admin,
 "full_name"=> $_POST["full_name"]? $_POST["full_name"] : $kullanici->full_name,
 "mail" => $_POST["mail"]? $_POST["mail"] : $kullanici->mail,
 "phone" => $_POST["phone"] ? $_POST["phone"] : $kullanici->phone,
  "id"   => $Id 


]);
if($update){
 echo "Güncelleme işlemi başarılı";
 sleep(2);
 header("location:anasayfa.php");
}
else{
 echo "Bir hata oluştu";
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
                            <textarea name="username" class="form-control"><?=$kullanici->username?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Şifre</label>
                            <textarea name="password" class="form-control"><?=$kullanici->password?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Adı Soyadı</label>
                            <textarea name="full_name" class="form-control"><?=$kullanici->full_name?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mail</label>
                            <textarea name="mail" class="form-control"><?=$kullanici->mail?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Telefon</label>
                            <textarea name="phone" class="form-control"><?=$kullanici->phone?></textarea>
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
<?php include 'include/footer.php'; ?>