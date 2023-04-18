<?php 

function totalsurem($baslangic,$bitis)
{

    $baslangice = $baslangic;
$bitise = $bitis;




$baslangicSaati = strtotime($baslangic);
//baslangicSaati => o zamana kadar geçen saniyesini buluyoruz.

$bitisSaati = strtotime($bitis);
//bitisSaati => o zamana kadar geçen saniyesini buluyoruz.

$fark = $bitisSaati - $baslangicSaati;
//Aradaki saniye farkını bulduk.
$dakika = $fark / 60;
$saniye_farki = floor($fark - (floor($dakika) * 60));

$saat = $dakika / 60;
$dakika_farki = $dakika - ($saat * 60);

return $dakika;

}


function zamansay($baslangic,$bitis)
{

    $baslangice = $baslangic;
$bitise = $bitis;




$baslangicSaati = strtotime($baslangic);
//baslangicSaati => o zamana kadar geçen saniyesini buluyoruz.

$bitisSaati = strtotime($bitis);
//bitisSaati => o zamana kadar geçen saniyesini buluyoruz.

$fark = $bitisSaati - $baslangicSaati;
//Aradaki saniye farkını bulduk.
$dakika = $fark / 60;
$saniye_farki = floor($fark - (floor($dakika) * 60));

$saat = $dakika / 60;
$dakika_farki = floor($dakika - (floor($saat) * 60));

return $dakika_farki;

}

function zamansay2($baslangic,$bitis)
{

    $baslangice = $baslangic;
$bitise = $bitis;




$baslangicSaati = strtotime(date($baslangic));
//baslangicSaati => o zamana kadar geçen saniyesini buluyoruz.

$bitisSaati = strtotime(date($bitis));
//bitisSaati => o zamana kadar geçen saniyesini buluyoruz.

$fark = $bitisSaati - $baslangicSaati;
//Aradaki saniye farkını bulduk.
$dakika = $fark / 60;
$saniye_farki = floor($fark - (floor($dakika) * 60));

$saat = $dakika / 60;
$dakika_farki = floor($dakika - (floor($saat) * 60));

return $dakika;

}
 ?>        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h5>Bu Sayfadan Bilardo Masalarını Kontrol Edebilir Masa Süresini Başlatabilir, Masa Süresini Bitirebilir ve Müşterinin Ödeyeceği Tutarı Otomatik Bir Şekilde Görebilirsiniz.</h5>
                      
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Bilardo</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">



<?php $dsadassd=$db->prepare("SELECT * from bilardomasa ");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { 




if ($dbb["zamantur"]=="sureli") {

$totalsure = totalsurem($dbb["zamanbaslangic"],$dbb["zamanbitis"]);

$kalansure = zamansay(date('Y-m-d H:i:s',time()),$dbb["zamanbitis"]);



}


if ($dbb["zamantur"]=="suresiz") {





$baslangice = $dbb["zamanbaslangic"];
$bitise = date('Y-m-d H:i:s',time());



$dakika_farki = zamansay2($dbb["zamanbaslangic"],date('Y-m-d H:i:s',time()));

}

  ?>
                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="">
                                        <img class="img-fluid" src="assets/images/masaoyun.png" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><?php echo $dbb["masaad"] ?></h4>
                                      <hr>
                                      <h4>Masa Durumu: 
  <?php if ($dbb["masadurumu"]=="0") {?> <a style="color: red;">Kapalı</a> <?php    } ?>
 <?php if ($dbb["masadurumu"]=="1") {?> <a style="color: green;">Aktif</a>  <?php    } ?>
 </h4>



<?php if ($dbb["masadurumu"]=="1") {?>
 <h4>Masa Süre Tipi: 
  <?php if ($dbb["zamantur"]=="sureli") {?> <a >Süreli</a> <?php    } ?>
 <?php if ($dbb["zamantur"]=="suresiz") {?> <a >Süresiz</a>  <?php    } ?>
 </h4>
<?php if ($dbb["zamantur"]=="sureli") {
   $ucret =   $totalsure * $dbb["dkucret"];
    ?>

                                      <h4>Güncel Masa Ücreti:   <span class="price"><?php  echo substr($ucret, 0,5)."TL".""; ?></span></h4>
                                      <h4>Kalan Süre:   <span class="price"><?php echo $kalansure ?>dk</span></h4>
                                  <?php } ?>


 <?php    } ?>  

 <?php if ($dbb["zamantur"]=="suresiz") {
 $ucret =   $dakika_farki * $dbb["dkucret"];
    ?>

                                      <h4>Güncel Masa Ücreti:   <span class="price"><?php  echo substr($ucret, 0,5)."TL".""; ?></span></h4>
                                      <h4>Masada Geçirilen Süre:   <span class="price"><?php echo substr($dakika_farki, 0,6) ?>dk</span></h4>
                                 


 <?php    } ?>                                      
                                      <hr>
                                     <a href="bilardo-<?php echo $dbb["id"] ?>.html" class="btn btn-success">Masayı Yönet</a>
                                   
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