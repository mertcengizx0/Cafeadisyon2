        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h5>Bu Sayfadan Ürünler Ekleyebilirsiniz.</h5>
                      
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                       <button style="float: right;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-block">Yeni Ürün Oluştur</button>
                                  
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ürün Oluştur</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post" enctype="multipart/form-data">




                                        <div class="modal-body">



                                           <div class="form-group">
                                            <label>Ürün Adı</label>
                                            <input type="text" required class="form-control input-rounded" name="urunad" placeholder="Ürün Adı Giriniz (ÖRN. Çay, Kahve)">
                                        </div>


                                        <div class="form-group">
                                            <label>Ürün Fiyatı(Sadece Rakam Kullanınız eğer buçuklu ise 1,5 şeklinde yazınız) </label>
                                            <input id="d" required type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-rounded" name="fiyat" placeholder="Ürün Fiyatı Giriniz">
                                           
                                        </div>
                                        

    <div class="form-group">
                                            <label>Ürün Kategorisi</label>
 <select class="form-control input-rounded" name="kategori" id="kategori">
<?php 
 $dsadassd=$db->prepare("SELECT * from kategori");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>
  <option value="<?php echo $dbb["id"] ?>"><?php echo $dbb["kategoriad"] ?></option>
<?php } ?>
</select>
                                        </div>




    <div class="form-group">
                                            <label>Ürün Resmi</label>
                                            <input required type="file" class="form-control input-rounded" name="resim" >
                                        </div>


                                         </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>
                                        <button id="urunekle" name="urunekle" type="submit" class="btn btn-primary">Ürünü Ekle</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
 <!-- Modal END -->
                        </ol>
                    </div>
                </div>
                <div class="row">

<?php 
 $dsadassd=$db->prepare("SELECT * from urunler");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="">

                                        <img style="height:240px" class="img-fluid" src="<?php echo substr($dbb["resim"], 3) ?>" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><?php echo $dbb["ad"] ?></h4>
                                    <hr>

                                       <p>Ürün Fiyatı: <span class="price"><?php echo $dbb["tutar"] ?> TL</span></p>
                                         <p style="color: black;"><?php
                $dsadassds=$db->prepare("SELECT * from kategori WHERE id=:kategori LIMIT 1");
                $dsadassds->execute(array(':kategori'=>$dbb["kategori"]));
                while($dx=$dsadassds->fetch(PDO::FETCH_ASSOC)) { echo $dx["kategoriad"]; } ?></p>
                                       <hr>

                                        <div class="row">
                                         
<div class="col-md-6">
            <button data-toggle="modal" data-target="#exampleModalCenter<?php echo $dbb["id"]  ?>" type="button" class="btn btn-success">Ürünü Düzenle</button>

<!-- Duzenle --->
                                    <div class="modal fade" id="exampleModalCenter<?php echo $dbb["id"]  ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo $dbb["ad"] ?> Adlı Ürünü Düzenliyorsunuz</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post">
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label>Ürün Adı</label>
                                            <input type="text" class="form-control input-rounded" name="ad" placeholder="Kategori Adı Giriniz (ÖRN. Yiyecek, İçecek)" value="<?php echo $dbb["ad"]  ?>">
                                        </div>


                                          <div class="form-group">
                                            <label>Ürün Fiyatı</label>
                                            <input id="d" required type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-rounded" name="fiyat" placeholder="Ürün Fiyatı Giriniz" value="<?php echo $dbb["tutar"] ?>">
                                           
                                        </div>
                                        

    <div class="form-group">
                                            <label>Ürün Kategorisi</label>
 <select class="form-control input-rounded" name="kategori" id="kategori">
<?php 
 $dsadassds=$db->prepare("SELECT * from kategori");
$dsadassds->execute();
while($dbbx=$dsadassds->fetch(PDO::FETCH_ASSOC)) { ?>
  <option <?php if ($dbb["kategori"]==$dbbx["id"]) {
echo "selected";
  } ?> value="<?php echo $dbbx["id"] ?>"><?php echo $dbbx["kategoriad"] ?></option>
<?php } ?>
</select>
                                        </div>

                                         </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>
                                        <button id="urunduzenle" name="urunduzenle" type="submit" class="btn btn-primary">Kategoriyi Düzenle</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>


<!--- Duzenle bitis --->






</div>
<div class="col-md-6">
            <button type="button" data-toggle="modal" data-target="#exampleModalCentersil<?php echo $dbb["id"]  ?>" class="btn btn-danger">Ürünü Sil</button>





<!-- Silme Başlar --->

         <div class="modal fade" id="exampleModalCentersil<?php echo $dbb["id"]  ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo $dbb["ad"] ?> Adlı Ürünü Siliyorsunuz</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post">
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-body">
<center>
                                   <img class="img-fluid" style="max-height: 100px;" src="assets/images/dikkat.png">
                                   <p><?php echo $dbb["ad"] ?> Adlı Ürünü Silmek İstediğinize Eminmisiniz. Silinen Veriler Geri Getirelemez.</p>
</center>
                                         </div>
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>

                                        <button id="urunsil" name="urunsil" type="submit" class="btn btn-danger">Ürünü Sil</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>




<!-- Silme Bitiş --->



</div>

                                      </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>



          


                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->