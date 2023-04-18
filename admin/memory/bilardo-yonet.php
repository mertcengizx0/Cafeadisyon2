 <?php 
$masa= htmlspecialchars($_GET["sef"]);
$masavarmi =$db->query("SELECT * FROM bilardomasa WHERE id='$masa'")->rowCount();  

if ($masavarmi==1) {

}else{

header("location:bilardo.html");

}

$glko=$db->prepare("SELECT * from bilardomasa where id=:idim");
$glko->execute(array(':idim'=>htmlspecialchars($_GET["sef"])));
$gb=$glko->fetch(PDO::FETCH_ASSOC); 


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



if ($gb["zamantur"]=="sureli") {

$totalsure = totalsurem($gb["zamanbaslangic"],$gb["zamanbitis"]);

$kalansure = zamansay(date('Y-m-d H:i:s',time()),$gb["zamanbitis"]);



}


if ($gb["zamantur"]=="suresiz") {





$baslangice = $gb["zamanbaslangic"];
$bitise = date('Y-m-d H:i:s',time());



$dakika_farki = zamansay2($gb["zamanbaslangic"],date('Y-m-d H:i:s',time()));

}

  ?>


        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h5>Bu Sayfadan Seçtiğiniz Bilardo Masasını Düzenleyebilirsiniz.</h5>
                      
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <a href="bilardo.html" class="btn btn-danger btn-block">Geri Dön</a>
                        </ol>
                    </div>
                </div>

       


 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo $gb["masaad"] ?> Adlı Masayı Yönetiyorsunuz.</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                               
                                        <div class="row">
                                            

<div class="col-xl-3 col-lg-6 col-sm-6">

                        <div class="widget-stat card <?php 
if ($gb["masadurumu"]==0) {
echo "bg-danger";
 }else{
    echo "bg-success";
 } ?>">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-turn-off"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Masa Durumu</p>
                                        <h3 class="text-white"><?php if ($gb["masadurumu"]==0) {echo "Kapalı";}else{
if ($gb["zamantur"]=="sureli") {
echo "Açık/Süreli";
}else{
echo "Açık";
}
                                            

                                        } ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<?php 

if ($gb["zamantur"]=="sureli") {?>


<div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-stopclock"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Masada Kalan Süre</p>
                                        <h3 class="text-white"><?php if ($gb["masadurumu"]==0) {echo "Kapalı";}else{


echo $kalansure."dk"."";
$ucret =   $totalsure * $gb["dkucret"];


                                        } ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



<?php  }  ?>

<?php 

if ($gb["zamantur"]=="suresiz") {?>


<div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-stopclock"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Masada Geçirilen Süre</p>
                                        <h3 class="text-white"><?php if ($gb["masadurumu"]==0) {echo "Kapalı";}else{


echo substr($dakika_farki, 0,6)."dk"."";
$ucret =   $dakika_farki * $gb["dkucret"];
                                        } ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php  }  ?>



                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-info">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-upload-1"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Güncel Masa Ücreti</p>
                                        <h3 class="text-white"><?php if ($gb["masadurumu"]==0) {echo "Kapalı";}else{

                                    
                                      echo substr($ucret, 0,5)."TL"."";

                                        } ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-warning">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-album-3"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Masada Adı</p>
                                        <h3 class="text-white"><?php echo $gb["masaad"] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




<?php if ($gb["masadurumu"]==1) { ?>

                  <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Hesap Ödeme</h4>
                            </div>
                            <div class="card-body">


<form action="herego.html" method="post">
                                <div class="basic-form">
<input type="hidden" name="masaid" value="<?php echo $gb["id"] ?>">
<?php 

if ($gb["zamantur"]=="sureli") { ?>
<input type="hidden" name="islem" value="<?php echo $gb["masaad"] ?> Adlı Masada Süreli Bir Şekilde <?php echo $totalsure ?>dk Oynandı ve Alınan Tutar <?php echo $ucret ?>TL">
<?php }else{ ?>
<input type="hidden" name="islem" value="<?php echo $gb["masaad"] ?> Adlı Masada Süresiz Bir Şekilde <?php echo $dakika_farki ?>dk Oynandı ve Alınan Tutar <?php echo $ucret ?>TL">
<?php } ?>


                                    <div class="form-group">
                                            <label style="color: black;">Müşteriden Alınan Tutarı Giriniz (Hesapları Netleştirmek İçin Eklenmiştir)</label>
                                         <input type="text" class="form-control" name="alinan" value="<?php echo substr($ucret, 0,5); ?>" placeholder="Müşteriden Alınan Tutar">
                                        </div>

                                </div>

                                <button name="ucretal" type="submit" class="btn btn-success btn-block">Masayı Kapat ve Ücreti Cari Hesaba Aktar</button>

</form>


                            </div>
                        </div>
                    </div>
                    


                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Masa İşlemleri</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
<form action="herego.html" method="post">
                                 <div class="form-group">
                                            <label style="color: black;">Masayı Transfer Et</label>
                                            <input type="hidden" name="masaid" value="<?php echo $gb["id"] ?>">
                                            <select class="form-control" id="sel1" name="transfermasa">
<?php $dsadassdx=$db->prepare("SELECT * from bilardomasa ");
$dsadassdx->execute();
while($dbx=$dsadassdx->fetch(PDO::FETCH_ASSOC)) { 
if ($dbx["id"]!=$gb["id"]) {
if ($dbx["masadurumu"]==0) {
 ?>

<option value="<?php echo $dbx["id"] ?>"><?php echo $dbx["masaad"] ?></option>
                                            <?php }}} ?>
                                          
                                            </select>
                                        </div>

                                </div>
 <button type="submit" name="bilardomasatransferet" class="btn btn-info btn-block">Bu Masayı Kapat ve Transfer Et</button>

</form>

                            </div>
                        </div>
                    </div>


                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Masayı Kapat</h4>
                            </div>
                            <form action="herego.html" method="post">
                            <div class="card-body">
                            
<input type="hidden" name="masaid" value="<?php echo $gb["id"] ?>">
                                 <p>Alttaki Düğmeye Basarsanız Masadan Hiçbir Ücret Almadan Masayı Kapatır.</p>

                             

                                <button type="submit" name="masakapat" class="btn btn-danger btn-block">Ücret Alma ve Masayı Kapat</button>
                            </div>
                            </form>
                        </div>
                    </div>







<?php } ?>









<?php if ($gb["masadurumu"]==0) { ?>
 <div class="col-xl-12 col-lg-6 col-sm-6">
<form action="herego.html" method="post">
    <input type="hidden" name="id" value="<?php echo $gb["id"] ?>">
                                 <div class="form-group">
                                            <label style="color: black;">Masa Süre Türü (Süreli veya Süresiz)</label>
                                            <select class="form-control" id="sel1" name="zamantur">
                                                <option value="suresiz">Süresiz</option>
                                                <option value="sureli">Süreli</option>
                                          
                                            </select>
                                        </div>

                                          <div id="vakit" style="display: none;" class="form-group">
                                            <label style="color: black;">Masa Zamanı (Süreli veya Süresiz)</label>
                                            <select class="form-control" id="sel1" name="masazaman">
                                                <option value="1">1 Saat</option>
                                                <option value="2">2 Saat</option>
                                                <option value="3">3 Saat</option>
                                                <option value="4">4 Saat</option>
                                                <option value="5">5 Saat</option>
                                          
                                            </select>
                                        </div>
                                        <button name="bilardomasabaslat" type="submit" class="btn btn-success btn-block">Masayı Başlat</button>

</div>


<script type="text/javascript">
     
$(function() {
    $("#sel1").change(function() {
        if ($("#sel1").val() == "suresiz") {
            $("#vakit").slideUp(500);
        } if ($("#sel1").val() == "sureli") {
            $("#vakit").slideDown(500);
        }
    });
    $("#sel1").change();
});

</script>
   </form>
          </div>

<?php }  ?>
                                     



                              
                                


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