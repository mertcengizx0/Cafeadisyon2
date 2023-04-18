<?php
ob_start();
session_start();
include '../connection/tcon.php';
require_once "Secure/underwall.php";
date_default_timezone_set( 'Europe/Istanbul' );

if(file_exists('Secure/underwall.php')){

}else{

die();
}



if (isset($_POST["processor"])) {


$kategorid = underwall($_POST["katid"]); 

if ($kategorid==0) {


 $dsadassd=$db->prepare("SELECT * from urunler");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>

                                                <div class="col-md-6 col-12">
                                                    <div class="shop-version-four-product-grid-item">
                                                        <div class="shop-version-four-product-card-wrapper">
                                                            <div class="card">
                                                                <a ><img class="card-img-top"
                                                                        src="<?php echo substr($dbb["resim"],6) ?>"
                                                                        alt="Product Images"></a>
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $dbb["ad"] ?></h5>
                                                                    <p class="card-text"></p>
                                                                    <div class="product-rating-price">
                                                                        <div class="product-rating">
                                                                       
                                                                        </div>
                                                                        <div class="product-price">
                                                                            <span style="color: black;"><?php echo $dbb["tutar"] ?> TL</span>
                                                                        </div>
                                                                    </div>
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  }


}else{

$say = 0;
 $dsadassd=$db->prepare("SELECT * from urunler WHERE kategori=".$kategorid."");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>

                                                <div class="col-md-6 col-12">
                                                    <div class="shop-version-four-product-grid-item">
                                                        <div class="shop-version-four-product-card-wrapper">
                                                            <div class="card">
                                                                <a ><img class="card-img-top"
                                                                        src="<?php echo substr($dbb["resim"],6) ?>"
                                                                        alt="Product Images"></a>
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $dbb["ad"] ?></h5>
                                                                    <p class="card-text"></p>
                                                                    <div class="product-rating-price">
                                                                        <div class="product-rating">
                                                                       
                                                                        </div>
                                                                        <div class="product-price">
                                                                            <span style="color: black;"><?php echo $dbb["tutar"] ?> TL</span>
                                                                        </div>
                                                                    </div>
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  $say++; }


if ($say==0) { ?>
       <div class="col-md-6 col-12">
                                                    <div class="shop-version-four-product-grid-item">
                                                        <div class="shop-version-four-product-card-wrapper">
                                                            <div class="card">
                                                               
                                                                <div class="card-body">
                                                                   Ürün Bulunamadı
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<?php }


}





}







if (isset($_SESSION['administrator'])) {








if (isset($_POST["sifreguncelle"])) {
    // code...


$varolan= md5($_POST['mevcutsifre']);
$yeni= $_POST['yenisifre'];
$yenitekrar= $_POST['yenisifretekrar'];

$glko=$db->prepare("SELECT * from ausers where id=:idim");
$glko->execute(array(':idim'=>1));
$uss=$glko->fetch(PDO::FETCH_ASSOC); 

if ($varolan==$uss["sifre"]) {


if ($yeni==$yenitekrar) {

$okey = $db->prepare(
    "UPDATE ausers SET
     sifre=:sifre
     WHERE id=1"
  );

$guncel     = $okey->execute(
    array(
    ':sifre'  => md5($yeni)
       ));


if ($guncel) {
Header("location:logout.html");
}else{
   header("location:ayarlar.html?hata=yanlis"); 

}




}else{

   header("location:ayarlar.html?hata=yanlis"); 

    }




}else{
   header("location:ayarlar.html?hata=yanlis"); 
}


}






if (isset($_POST["mailguncelle"])) {


$varolan = $_POST["mevcutmail"];

$yenimail = $_POST["yenimail"];

$yenimailtekrar = $_POST["yenimailtekrar"];

if ($_SESSION['administrator']==$varolan) {
$ordami = 1;
}else{
$ordami = 0;
}


if ($ordami==1) {


if ($yenimail==$yenimailtekrar) {





$okey = $db->prepare(
    "UPDATE ausers SET
     eposta=:eposta
     WHERE id=1"
  );

$guncel     = $okey->execute(
    array(
    ':eposta'  => $yenimail
       ));

if ($guncel) {
Header("location:logout.html");
}else{
Header("location:index.html?system=error");
}


}else{
    header("location:ayarlar.html?hata=yanlis");
}




}else{
    header("location:ayarlar.html?hata=yanlis");
}














}














if (isset($_POST["ayil"])) {

$yil = $_POST["ayil"];
$ay = $_POST["ayor"];
$raporgun = $_POST["raporgun"];

$yenitar = "".$yil."-".$ay."-".$raporgun."";


$kazanc= 0;
$tutar=0;

$ordami =$db->query("SELECT * FROM gelir WHERE tarih LIKE '".$yenitar."%'")->rowCount();  

$dsadassdxsz=$db->prepare("SELECT * FROM gelir WHERE tarih LIKE '".$yenitar."%'");
$dsadassdxsz->execute();
while($dbxsz=$dsadassdxsz->fetch(PDO::FETCH_ASSOC)) { 


if ($dbxsz["geliradi"]=="Bilardo") {
echo "<tr><td><strong>Bilardo</strong></td><td>".$dbxsz["geliricerik"]."</td><td>".$dbxsz["gelirtutar"]."TL</td><td>".$dbxsz["tarih"]."</td></tr>";
}else{

echo $dbxsz["geliricerik"];
}

$tutar += $dbxsz["gelirtutar"];



}
if ($ordami==0) {
echo "GELİR BULUNAMADI";
}else{
echo "<tr><td><strong>TOPLAM KAZANC</strong></td><td>.</td><td>".$tutar."TL</td><td></td></tr>";
}
}



if (isset($_POST["masasupdates"])) {


$masaid= $_POST["masaid"];
$transfermasa= $_POST["transfermasa"];



$okey = $db->prepare(
    "UPDATE masaurunler SET
     masaid=:masaid
     WHERE masaid={$masaid}"
  );

$guncel     = $okey->execute(
    array(
    ':masaid'  => $transfermasa
       ));

if ($guncel) {
Header("location:cafe.html");
}else{
Header("location:cafe.html?system=error");
}


}



if (isset($_POST["cafemasabitir"])) {

$alinantutar = $_POST['alinantutar'];
$masaid= $_POST['masaid'];


if ($alinantutar==0) {
header("location:cafe-".$masaid.".html");
die();
}

$glko=$db->prepare("SELECT * from cafemasa where id=:idim");
$glko->execute(array(':idim'=>$masaid));
$gb=$glko->fetch(PDO::FETCH_ASSOC); 
$tarihs = date('Y-m-d H:i:s',time());
$islem="";
$totalbakiye=0;
$dsadassdss=$db->prepare("SELECT * from masaurunler WHERE masaid=:masaid");
$dsadassdss->execute(array(':masaid'=>$gb["id"]));
while($dbbds=$dsadassdss->fetch(PDO::FETCH_ASSOC)) { 

$ururnn=$db->prepare("SELECT * from urunler WHERE id=:id LIMIT 1");

$ururnn->execute(array(':id'=>$dbbds["urunid"]));
while($ux=$ururnn->fetch(PDO::FETCH_ASSOC)) {



$islem.="<tr><td><strong>".$ux["ad"]."</strong></td><td>".$dbbds["urunadet"]." Adet</td><td>".$dbbds["uruntutar"]."TL</td><td>".$tarihs."</td></tr>";


    }
$totalbakiye += $dbbds["uruntutar"];
     }






$tarih = date('Y-m-d H:i:s',time());



$okey = $db->prepare(
    "INSERT INTO gelir SET
     geliradi=:geliradi,
     geliricerik=:geliricerik,
     gelirtutar=:gelirtutar,
     tarih=:tarih"
  );

$guncel     = $okey->execute(
    array(
    ':geliradi'  => "Cafe",
    ':geliricerik'  => $islem,
    ':gelirtutar'  => $alinantutar,
    ':tarih'  => $tarih
       ));



if ($guncel) {




$sil     = $db->prepare( "DELETE from masaurunler where masaid=:masaid" );
$kontrol = $sil->execute(array(':masaid' => underwall($masaid)));

if ($kontrol) {
    
Header("location:cafe.html");

}else{

Header("location:cafe.html?hata=system");

}





}else{
header("location:cafe-".$masaid.".html?system=error");
}



}
















if (isset($_POST["masaurunsil"])) {



$masaid = $_POST['masaid'];
$sil     = $db->prepare( "DELETE from masaurunler where urunid=:urunid and masaid=:masaid" );
$kontrol = $sil->execute(array(':urunid' => underwall($_POST['urunid']),':masaid' => underwall($_POST['masaid'])));

if ($kontrol) {
    
Header("location:cafe-".$masaid.".html");

}else{

Header("location:cafe-".$masaid.".html?hata=system");

}



}






if (isset($_POST["masaurunekle"])) {


$masaid = $_POST["masaid"];

$urunid = $_POST["urunid"];

$adet = $_POST["adet"];


$urunordami =$db->query("SELECT * FROM masaurunler WHERE masaid='$masaid' and urunid='$urunid' ")->rowCount();  


if ($urunordami==1) {

$glko=$db->prepare("SELECT * from masaurunler where masaid=:masaid and urunid=:urunid");
$glko->execute(array(':masaid'=> $masaid,':urunid'=>$urunid));
$gb=$glko->fetch(PDO::FETCH_ASSOC); 

$varolanadet = $gb["urunadet"];

$totaladet = $adet + $varolanadet;


$urunf=$db->prepare("SELECT * from urunler where id=:idim");
$urunf->execute(array(':idim'=> $urunid));
$urunfiyat=$urunf->fetch(PDO::FETCH_ASSOC); 

$stockfiyat = $urunfiyat["tutar"];


$bitisfiyat = $totaladet * $stockfiyat;



$okey = $db->prepare(
    "UPDATE masaurunler SET
     urunadet=:urunadet,
     uruntutar=:uruntutar
     WHERE masaid={$masaid} and urunid={$urunid}"
  );

$guncel     = $okey->execute(
    array(
    ':urunadet'  => $totaladet,
    ':uruntutar'  => $bitisfiyat
       ));


}else{
$glko=$db->prepare("SELECT * from urunler where id=:idim");
$glko->execute(array(':idim'=> $urunid));
$gb=$glko->fetch(PDO::FETCH_ASSOC); 


$tutar = $gb["tutar"];

$total = $adet * $tutar;


$okey = $db->prepare(
    "INSERT INTO masaurunler SET
     masaid=:masaid,
     urunid=:urunid,
     urunadet=:urunadet,
     uruntutar=:uruntutar"
  );

$guncel     = $okey->execute(
    array(
    ':masaid'  => $masaid,
    ':urunid'  => $urunid,
    ':urunadet'  => $adet,
    ':uruntutar'  => $total
       ));

}

if ($guncel) {
    header("location:cafe-".$masaid.".html");
}else{
header("location:cafe-".$masaid.".html?system=error");
}


}



if (isset($_POST["masakapat"])) {
$masaid = $_POST["masaid"];

$okey = $db->prepare(
    "UPDATE bilardomasa SET
     masadurumu=:masadurumu,
     zamantur=:zamantur,
     zamanbaslangic=:zamanbaslangic,
     zamanbitis=:zamanbitis
     WHERE id={$masaid}"
  );

$guncel     = $okey->execute(
    array(
    ':masadurumu'  => 0,
    ':zamantur'  => 0,
    ':zamanbaslangic'  => 0,
    ':zamanbitis'  => 0
       ));
if ($guncel) {
Header("location:bilardo.html");
}else{

Header("location:bilardo.html?hata=system");

}


}



if (isset($_POST["bilardomasatransferet"])) {

$masaid = $_POST["masaid"];

$transfermasa = $_POST['transfermasa'];

$glko=$db->prepare("SELECT * from bilardomasa where id=:idim");
$glko->execute(array(':idim'=>htmlspecialchars($masaid)));
$gb=$glko->fetch(PDO::FETCH_ASSOC); 


$masadurumu= $gb["masadurumu"];

$zamantur= $gb["zamantur"];

$zamanbaslangic= $gb["zamanbaslangic"];

$zamanbitis= $gb["zamanbitis"];



$okey = $db->prepare(
    "UPDATE bilardomasa SET
     masadurumu=:masadurumu,
     zamantur=:zamantur,
     zamanbaslangic=:zamanbaslangic,
     zamanbitis=:zamanbitis
     WHERE id={$transfermasa}"
  );

$guncel     = $okey->execute(
    array(
    ':masadurumu'  => $masadurumu,
    ':zamantur'  => $zamantur,
    ':zamanbaslangic'  => $zamanbaslangic,
    ':zamanbitis'  => $zamanbitis
       ));


if ($guncel) {


$okey = $db->prepare(
    "UPDATE bilardomasa SET
     masadurumu=:masadurumu,
     zamantur=:zamantur,
     zamanbaslangic=:zamanbaslangic,
     zamanbitis=:zamanbitis
     WHERE id={$masaid}"
  );

$guncel     = $okey->execute(
    array(
    ':masadurumu'  => 0,
    ':zamantur'  => 0,
    ':zamanbaslangic'  => 0,
    ':zamanbitis'  => 0
       ));
if ($guncel) {
Header("location:bilardo.html");
}else{

Header("location:bilardo.html?hata=system");

}

}else{

Header("location:bilardo.html?hata=system");

}


}




if (isset($_POST["ucretal"])) {

$masaid = $_POST["masaid"];


$alinan = $_POST["alinan"];

$islem = $_POST["islem"];

$glko=$db->prepare("SELECT * from bilardomasa where id=:idim");
$glko->execute(array(':idim'=>htmlspecialchars($masaid)));
$gb=$glko->fetch(PDO::FETCH_ASSOC); 

$tarih = date('Y-m-d H:i:s',time());


$okey = $db->prepare(
    "INSERT INTO gelir SET
     geliradi=:geliradi,
     geliricerik=:geliricerik,
     gelirtutar=:gelirtutar,
     tarih=:tarih
     "
  );

$guncel     = $okey->execute(
    array(
    ':geliradi'  => underwall("Bilardo"),
    ':geliricerik'  => underwall($islem),
    ':gelirtutar'  => underwall($alinan),
    ':tarih'  => underwall($tarih)
       ));

if ($guncel) {


$okey = $db->prepare(
    "UPDATE bilardomasa SET
     masadurumu=:masadurumu,
     zamantur=:zamantur,
     zamanbaslangic=:zamanbaslangic,
     zamanbitis=:zamanbitis
     WHERE id={$_POST["masaid"]}"
  );

$guncel     = $okey->execute(
    array(
    ':masadurumu'  => 0,
    ':zamantur'  => 0,
    ':zamanbaslangic'  => 0,
    ':zamanbitis'  => 0
       ));



if ($guncel) {

Header("location:bilardo.html");

}else{

Header("location:bilardo.html?hata=system");

}


}else{

Header("location:bilardo.html?hata=system");

}







}













if (isset($_POST["bilardomasabaslat"])) {



$tarih = date('Y-m-d H:i:s',time());




if ($_POST['zamantur']=="sureli") {


$eklenenzaman = $_POST['masazaman'];

$eklizaman = date('Y-m-d H:i:s',strtotime('+'.$eklenenzaman.' hour',strtotime($tarih)));

$okey = $db->prepare(
    "UPDATE bilardomasa SET
     masadurumu=:masadurumu,
     zamantur=:zamantur,
     zamanbaslangic=:zamanbaslangic,
     zamanbitis=:zamanbitis
     WHERE id={$_POST["id"]}"
  );

$guncel     = $okey->execute(
    array(
    ':masadurumu'  => 1,
    ':zamantur'  => underwall($_POST["zamantur"]),
    ':zamanbaslangic'  => underwall($tarih),
    ':zamanbitis'  => underwall($eklizaman)
       ));


}


if ($_POST['zamantur']=="suresiz") {

$okey = $db->prepare(
    "UPDATE bilardomasa SET
     masadurumu=:masadurumu,
     zamantur=:zamantur,
     zamanbaslangic=:zamanbaslangic
     WHERE id={$_POST["id"]}"
  );

$guncel     = $okey->execute(
    array(
    ':masadurumu'  => 1,
    ':zamantur'  => underwall($_POST["zamantur"]),
    ':zamanbaslangic'  => underwall($tarih)
       ));


}



if ($guncel) {

Header("location:bilardo.html");

}else{

Header("location:bilardo.html?hata=system");

}



}










  if (isset($_POST['bilardomasasil'])) {


$sil     = $db->prepare( "DELETE from bilardomasa where id=:id" );
$kontrol = $sil->execute(array('id' => underwall($_POST['id'])));

if ($kontrol) {
    
Header("location:bilardo-masa.html");

}else{

Header("location:bilardo-masa.html?hata=system");

}


   
}



if (isset($_POST["bilardomasaduzenle"])) {


$saat = underwall($_POST["masasaat"]);

$dkpay = $saat / 60 ;



$masaad = underwall($_POST["masaad"]);


$okey = $db->prepare(
    "UPDATE bilardomasa SET
     masaad=:masaad,
     saatucret=:saatucret,
     dkucret=:dkucret
     WHERE id={$_POST["id"]}"
  );

$guncel     = $okey->execute(
    array(
    ':masaad'  => underwall($_POST["masaad"]),
    ':saatucret'  => underwall($_POST["masasaat"]),
    ':dkucret'  => underwall($dkpay)
       ));

if ($guncel) {

Header("location:bilardo-masa.html");

}else{

Header("location:bilardo-masa.html?hata=system");

}



}


if (isset($_POST["bilardomasaekle"])) {

$saat = underwall($_POST["masasaat"]);

$dkpay = $saat / 60 ;



$masaad = underwall($_POST["masaad"]);




$okey = $db->prepare(
    "INSERT INTO bilardomasa SET
     masaad=:masaad,
     saatucret=:saatucret,
     dkucret=:dkucret"
  );

$guncel     = $okey->execute(
    array(
    ':masaad'  => underwall($_POST["masaad"]),
    ':saatucret'  => underwall($_POST["masasaat"]),
    ':dkucret'  => underwall($dkpay)
       ));

if ($guncel) {

Header("location:bilardo-masa.html");

}else{

Header("location:bilardo-masa.html?hata=system");

}





}


  if (isset($_POST['masasil'])) {


$sil     = $db->prepare( "DELETE from cafemasa where id=:id" );
$kontrol = $sil->execute(array('id' => underwall($_POST['id'])));

if ($kontrol) {
    
Header("location:cafe-masa.html");

}else{

Header("location:cafe-masa.html?hata=system");

}


   
}






if (isset($_POST["masaduzenle"])) {



$okey = $db->prepare(
    "UPDATE cafemasa SET
     masaad=:masaad
     WHERE id={$_POST["id"]}"
  );

$guncel     = $okey->execute(
    array(
    ':masaad'  => underwall($_POST["masaad"])
       ));

if ($guncel) {

Header("location:cafe-masa.html");

}else{

Header("location:cafe-masa.html?hata=system");

}



}



if (isset($_POST["masaekle"])) {



$okey = $db->prepare(
    "INSERT INTO cafemasa SET
     masaad=:masaad"
  );

$guncel     = $okey->execute(
    array(
    ':masaad'  => underwall($_POST["masaad"])
       ));

if ($guncel) {

Header("location:cafe-masa.html");

}else{

Header("location:cafe-masa.html?hata=system");

}



}


if (isset($_POST["urunduzenle"])) {



$okey = $db->prepare(
    "UPDATE urunler SET
     ad=:ad,
     tutar=:tutar,
     kategori=:kategori
     WHERE id={$_POST["id"]}"
  );

$guncel     = $okey->execute(
    array(
    'ad'  => underwall($_POST["ad"]),
    'tutar'  => underwall($_POST["fiyat"]),
    'kategori'  => underwall($_POST["kategori"])
       ));

if ($guncel) {

Header("location:urunler.html");

}else{

Header("location:urunler.html?hata=system");

}






}






  if (isset($_POST['urunsil'])) {


$sil     = $db->prepare( "DELETE from urunler where id=:id" );
$kontrol = $sil->execute(array('id' => underwall($_POST['id'])));

if ($kontrol) {
    
Header("location:urunler.html");

}else{

Header("location:kategori.html?hata=system");

}


   
}





if (isset($_POST["urunekle"])) {


if ($_FILES['resim']["size"]!=0) {
 $uploads_dir = '../../../resimler';

    @$tmp_name = $_FILES['resim']["tmp_name"];

    $benzersizsayi1=rand(20000,32000);

    $benzersizsayi2=rand(20000,32000);

    $uzanti = '.jpg';

    $benzersizad=$benzersizsayi1.$benzersizsayi2;

    $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$uzanti;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$uzanti");
}else{

   $refimgyol="0"; 
}


$okey = $db->prepare(
    "INSERT INTO urunler SET
     ad=:ad,
     tutar=:tutar,
     kategori=:kategori,
     resim=:resim"
  );

$guncel     = $okey->execute(
    array(
    ':ad'  => underwall($_POST["urunad"]),
    ':tutar'  => underwall($_POST["fiyat"]),
    ':kategori'  => underwall($_POST["kategori"]),
    ':resim'  => underwall($refimgyol)
       ));

if ($guncel) {

Header("location:urunler.html");

}else{

Header("location:urunler.html?hata=system");

}

}




  if (isset($_POST['kategorisil'])) {

    //ek
$sil     = $db->prepare( "DELETE from kategori where id=:id" );
$kontrol = $sil->execute(array('id' => underwall($_POST['id'])));


$sil     = $db->prepare( "DELETE from urunler where kategori=:id" );
$kontrol = $sil->execute(array('id' => underwall($_POST['id'])));

if ($kontrol) {
    
Header("location:kategori.html?islem=basarili");

}else{

Header("location:kategori.html?hata=system");

}


   
}


if (isset($_POST["kategoriduzenle"])) {


$okey = $db->prepare(
    "UPDATE kategori SET
     kategoriad=:kategoriad
     WHERE id={$_POST["id"]}"
  );

$guncel     = $okey->execute(
    array(
    'kategoriad'  => underwall($_POST["kategoriad"])
       ));

if ($guncel) {

Header("location:kategori.html?islem=basarili");

}else{

Header("location:kategori.html?hata=system");

}




}









if (isset($_POST["kategoriekle"])) {

$strlen = strlen($_POST["kategoriad"]);


if ($strlen<1) {
Header("location:kategori.html?hata=bos");
die();
}




$okey = $db->prepare(
    "INSERT INTO kategori SET
     kategoriad=:kategoriad"
  );

$guncel     = $okey->execute(
    array(
    'kategoriad'  => underwall($_POST["kategoriad"])
       ));

if ($guncel) {

Header("location:kategori.html?islem=basarili");

}else{

Header("location:kategori.html?hata=system");

}





}





if (isset($_POST["sssduzenle"])) {


$okey = $db->prepare(
    "UPDATE asss SET
     sira=:sira,
     soruad=:soruad,
     durum=:durum,
     icerik=:icerik
     WHERE id={$_POST["id"]}"
  );

$guncel     = $okey->execute(
    array(
    'sira'  => underwall($_POST["sira"]),
    'soruad'  => underwall($_POST["soruad"]),
    'durum'  => underwall($durum),
    'icerik'  => underwall($_POST["icerikm"])
       ));

if ($guncel) {

$xxxxx['status'] = 'success';
$xxxxx['id'] = underwall($_POST["id"]);
$xxxxx['message'] = 'İşlem Başarılı';

}else{

$xxxxx['status'] = 'error';
$xxxxx['message'] = 'İşlem Başarısız';

}


echo json_encode($xxxxx);

}





//USERLOG
 }else{




 if (isset($_POST['logmail'])) {
$logmail=mysqli_real_escape_string($con,$_POST['logmail']);
$logpas=mysqli_real_escape_string($con,$_POST['logpass']);

$logpassword=md5($logpas);

 $userkey=$db->prepare("SELECT * from ausers where eposta=:logmail");
 $userkey->execute(array(':logmail'=>underwall($logmail)));
 $xxxxxxxxxxxxxxxxxxx=$userkey->rowCount();
if ($xxxxxxxxxxxxxxxxxxx==1) {
 $dasd=$db->prepare("SELECT * from ausers where sifre=:userpass");
 $dasd->execute(array(':userpass'=>underwall($logpassword)));
 $fdsdfg=$dasd->rowCount();


if ($fdsdfg==1) {
$_SESSION['administrator']= $logmail;
$xxxxx['status'] = 'success';
$xxxxx['message'] = 'tamam';
}else{
$xxxxx['status'] = 'error';
$xxxxx['message'] = 'tamam';        
}

}else{
$xxxxx['status'] = 'error';
$xxxxx['message'] = 'tamam';        
}




echo json_encode($xxxxx);
 }




 } 