<?php include 'include/header.php'; ?>

<section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Galeri Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label > Resim</label>
    <input type="file" name="resim" >
</div>
<div class="form-group">
    <label > Açıklama</label>
    <textarea name="aciklama" class="form-control" placeholder="Açıklama Giriniz"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Ekle</button>
</div>
</form>
</div>
             </div>
            </div>
        </div>

    </section>
    <?php include 'include/footer.php'; ?>