

        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
 <?php 



$yenitarih = date("Y-m-d");



$gelir = 0;
$totaltutar = "";
$d=1;
while ( $d <7 ) {       //döngü şartımızı verdik





//dongu


$varmims =$db->query("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarih."%'")->rowCount();  


if ($varmims==0) {
$totaltutar .= "0 ,";
}else{
$dsadassdx=$db->prepare("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarih."%'");
$dsadassdx->execute();
while($dbx=$dsadassdx->fetch(PDO::FETCH_ASSOC)) { 



$gelir += $dbx["gelirtutar"];
}
$totaltutar .= "".$gelir." ,";
}

//bitdongu
$yenitarih = date("Y-m-d",strtotime('-'.$d.' days'));
   $d++;                  // ve her döngüde değişkenimizin bir arttırdık.
}


 ?>
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                  <span class="mr-3 bgl-primary text-primary">
                                        <!-- <i class="ti-user"></i> -->
                                        <svg width="20" height="36" viewBox="0 0 20 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.08 24.36C19.08 25.64 18.76 26.8667 18.12 28.04C17.48 29.1867 16.5333 30.1467 15.28 30.92C14.0533 31.6933 12.5733 32.1333 10.84 32.24V35.48H8.68V32.24C6.25333 32.0267 4.28 31.2533 2.76 29.92C1.24 28.56 0.466667 26.84 0.44 24.76H4.32C4.42667 25.88 4.84 26.8533 5.56 27.68C6.30667 28.5067 7.34667 29.0267 8.68 29.24V19.24C6.89333 18.7867 5.45333 18.32 4.36 17.84C3.26667 17.36 2.33333 16.6133 1.56 15.6C0.786667 14.5867 0.4 13.2267 0.4 11.52C0.4 9.36 1.14667 7.57333 2.64 6.16C4.16 4.74666 6.17333 3.96 8.68 3.8V0.479998H10.84V3.8C13.1067 3.98667 14.9333 4.72 16.32 6C17.7067 7.25333 18.5067 8.89333 18.72 10.92H14.84C14.7067 9.98667 14.2933 9.14667 13.6 8.4C12.9067 7.62667 11.9867 7.12 10.84 6.88V16.64C12.6 17.0933 14.0267 17.56 15.12 18.04C16.24 18.4933 17.1733 19.2267 17.92 20.24C18.6933 21.2533 19.08 22.6267 19.08 24.36ZM4.12 11.32C4.12 12.6267 4.50667 13.6267 5.28 14.32C6.05333 15.0133 7.18667 15.5867 8.68 16.04V6.8C7.29333 6.93333 6.18667 7.38667 5.36 8.16C4.53333 8.90667 4.12 9.96 4.12 11.32ZM10.84 29.28C12.28 29.12 13.4 28.6 14.2 27.72C15.0267 26.84 15.44 25.7867 15.44 24.56C15.44 23.2533 15.04 22.2533 14.24 21.56C13.44 20.84 12.3067 20.2667 10.84 19.84V29.28Z" fill="#2F4CDD"/></svg>
                                    </span>
                                    <div class="media-body">
                                        <h3 class="mb-0 text-black"><span class="counter ml-0"> <?php 



$yenitarihx = date("Y-m-d");



$gelirx = 0;
$totaltutarx = "";
$dx=1;
while ( $dx <2 ) {       //döngü şartımızı verdik





//dongu


$varmimsx =$db->query("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihx."%'")->rowCount();  


if ($varmimsx==0) {
$totaltutarx .= "0 ,";
}else{
$dsadassdxx=$db->prepare("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihx."%'");
$dsadassdxx->execute();
while($dbxx=$dsadassdxx->fetch(PDO::FETCH_ASSOC)) { 



$gelirx += $dbxx["gelirtutar"];
}
$totaltutarx .= "".$gelirx." ,";
}

//bitdongu
$yenitarihx = date("Y-m-d",strtotime('-'.$dx.' days'));
   $dx++;                  // ve her döngüde değişkenimizin bir arttırdık.
}

echo $gelirx;
 ?></span> TL</h3>
                                        <p class="mb-0">Günlük Kazancınız</p>
                                        <small>Bugün ki Kazancınızı Gösterir</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                    <span class="mr-3 bgl-primary text-primary">
                                        <!-- <i class="ti-user"></i> -->
                                        <svg width="20" height="36" viewBox="0 0 20 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.08 24.36C19.08 25.64 18.76 26.8667 18.12 28.04C17.48 29.1867 16.5333 30.1467 15.28 30.92C14.0533 31.6933 12.5733 32.1333 10.84 32.24V35.48H8.68V32.24C6.25333 32.0267 4.28 31.2533 2.76 29.92C1.24 28.56 0.466667 26.84 0.44 24.76H4.32C4.42667 25.88 4.84 26.8533 5.56 27.68C6.30667 28.5067 7.34667 29.0267 8.68 29.24V19.24C6.89333 18.7867 5.45333 18.32 4.36 17.84C3.26667 17.36 2.33333 16.6133 1.56 15.6C0.786667 14.5867 0.4 13.2267 0.4 11.52C0.4 9.36 1.14667 7.57333 2.64 6.16C4.16 4.74666 6.17333 3.96 8.68 3.8V0.479998H10.84V3.8C13.1067 3.98667 14.9333 4.72 16.32 6C17.7067 7.25333 18.5067 8.89333 18.72 10.92H14.84C14.7067 9.98667 14.2933 9.14667 13.6 8.4C12.9067 7.62667 11.9867 7.12 10.84 6.88V16.64C12.6 17.0933 14.0267 17.56 15.12 18.04C16.24 18.4933 17.1733 19.2267 17.92 20.24C18.6933 21.2533 19.08 22.6267 19.08 24.36ZM4.12 11.32C4.12 12.6267 4.50667 13.6267 5.28 14.32C6.05333 15.0133 7.18667 15.5867 8.68 16.04V6.8C7.29333 6.93333 6.18667 7.38667 5.36 8.16C4.53333 8.90667 4.12 9.96 4.12 11.32ZM10.84 29.28C12.28 29.12 13.4 28.6 14.2 27.72C15.0267 26.84 15.44 25.7867 15.44 24.56C15.44 23.2533 15.04 22.2533 14.24 21.56C13.44 20.84 12.3067 20.2667 10.84 19.84V29.28Z" fill="#2F4CDD"/></svg>
                                    </span>
                                    <div class="media-body">
                                        <h3 class="mb-0 text-black"><span class="counter ml-0"><?php 




$yenitarihsx = date("Y-m-d");



$gelirsx = 0;
$totaltutarsx = "";
$dsx=1;
while ( $dsx <8 ) {       //döngü şartımızı verdik





//dongu


$varmimssx =$db->query("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihsx."%'")->rowCount();  


if ($varmimssx==0) {
$totaltutarsx .= "0 ,";
}else{
$dsadassdxsx=$db->prepare("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihsx."%'");
$dsadassdxsx->execute();
while($dbxsx=$dsadassdxsx->fetch(PDO::FETCH_ASSOC)) { 



$gelirsx += $dbxsx["gelirtutar"];
}
$totaltutarsx .= "".$gelirsx." ,";
}

//bitdongu
$yenitarihsx = date("Y-m-d",strtotime('-'.$dsx.' days'));
   $dsx++;                  // ve her döngüde değişkenimizin bir arttırdık.
}
echo $gelirsx;
 ?></span>TL</h3>
                                        <p class="mb-0">Haftalık Kazancınız</p>
                                        <small>1 Hafta Boyunca Elde Edilen Kazancınız</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                      <span class="mr-3 bgl-primary text-primary">
                                        <!-- <i class="ti-user"></i> -->
                                        <svg width="20" height="36" viewBox="0 0 20 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.08 24.36C19.08 25.64 18.76 26.8667 18.12 28.04C17.48 29.1867 16.5333 30.1467 15.28 30.92C14.0533 31.6933 12.5733 32.1333 10.84 32.24V35.48H8.68V32.24C6.25333 32.0267 4.28 31.2533 2.76 29.92C1.24 28.56 0.466667 26.84 0.44 24.76H4.32C4.42667 25.88 4.84 26.8533 5.56 27.68C6.30667 28.5067 7.34667 29.0267 8.68 29.24V19.24C6.89333 18.7867 5.45333 18.32 4.36 17.84C3.26667 17.36 2.33333 16.6133 1.56 15.6C0.786667 14.5867 0.4 13.2267 0.4 11.52C0.4 9.36 1.14667 7.57333 2.64 6.16C4.16 4.74666 6.17333 3.96 8.68 3.8V0.479998H10.84V3.8C13.1067 3.98667 14.9333 4.72 16.32 6C17.7067 7.25333 18.5067 8.89333 18.72 10.92H14.84C14.7067 9.98667 14.2933 9.14667 13.6 8.4C12.9067 7.62667 11.9867 7.12 10.84 6.88V16.64C12.6 17.0933 14.0267 17.56 15.12 18.04C16.24 18.4933 17.1733 19.2267 17.92 20.24C18.6933 21.2533 19.08 22.6267 19.08 24.36ZM4.12 11.32C4.12 12.6267 4.50667 13.6267 5.28 14.32C6.05333 15.0133 7.18667 15.5867 8.68 16.04V6.8C7.29333 6.93333 6.18667 7.38667 5.36 8.16C4.53333 8.90667 4.12 9.96 4.12 11.32ZM10.84 29.28C12.28 29.12 13.4 28.6 14.2 27.72C15.0267 26.84 15.44 25.7867 15.44 24.56C15.44 23.2533 15.04 22.2533 14.24 21.56C13.44 20.84 12.3067 20.2667 10.84 19.84V29.28Z" fill="#2F4CDD"/></svg>
                                    </span>
                                    <div class="media-body">
                                        <h3 class="mb-0 text-black"><span class="counter ml-0"><?php 




$yenitarihs = date("Y-m-d");



$gelirs = 0;
$totaltutars = "";
$ds=1;
while ( $ds <31 ) {       //döngü şartımızı verdik





//dongu


$varmimss =$db->query("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihs."%'")->rowCount();  


if ($varmimss==0) {
$totaltutars .= "0 ,";
}else{
$dsadassdxs=$db->prepare("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihs."%'");
$dsadassdxs->execute();
while($dbxs=$dsadassdxs->fetch(PDO::FETCH_ASSOC)) { 



$gelirs += $dbxs["gelirtutar"];
}
$totaltutars .= "".$gelirs." ,";
}

//bitdongu
$yenitarihs = date("Y-m-d",strtotime('-'.$ds.' days'));
   $ds++;                  // ve her döngüde değişkenimizin bir arttırdık.
}
echo $gelirs;
 ?></span>TL</h3>
                                        <p class="mb-0">Aylık Kazancınız</p>
                                        <small>1 Aylık Elde Edilen Kazanç</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                       <span class="mr-3 bgl-primary text-primary">
                                        <!-- <i class="ti-user"></i> -->
                                        <svg width="20" height="36" viewBox="0 0 20 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.08 24.36C19.08 25.64 18.76 26.8667 18.12 28.04C17.48 29.1867 16.5333 30.1467 15.28 30.92C14.0533 31.6933 12.5733 32.1333 10.84 32.24V35.48H8.68V32.24C6.25333 32.0267 4.28 31.2533 2.76 29.92C1.24 28.56 0.466667 26.84 0.44 24.76H4.32C4.42667 25.88 4.84 26.8533 5.56 27.68C6.30667 28.5067 7.34667 29.0267 8.68 29.24V19.24C6.89333 18.7867 5.45333 18.32 4.36 17.84C3.26667 17.36 2.33333 16.6133 1.56 15.6C0.786667 14.5867 0.4 13.2267 0.4 11.52C0.4 9.36 1.14667 7.57333 2.64 6.16C4.16 4.74666 6.17333 3.96 8.68 3.8V0.479998H10.84V3.8C13.1067 3.98667 14.9333 4.72 16.32 6C17.7067 7.25333 18.5067 8.89333 18.72 10.92H14.84C14.7067 9.98667 14.2933 9.14667 13.6 8.4C12.9067 7.62667 11.9867 7.12 10.84 6.88V16.64C12.6 17.0933 14.0267 17.56 15.12 18.04C16.24 18.4933 17.1733 19.2267 17.92 20.24C18.6933 21.2533 19.08 22.6267 19.08 24.36ZM4.12 11.32C4.12 12.6267 4.50667 13.6267 5.28 14.32C6.05333 15.0133 7.18667 15.5867 8.68 16.04V6.8C7.29333 6.93333 6.18667 7.38667 5.36 8.16C4.53333 8.90667 4.12 9.96 4.12 11.32ZM10.84 29.28C12.28 29.12 13.4 28.6 14.2 27.72C15.0267 26.84 15.44 25.7867 15.44 24.56C15.44 23.2533 15.04 22.2533 14.24 21.56C13.44 20.84 12.3067 20.2667 10.84 19.84V29.28Z" fill="#2F4CDD"/></svg>
                                    </span>
                                    <div class="media-body">
                                        <h3 class="mb-0 text-black"><span class="counter ml-0"><?php 




$yenitarihsz = date("Y-m-d");



$gelirsz = 0;
$totaltutarsz = "";
$dsz=1;
while ( $dsz <366 ) {       //döngü şartımızı verdik





//dongu


$varmimssz =$db->query("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihsz."%'")->rowCount();  


if ($varmimssz==0) {
$totaltutarsz .= "0 ,";
}else{
$dsadassdxsz=$db->prepare("SELECT * FROM gelir WHERE tarih LIKE '".$yenitarihsz."%'");
$dsadassdxsz->execute();
while($dbxsz=$dsadassdxsz->fetch(PDO::FETCH_ASSOC)) { 



$gelirsz += $dbxsz["gelirtutar"];
}
$totaltutarsz .= "".$gelirsz." ,";
}

//bitdongu
$yenitarihsz = date("Y-m-d",strtotime('-'.$dsz.' days'));
   $dsz++;                  // ve her döngüde değişkenimizin bir arttırdık.
}
echo $gelirsz;
 ?></span></h3>
                                        <p class="mb-0">Yıllık Kazanç</p>
                                        <small>365 Günde Elde Edilen Kazanç</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                                <div>
                                    <h4 class="card-title mb-1">Hesapları Göster</h4>
                                    <small class="mb-0">Geçmişten Bugune Olan Tüm Hesapları Görebilirsin.</small>
                                </div>


                            </div>
                            <div class="card-body orders-summary">
                               



<div class="row">
                   
  
                                <div class="col-md-6">
<select id="raporyil" class="form-control nested">
  <option>2015</option>
  <option>2016</option>
  <option>2017</option>
  <option>2018</option>
  <option>2019</option>
  <option>2020</option>
        <option >2021</option>
        <option selected="selected">2022</option>
        <option>2023</option>
        <option>2024</option>
        <option>2025</option>
        <option>2026</option>
        <option>2027</option>
        <option>2028</option>
        <option>2029</option>
        <option>2030</option>
        <option>2031</option>
        <option>2032</option>
        <option>2033</option>
        <option>2034</option>
        <option>2035</option>
        <option>2036</option>
        <option>2037</option>
        <option>2038</option>
        <option>2039</option>
        <option>2040</option>
        <option>2041</option>
        <option>2042</option>
</select>
</div>
<div class="col-md-6">
  <select id="raporay" class="form-control nested">
        <option selected="selected" value="01">Ocak</option>
        <option value="02">Şubat</option>
        <option value="03">Mart</option>
        <option value="04">Nisan</option>
        <option value="05">Mayıs</option>
        <option value="06">Haziran</option>
        <option value="07">Temmuz</option>
        <option value="08">Ağustos</option>
         <option value="09">Eylül</option>
          <option value="10">Ekim</option>
           <option value="11">Kasım</option>
           <option value="12">Aralık</option>
</select>

</div>
<div class="col-md-12">

  <select id="raporgun" class="form-control nested">
<option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
</select>

</div>
<div class="col-md-12">
<button id="raporet" style="margin-top: 15px;" class="btn btn-danger btn-block">Belirtilen Tarihte ki Gelirleri Göster</button>
        </div>
                           </div>


                    <script type="text/javascript">
                        
                 
$('#raporet').click(function(){


$("#acmenu").slideUp(500);
var ayil=$( "#raporyil" ).val();

var ayor=$( "#raporay" ).val();

var raporgun=$( "#raporgun" ).val();
      $.ajax({
         type:"post",
         url:"herego.html",
         data:{'ayil':ayil,'raporgun':raporgun,'ayor':ayor},
         success: function (msg) {
            $(".menus").html(msg);
       }
      })
$("#acmenu").slideDown(500);

});   
 </script>
<div style="margin-top:20px;display: none;" id="acmenu" class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gelirler Tablosu</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                             
                                                <th><strong>Ürün</strong></th>
                                                <th><strong>Adet</strong></th>
                                                <th><strong>Tutar</strong></th>
                                                <th><strong>Tarih</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="menus" >
                                            
                                          
                                           




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                                



                            </div>
                        </div>
                    </div>

</div>


                    <div  class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                                <div>
                                    <h4 class="card-title mb-1">Son 7 Günlük Grafik</h4>
                                    <small class="mb-0">Son 7 gün Boyunca Elde Edilen Performans Görünmektedir.</small>
                                </div>
                                <div class="dropdown mt-3 mt-sm-0">
                                
                                   
                                </div>
                            </div>
                            <div class="card-body revenue-chart px-3">
                                    <div class="d-flex align-items-end pr-3 pull-right revenue-chart-bar">
                                        <div class="d-flex align-items-end mr-4">
                                            <img src="assets/images/svg/ic_stat2.svg" height="22" width="22" class="mr-2 mb-1" alt=""/>
                                            <div>
                                                <small class="text-dark fs-14">Kazanılan Tutar</small>
                                                <h3 class="font-w600 mb-0"><span class="counter"><?php echo $gelir ?></span> TL</h3>
                                            </div>
                                        </div>
                                        
                                    </div>
                                <div id="chartBar"></div>
                            </div>
                        </div>
                    </div>
                


                 </div>
            </div>
        </div>

        <script type="text/javascript">
            var chartBar = function(){
        
        var options = {
              series: [
                {
                    name: 'Günlük Net Gelir',
                    data: [<?php echo rtrim($totaltutar,",") ?>],
                    radius: 12,   
                },
                
            ],
                chart: {
                type: 'area',
                height: 350,
                
                toolbar: {
                    show: false,
                },
                
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
              },
            },
            colors:['#2f4cdd', '#b519ec'],
            dataLabels: {
              enabled: false,
            },
            markers: {
        shape: "circle",
        },
        
        
            legend: {
                show: true,
                fontSize: '12px',
                
                labels: {
                    colors: '#000000',
                    
                },
                position: 'top',
                horizontalAlign: 'left',    
                markers: {
                    width: 19,
                    height: 19,
                    strokeWidth: 0,
                    strokeColor: '#fff',
                    fillColors: undefined,
                    radius: 4,
                    offsetX: -5,
                    offsetY: -5 
                }
            },
            stroke: {
              show: true,
              width: 4,
              colors:['#2f4cdd', '#b519ec'],
            },
            
            grid: {
                borderColor: '#eee',
            },
            xaxis: {

              categories: ['Bugun', 'Dün', '<?php $yenitarih = date("Y-m-d",strtotime('-2 days')); echo $yenitarih; ?>', '<?php $yenitarih = date("Y-m-d",strtotime('-3 days')); echo $yenitarih; ?>', '<?php $yenitarih = date("Y-m-d",strtotime('-4 days')); echo $yenitarih; ?>', '<?php $yenitarih = date("Y-m-d",strtotime('-5 days')); echo $yenitarih; ?>', '<?php $yenitarih = date("Y-m-d",strtotime('-6 days')); echo $yenitarih; ?>'],
              labels: {
                style: {
                    colors: '#3e4954',
                    fontSize: '13px',
                    fontFamily: 'Poppins',
                    fontWeight: 100,
                    cssClass: 'apexcharts-xaxis-label',
                },
              },
              crosshairs: {
              show: false,
              }
            },
            yaxis: {
                labels: {
               style: {
                  colors: '#3e4954',
                  fontSize: '13px',
                   fontFamily: 'Poppins',
                  fontWeight: 100,
                  cssClass: 'apexcharts-xaxis-label',
              },
              },
            },
            fill: {
              opacity: 1
            },
            tooltip: {
              y: {
                formatter: function (val) {
                  return "" + val + " TL"
                }
              }
            }
            };

            var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
            chartBar1.render();
    }
        </script>
        <!--**********************************
            Content body end
        ***********************************-->

