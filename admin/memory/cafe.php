        <div class="content-body">
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


                    <?php 
                    $totalbakiye = 0;
 $dsadassd=$db->prepare("SELECT * from cafemasa");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { 

 $dsadassdss=$db->prepare("SELECT * from masaurunler WHERE masaid=:masaid");

$dsadassdss->execute(array(':masaid'=>$dbb["id"]));
while($dbbds=$dsadassdss->fetch(PDO::FETCH_ASSOC)) { 

$totalbakiye += $dbbds["uruntutar"];

   }

    ?>
                    <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="">
                                        <img class="img-fluid" src="assets/images/masa.png" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><?php echo $dbb["masaad"] ?></h4>
                                       <hr>
                                       <h4>Güncel Masa Tutarı:  <span class="price"><?php echo $totalbakiye ?> TL</span></h4>
                                      <hr>
                                      <a href="cafe-<?php echo $dbb["id"] ?>.html" type="button" class="btn btn-success">Masayı Yönet</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php   $totalbakiye = 0; } ?>
                    
                  
             
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->