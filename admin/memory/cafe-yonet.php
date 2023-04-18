<?php 

$masa= htmlspecialchars($_GET["sef"]);
$masavarmi =$db->query("SELECT * FROM cafemasa WHERE id='$masa'")->rowCount();  

if ($masavarmi==1) {

}else{

header("location:cafe.html");

}

$glko=$db->prepare("SELECT * from cafemasa where id=:idim");
$glko->execute(array(':idim'=>htmlspecialchars($_GET["sef"])));
$gb=$glko->fetch(PDO::FETCH_ASSOC); 


$totalbakiye =0;
 $dsadassdss=$db->prepare("SELECT * from masaurunler WHERE masaid=:masaid");

$dsadassdss->execute(array(':masaid'=>$gb["id"]));
while($dbbds=$dsadassdss->fetch(PDO::FETCH_ASSOC)) { 

$totalbakiye += $dbbds["uruntutar"];
    }


 ?>        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h5>Bu Sayfadan Masaları Kontrol Edebilir, Masalara Ürün Ekleyebilir Düzenleyebilir ve Hızlı Bir Şekilde Müşterilere Vermiş Olduğunuz Ürünleri Görebilirsiniz.</h5>
                      
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Cafe Yönetimi</a></li>
                        </ol>
                    </div>
                </div>
              <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo $gb["masaad"] ?> Adlı Masayı Yönetiyorsunuz.</h4>
                            </div>
                            <div class="card-body">
                              
<div class="row">



<div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-info">
                            <div class="card-body  p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-notebook-4"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Güncel Bakiye</p>
                                        <h3 class="text-white"><?php echo $totalbakiye; ?>TL</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-danger">
                            <div class="card-body  p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-notification"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Masa Adı</p>
                                        <h3 class="text-white"><?php echo $gb["masaad"] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="col-md-6">
    
<div class="card border-0 pb-0">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Masada Bulunan Ürünler</h4>
                            </div>
                            <div class="card-body"> 
                                <div id="DZ_W_Todo2" class="widget-media" >
                                    <ul class="timeline">



<?php 

$masaxx= $gb["id"];
$urunvarmi =$db->query("SELECT * FROM masaurunler WHERE masaid='$masaxx'")->rowCount();  
if ($urunvarmi<1) {
    ?>
 <div class="form-input-content text-center error-page">
                     
                        <h4><i class="fa fa-times-circle text-danger"></i> Masada Ürün Yok</h4>
                        <p>Bu Masa Boş veya Hiç Ürün Eklenmemiş.</p>
                        
                    </div>
<?php  
}else{
 $dsadassds=$db->prepare("SELECT * from masaurunler WHERE masaid=:masaid");

$dsadassds->execute(array(':masaid'=>$gb["id"]));
while($dbbd=$dsadassds->fetch(PDO::FETCH_ASSOC)) { 

$ururnn=$db->prepare("SELECT * from urunler WHERE id=:id LIMIT 1");

$ururnn->execute(array(':id'=>$dbbd["urunid"]));
while($ux=$ururnn->fetch(PDO::FETCH_ASSOC)) { ?>

                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-2">
                                                    <img alt="image" width="50" src="<?php echo substr($ux["resim"], 3) ?>">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1"><?php echo $ux["ad"] ?></h5>
                                                    <small class="d-block"><a style="color: black;"><?php echo $dbbd["urunadet"] ?></a> Adet <?php echo $ux["ad"] ?> <a style="color: black;"><?php echo $dbbd["uruntutar"] ?>TL</a> </small>
                                                </div>

                                                <div class="dropdown">

                                             <form action="herego.html" method="post">
                                                <input type="hidden" name="masaid" value="<?php echo $gb["id"] ?>">
                                                <input type="hidden" name="urunid" value="<?php echo $ux["id"] ?>">
                                              <button type="submit" name="masaurunsil" class="btn btn-danger">Masadan Sil</button>
</form>


                                                </div>
                                            </div>
                                        </li>
                                         <?php } ?>
                                  <?php } ?>

<?php } ?>

                                    </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 297px;"></div></div></div>
                            </div>
                        </div>

</div>



<!-- menuler --->
<div class="col-md-6">


 <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Ürün Ekleme</h4>
                                <p class="m-0 subtitle">Bu Kısımdan Seçtiğiniz Ürünleri Masaya Ekleyebilirsiniz.</p>
                            </div>
                            <div class="card-body">
                                <div id="accordion-two" class="accordion accordion-danger-solid">


                    <?php 
 $dsadassd=$db->prepare("SELECT * from kategori");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>

                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#bordered_collapse<?php echo $dbb["id"] ?>" aria-expanded="false"> <span class="accordion__header--text"><?php echo $dbb["kategoriad"] ?></span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapse<?php echo $dbb["id"] ?>" class="accordion__body collapse" data-parent="#accordion-two" style="">
                                            <div class="accordion__body--text">
                                               
<?php 
 $dsadassds=$db->prepare("SELECT * from urunler WHERE kategori=:kategorid");
$dsadassds->execute(array(':kategorid'=>$dbb["id"]));
while($dbbd=$dsadassds->fetch(PDO::FETCH_ASSOC)) { ?>


<div class="col-xl-12">
    <form action="herego.html" method="post">
    <input type="hidden" name="masaid" value="<?php echo $gb["id"] ?>">
 <input type="hidden" name="urunid" value="<?php echo $dbbd["id"] ?>">
                        <div class="card bg-danger">
                         
                            <div style="color: black;" class="card-body">
                                <div class="row">
                                    
                                    <div style="color: white;" class="col-md-4"><?php echo $dbbd["ad"] ?> / <?php echo $dbbd["tutar"] ?>TL</div>
                                     <div class="col-md-4"> <input type="number" name="adet" value="1" class="form-control" placeholder="Adet Giriniz"></span></div>
                                      <div class="col-md-4">  <button name="masaurunekle" class="btn btn-success btn-block">Masaya Ekle</button>  </div>



                                </div>
                               <h4> 
                           

                               </h4>
                            </div>
                        </div>
                        </form>
                    </div>




<?php } ?>

                                            </div>
                                        </div>
                                    </div>
<?php } ?>



                                   
                             





                                </div>
                            </div>

                        </div>

</div>
<!-- Menuler bitis -->
<div class="col-md-6">


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Ödeme Onay</h4>
                                <p class="mb-0 subtitle">Müşteri Kasaya Geldiğinde Yapılacak İşlemler Burada Bulunmakta.</p>
                            </div>
                            <div class="card-body">
                                  <label>Müşteriden Alınması Gereken Bakiye</label>
                                  <form action="herego.html" method="post">
                                  <input type="hidden" name="masaid" value="<?php echo $gb["id"] ?>">
                                <input type="text" name="alinantutar" class="form-control" value="<?php echo $totalbakiye ?>" placeholder="müşteriden almanız gereken bakiye">

                                <button name="cafemasabitir" style="margin-top: 15px;" type="submit" class="btn btn-primary btn-block">Ödeme Al Masayı Temizle</button>
                                </form>
                            
                            </div>
                        </div>
                    </div>



                </div>


<div class="col-md-6">

    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Masa Transferi</h4>
                                <p class="mb-0 subtitle">Boş Olan Seçtiğiniz Masaya Müşterileri Transfer Edebilirsiniz.</p>
                            </div>
                            <div class="card-body">
                               
<form action="herego.html" method="post">

         <div class="form-group">
                                            <label style="color: black;">Masayı Transfer Et</label>
            <input type="hidden" name="masaid" value="<?php echo $gb["id"] ?>">
                                            <select class="form-control" id="sel1" name="transfermasa">
<?php $dsadassdx=$db->prepare("SELECT * from cafemasa ");
$dsadassdx->execute();
while($dbx=$dsadassdx->fetch(PDO::FETCH_ASSOC)) { 

$masaxxs = $dbx["id"];
$urunvarmixx =$db->query("SELECT * FROM masaurunler WHERE masaid='$masaxxs'")->rowCount();  


   if ($urunvarmixx==0) {

 
 ?>

<option value="<?php echo $dbx["id"] ?>"><?php echo $dbx["masaad"] ?></option>
                                            <?php  }  } ?>
                                          
                                            </select>
                                        </div>


                      <button name="masasupdates" type="submit" class="btn btn-danger btn-block">Ürünlerin Hepsini Seçili Masaya Transfer Et</button>
                              </form>
                            </div>
                        </div>
                    </div>

</div>


</div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->